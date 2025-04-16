<?
class Persona {
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    public function __construct($pnombre, $papellido, $pdireccion, $mail, $telfono) {
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
        $this->direccion = $pdireccion;
        $this->mail = $mail;
        $this->telefono = $telfono;
    }


    //Metodos getters
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getTelefono() {
        return $this->telefono;
    }


    //Metodos setters
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }
    public function setApellido($apellido){
        $this -> apellido = $apellido;
    }
    public function setDireccion($direccion){
        $this -> direccion = $direccion;
    }
    public function setMail($mail){
        $this -> mail = $mail;
    }
    public function setTelefono($telefono){
        $this -> telefono = $telefono;
    }

    //Redefinicion del metodo tostring
    public function __toString()
    {
        $cadena = 
            "  Nombre: " . $this->getNombre() . "\n" .
            "  Apellido: " . $this->getApellido() . "\n" .
            "  Dirección: " . $this->getDireccion() . "\n" .
            "  Email: " . $this->getMail() . "\n" .
            "  Teléfono: " . $this->getTelefono() . "\n"
        ;


        return $cadena;
    }


}
