<?
class Cuota {
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada; // contiene true si la cuota esta paga y false en caso contario

    public function __construct($numero, $monto_cuota, $monto_interes)
    {
        $this -> numero = $numero;
        $this -> monto_cuota = $monto_cuota;
        $this -> monto_interes = $monto_interes;
        $this -> cancelada = false; // por defecto la dejo en false osea no esta cancelada la cuota
    }


    //getters

    public function getNumero(){
        return $this -> numero;
    }
    public function getMontoCuota(){
        return $this -> monto_cuota;
    }
    public function getMontoInteres(){
        return $this -> monto_interes;
    }
    public function getCancelada(){
        return $this -> cancelada;
    }

    //setters

    public function setNumero($numero){
        $this -> numero = $numero;
    }
    public function setMontoCuota($monto_cuota){
        $this -> monto_cuota = $monto_cuota;
    }
    public function setMontoInteres($monto_interes){
        $this -> monto_interes = $monto_interes;
    }
    public function setCancelada($cancelada){
        $this -> cancelada = $cancelada;
    }

    public function darMontoFinalCuota($monto_cuota, $monto_interes){
        $intereses = $monto_cuota*($monto_interes/100);
        $montoFinalCuota = $monto_cuota + $intereses;
        return $montoFinalCuota;
    }

    //Redefinicion del metodo tostring
    public function __toString()
    {
        $cadena = 
            "  Cuota Numero: " . $this->getNumero() . "\n" .
            "  Monto Cuota: $" . $this->getMontoCuota() . "\n" .
            "  Interes: %" . $this->getMontoInteres() . "\n" .
            "  Monto Final: $". $this->darMontoFinalCuota($this->monto_cuota, $this-> monto_interes) . "\n" .
            "  Estado: ". $retVal = ($this->cancelada === true) ? $retVal = 'Pagada' : $retVal = 'No esta Pagada'; 

        ;


        return $cadena;
    }


}

// $cuota = new Cuota(1, 5559, 3, false);
// echo $cuota;