<?
include_once 'Cliente.php';
include_once 'Prestamo.php';
class Financiera {
    private $denominacion;
    private $direccion;
    private $prestamos;
    
    public function __construct($denominacion, $direccion) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->prestamos = array();
    }
    
 // Incorpora un nuevo préstamo a la financiera
    
    public function otorgarPrestamo($objCliente, $monto, $cant_cuotas, $interes, $codigoElectrodomestico = "") {
        $nuevoPrestamo = new Prestamo($codigoElectrodomestico, $monto, $cant_cuotas, $interes, $objCliente);
        $this->prestamos[] = $nuevoPrestamo;
        return $nuevoPrestamo;
    }
    
    //Otorga préstamos si el cliente califica (cuota no mayor al 40% del ingreso neto)

    public function otorgarPrestamoSiCalifica() {
        foreach ($this->prestamos as $prestamo) {
            if (!$prestamo->tieneCuotasGeneradas()) {
                $montoCuota = $prestamo->getMonto() / $prestamo->getCantidadCuotas();
                $cliente = $prestamo->getCliente();
                $ingresoNeto = $cliente->getImporteNeto();
                
                if ($montoCuota <= ($ingresoNeto * 0.4)) {
                    $prestamo->otorgarPrestamo();
                }
            }
        }
    }
    
    
    public function informarCuotaPagar($idPrestamo) {
        foreach ($this->prestamos as $prestamo) {
            if ($prestamo->getId() == $idPrestamo) {
                return $prestamo->darSiguienteCuotaPagar();
            }
        }
        return null; // No se encontró el préstamo
    }
    
    public function __toString() {
        $cadena = "Financiera: " . $this->denominacion . 
               "\nDirección: " . $this->direccion . 
               "\nPréstamos Otorgados:";
        
        if (count($this->prestamos) == 0) {
            $cadena .= "\nNo hay préstamos registrados.";
        } else {
            foreach ($this->prestamos as $prestamo) {
                $cadena .= "\n\n" . $prestamo;
            }
        }
        
        return $cadena;
    }
}