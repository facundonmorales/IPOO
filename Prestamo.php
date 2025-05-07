<?
include_once 'Cliente.php';
include_once 'Cuota.php';

class Prestamo {
    private static $contador_prestamos;
    private $id;
    private $codigoElectrodomestico;
    private $fecha_otorgamiento;
    private $monto;
    private $cantidad_de_cuotas;
    private $tasa_interes;
    private $cuotas;
    private $cliente; //referencia a la Persona que solicito el prestamo
   

    public function __construct($codigoElectrodomestico, $monto, $cantidad_de_cuotas, $tasa_interes, $cliente)
    {
        self::$contador_prestamos++; // Suma 1 al contador cada vez que se cree una neuva instancia de Prestamo

        $this -> id = self::$contador_prestamos;
        $this -> codigoElectrodomestico = $codigoElectrodomestico;
        $this -> fecha_otorgamiento = null; //Se asigna al otorgar el prestamo
        $this -> monto = $monto;
        $this -> cantidad_de_cuotas = $cantidad_de_cuotas;
        $this -> cuotas = array();
        $this -> tasa_interes = $tasa_interes;
        $this -> cliente = $cliente;
    }


    //getters
    public function getId(){
        return $this -> id;
    }
    public function getCodigoElectrodomestico(){
        return $this -> codigoElectrodomestico;
    }
    public function getFechaOtorgamiento(){
        return $this -> fecha_otorgamiento;
    }
    public function getMonto(){
        return $this -> monto;
    }
    public function getCantidadCuotas(){
        return $this -> cantidad_de_cuotas;
    }
    public function getColCuotas(){
        return $this -> cuotas;
    }
    public function getTasa(){
        return $this -> tasa_interes;
    }
    public function getCliente(){
        return $this -> cliente;
    }

    //setters
    public function setCodigoElectrodomestico($codigoElectrodomestico){
        $this -> codigoElectrodomestico = $codigoElectrodomestico;
    }
    public function setFechaOtorgamiento($fecha_otorgamiento){
        $this -> fecha_otorgamiento = $fecha_otorgamiento;
    }
    public function setMonto($monto){
        $this -> monto = $monto;
    }
    public function setCantidadCuotas($cantidad_de_cuotas){
        $this -> cantidad_de_cuotas = $cantidad_de_cuotas;
    }
    public function setTasaInteres($tasa_interes){
        $this -> tasa_interes = $tasa_interes;
    }
    public function setCliente($cliente){
        $this -> cliente = $cliente;
    }

    private function calcularInteresPrestamo($numCuota){
        $valorCuota = $this-> monto / $this->cantidad_de_cuotas;
        $saldoDeudor = $this-> monto - ($valorCuota *($numCuota -1));
        $interes = $saldoDeudor * ($this ->tasa_interes);

        return $interes;
    }

    public function otorgarPrestamo(){
        $this->fecha_otorgamiento = getdate();
        $montoCuota = ($this->monto /$this->cantidad_de_cuotas);

        for($i = 1; $i <= $this ->cantidad_de_cuotas; $i++){
            $montoInteres = $this -> calcularInteresPrestamo($i);
            $cuota = new Cuota($i, $montoCuota, $montoInteres);
            $this->cuotas[] = $cuota; //Se Añaden al array cuotas, los objetos cuotas que vayamos creando
        }

    }

    public function darSiguienteCuotaPagar() {
        foreach ($this->cuotas as $cuota) {
            if (!$cuota->estaCancelada()) {
                return $cuota;
            }
        }
            return null;
        }
        public function tieneCuotasGeneradas() {
            return count($this->cuotas) > 0;
        }
        //Redefinicion del metodo tostring
        public function __toString()
        {
            $fechaStr = $this->fecha_otorgamiento ? 
            $this->fecha_otorgamiento['mday'] . "/" . $this->fecha_otorgamiento['mon'] . "/" . $this->fecha_otorgamiento['year'] : 
            "No otorgado";
            $cadena = 
                "  Fecha: " . $fechaStr . "\n" .
                "  Prestamo Numero: " . $this->getId() . "\n" .
                "  Codigo Electrodomestico: " . $this->getCodigoElectrodomestico() . "\n" .
                "  Monto: $" . $this->getMonto() . "\n" .
                "  Interes: %" . $this->getTasa() . "\n".
                "  Cantidad de Cuotas: " . $this->getCantidadCuotas() . "\n" .
                "  Cliente/Solicitante: " . $this->getCliente() . "\n" 
                
            ;

            return $cadena;
        }
}

// $prestamo = new Prestamo('Microondas', 30000, 6, 5, 'Nahuel');

// echo $prestamo;