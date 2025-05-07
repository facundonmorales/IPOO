<?

class Cliente {
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $importeNeto;

    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $importeNeto)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> dni = $dni;
        $this -> direccion = $direccion;
        $this -> mail = $mail;
        $this -> telefono = $telefono;
        $this -> importeNeto = $importeNeto;
    }

    //getters
    public function getNombre(){
        return $this -> nombre;
    }
    public function getApellido(){
        return $this -> apellido;
    }
    public function getDNI(){
        return $this -> dni;
    }
    public function getDireccion(){
        return $this -> direccion;
    }
    public function getMail(){
        return $this -> mail;
    }
    public function getTelefono(){
        return $this -> telefono;
    }
    public function getImporteNeto(){
        return $this -> importeNeto;
    }

    //setters

    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }
    public function setApellido($apellido){
        $this -> apellido = $apellido;
    }
    public function setDNI($dni){
        $this -> dni = $dni;
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
    public function setImporteNeto($importeNeto){
        $this -> importeNeto = $importeNeto;
    }

    //Redefinicion del metodo tostring
    public function __toString()
    {
        $cadena = 
            "  Nombre: " . $this->getNombre() . "\n" .
            "  Apellido: " . $this->getApellido() . "\n" .
            "  DNI: " . $this->getDNI() . "\n" .
            "  Dirección: " . $this->getDireccion() . "\n" .
            "  Email: " . $this->getMail() . "\n" .
            "  Teléfono: " . $this->getTelefono() . "\n" .
            "  Importe Neto: " . $this->getImporteNeto() . "\n"
        ;

        return $cadena;
    }

    
}
// $cliente = new Cliente('Facundo', 'Morales', '41590228', 'Neuquen', 'facundomorales@gmail.com', '299111222', 150000);

// echo $cliente;