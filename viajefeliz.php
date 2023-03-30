<?php
//Creacion de clase
class viaje {

    //declaracion de atributos/propiedades
    //datos del viaje
    public $codigoViaje ;
    public $destino;
    public $canMaximaPasajeros;
    public $pasajerosDelViaje;
    public $arregloPasajeros= [];// Nombres, apellidos y DNI

    //se define metodo constructor
    public function __construc ($codigoViaje, $destino, $canMaximaPasajeros, $pasajerosDelViaje){
        $this->codigoviaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaximaPasajeros = $cantMaximaPasajeros;
        $this->pasajerosDelViaje = $pasajerosDelViaje;
    }
    
    //Asignamos atributos

    //setea el valor del codigo del viaje
    function setCodigo ($codigoViaje){
        $this-> codigoViaje = $codigoViaje;
    }
    //retorna el valor del codigo del viaje
    function getCodigo ($codigoViaje){
       return $this-> codigoViaje = $codigoViaje;
    }
    //setea el valor del destino 
    function setDestino ($destino){
        $this-> destino = $destino;
    }
    //retorna el valor del destino
    function getDestino ($destino){
      return  $this-> destino = $destino;
    }
    //Setea el valor cantidad de maxima de pasajeros
    function setCantMaxPasaj ($canMaximaPasajeros){
        $this-> canMaximaPasajeros = $canMaximaPasajeros;
    }
    //retorna el valor cantidad de maxima de pasajeros
    function getCantMaxPasaj ($canMaximaPasajeros){
       return $this-> canMaximaPasajeros = $canMaximaPasajeros;
    }
    //Setea el valor de los pasajeros
    function setpasajeros ($pasajerosDelViaje){
        $this-> pasajerosDelViaje = $pasajerosDelViaje;
    }
    //retorna el valor de los pasajeros
    function getpasajeros ($pasajerosDelViaje){
       return $this-> pasajerosDelViaje = $pasajerosDelViaje;
    }
    
    public function getArrayPasajeros(){
        return $this->arregloPasajeros;
    }
    public function setArrayPasajeros($arregloPasajeros){
        $this->arregloPasajeros = $arregloPasajeros;
    }

    //Funcion para agregar pasajeros 
    public function agregarPasajero($pasajero){
        $boolean = false;   
        $arrayPasajeros2 = $this->getArrayPasajeros();
        if(in_array($pasajero, $this->getArrayPasajeros())){
            $boolean = false;
        }else{
            array_push($arrayPasajeros2, $pasajero);
            $this->setArrayPasajeros($arrayPasajeros2);
            $boolean = true;
        }
        return $boolean;      

    }
    //Funcion para saber si hay lugar 
    public function haylugar(){
        $boolean = true;
        if($this->getCantMaxPasaj() <= (count($this->getArrayPasajeros()))){
            $boolean = false;
        }
        return $boolean;
    }

    //Funcion para quitar pasajero de la lista
    public function quitarPasajero($pasajero){
        $boolean = false;
        $arrayDeBusqueda = $this->getArrayPasajeros();
        if(in_array($pasajero, $arrayDeBusqueda)){
            $key = array_search($pasajero, $arrayDeBusqueda);
            array_splice($arrayDeBusqueda, $key, 1);
            $this->setArrayPasajeros($arrayDeBusqueda);
            $boolean = true;
        }
        return $boolean;
    }   

    //funcion para modificar datos del pasajero
    public function modificarDatosPasajero($pasajero, $pasajero2){
        $boolean = false;
        $arrayDePaso = $this->getArrayPasajeros();
        if(in_array($pasajero, $arrayDePaso)){            
            $key = array_search($pasajero, $arrayDePaso );
            $arrayDePaso[$key] = $pasajero2;
            $this->setArrayPasajeros($arrayDePaso);            
            $boolean = true;
        };
        return $boolean;
    }
    //Metodo para hacer un string de ls pasajeros
    public function pasajerosString(){
        $stringPasajeros = "";
        foreach ($this->getArrayPasajeros() as $key => $value) {
            $nombre = $value['nombre'];
            $apellido = $value['apellido'];
            $dni = $value['DNI'];
            $strPasajeros = "Nombre: $nombre.\n Apellido: $apellido.\n DNI: $dni.\n";
        }
        return $stringPasajeros;
    }


    //toString
    public function __toString(){
        $pasajeros = $this->pasajerosString();
        $arregloPasajeros = $this->getArrayPasajeros();
        $cantidad = count($arregloPasajeros);
        $str = "Codigo del Viaje: {$this->getCodigo($codigoViaje)}.\n
        Destino: {$this->  getDestino($destino)}.\n 
        Cantidad de Asientos: {$this->getpasajeros($pasajerosDelViaje)}.\n
        Asientos ocupados: $cantidad.\n
        Datos de Pasajeros: \n $pasajeros";

        return $str;
    }





}   