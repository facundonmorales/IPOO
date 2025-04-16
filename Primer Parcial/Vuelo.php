<?

class Vuelo {
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaPartida;
    private $horaArribo;
    private $cantAsientosDisponibles;
    private $cantAsientosTotales;
    private $responsable;


    public function __construct($numero, $importe, $fecha, $destino, $horaPartida, $horaArribo, $cantAsientosDisponibles, $cantAsientosTotales, $responsable) {
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaArribo = $horaArribo;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosDisponibles = $cantAsientosTotales; //Inicialmente todos estan disponibles
        $this->responsable;
    }

    //Metodos getters

    public function getNumero() {
        return $this->numero;
    }
    public function getImporte() {
        return $this->importe;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getHoraPartida() {
        return $this->horaPartida;
    }
    public function getHoraArribo() {
        return $this->horaArribo;
    }
    public function getCantAsientosTotales() {
        return $this->cantAsientosTotales;
    }
    public function getCantAsientosDisp() {
        return $this->cantAsientosDisponibles;
    }
    public function getResponsable() {
        return $this->responsable;
    }

    //Metodos Setters

    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }
    public function setHoraArribo($horaArribo){
        $this->horaArribo = $horaArribo;
    }
    public function setCantAsientosTotales($cantAsientosTotales){
        $this->cantAsientosTotales = $cantAsientosTotales;
    }
    public function setCantAsientosDisp($cantAsientosDisponibles){
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
    }

    //Metodo asignarAsientosDisponibles

    public function asignarAsientosDisponibles($cantPasajeros){
        $asientosDisponibles = $this->getCantAsientosDisp();
        if($cantPasajeros < 0 && $cantPasajeros <= $asientosDisponibles){
            return true; //Si se pudo asignar
        }
        return false; //No se pudo asignar, no hay suficientes asientos
    }
}