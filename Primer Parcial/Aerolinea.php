<?

    include 'Vuelo.php';
    class Aerolinea {
        private $identificacion;
        private $anombre;
        private $vuelosProgramados = [];


        public function __construct($identificacion, $anombre, $vuelosProgramados) {
           $this->identificacion = $identificacion;
           $this->anombre = $anombre;
           $this->vuelosProgramados = $vuelosProgramados;
        }

        //Metodos Getters

        public function getIdentificacion(){
            return $this->identificacion;
        }
        public function getNombreAerolinea(){
            return $this->anombre;
        }
        public function getVuelosProgramados(){
            return $this->vuelosProgramados;
        }

        //Metodos Setters

        public function setIdentificacion($identificacion){
            $this -> identificacion = $identificacion;
        }

        public function setNombreAerolinea($anombre){
            $this -> anombre = $anombre;
        }
        public function setVuelosProgramados($vuelosProgramados){
            $this -> vuelosProgramados = $vuelosProgramados;
        }

        public function darVueloDestino ($destino, $cantAsientosRequeridos){
            $colVuelos = [];
            $vuelosProgramados = $this->getVuelosProgramados();
            foreach($vuelosProgramados as $vuelo){
                if($vuelo->getDestino() === $destino && $vuelo -> getCantAsientosDisp() >= $cantAsientosRequeridos){
                    array_push($colVuelos, $vuelo);
                }
                return $colVuelos;
            }

        }

        public function incorporarVuelo($vuelo){
            foreach($this->vuelosProgramados as $vueloExistente){
                if($this->tienenMismoHorario($vueloExistente, $vuelo)){
                    return false;
                }
            }
            $this->vuelosProgramados[] = $vuelo;
            return true;
        }

        private function tienenMismoHorario($vuelo1, $vuelo2){
        }
        public function __toString(){
            $cadena = 
                "  Identificación: " . $this->getIdentificacion() . "\n" .
                "  Nombre: " . $this->getNombreAerolinea() . "\n" .
                "  Vuelos Programados: " . $this->getVuelosProgramados() . "\n"
            ;
            return $cadena;
        }
    }
    