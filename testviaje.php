<?php
#Bustos Julian 
#leg: FAI-1807
#IPOO 2023 - TP 1 - ENTRGABLE
/**
 * @param int $codigoViaje
 * @param string $destino
 * @param int $cantMaximaPasajeros
 * @param int $cantPasajeros
 * @param bolean $vuelveMenu
 */
require_once('viajefeliz.php');

echo "------------------------------------\n";
echo "TRANSPORTE DE PASAJEROS VIAJE FELIZ \n";
echo "------------------------------------\n";

echo "Ingrese los siguientes datos:\n";
echo "----------------\n";
echo "Ingrese el código del viaje: \n";
$codigoViaje = trim(fgets(STDIN));
echo "Ingrese el destino: \n";
$destino = trim(fgets(STDIN));
echo "Ingrese la máxima cantidad de asientos: \n";
$cantMaximaPasajeros  = trim(fgets(STDIN));
echo "Ingrese la cantidad de pasajeros a viajar: \n";
$cantPasajeros  = trim(fgets(STDIN));

$objViaje = new viaje($codigoViaje, $destino, $cantMaximaPasajeros);
$vuelveMenu = true;

//Funcion Menu para el user
function menu(){
    return $menu = "Elija una opción:\n
    1. Modificar el código del viaje.\n
    2. Modificar el destino del viaje.\n
    3. Modificar la cantidad de asientos para pasajeros.\n
    4. Agregar un pasajero. \n
    5. Quitar un pasajero. \n
    6. Modificar datos del pasajero. \n
    7. Ver viaje. \n
    8. Salir. \n";
}
//Funcion que toma datos del pasajero
function tomarDatos(){
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $dni = intval(trim(fgets(STDIN)));
    $pasajero = ['nombre'=>$nombre, 'apellido'=>$apellido, 'DNI'=>$dni];
    return $pasajero;
}

do{
    echo menu();
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo "Ingrese el actual codigo del vaje: {$objViaje->getCodigo ($codigoViaje)}. \n";
            echo "Ingrese el nuevo código: \n";
            $codigo = trim(fgets(STDIN));
            $codigo = intval($codigoViaje);
            $objViaje->setCodigo($codigoViaje);
            break;

        case '2':
            echo "El viaje tiene como destino la ciudad de: {$objViaje->getDestino($destino)}. \n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objViaje->setDestino($destino);
            break;
        
        case '3':
            echo "El viaje posee {$objViaje->getCantMaxPasaj($cantMaximaPasajeros)} asientos. \n";
            echo "Ingrese la nueva cantidad de asientos: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $objViaje->setCantMaxPasaj($cantidadAsientos);
            break;

        case '4':
            if($cantPasajeros < $objViaje->getCantMaxPasaj($cantMaximaPasajeros)){
                echo "Ingrese los datos de un pasajero en especifico: \n";
                $pasajero = tomarDatos();
                if($objViaje->agregarPasajero($pasajero)){
                    echo "Pasajero agregado con exito!! \n";
                }else{
                    echo "El pasajero ya se encuentra en el viaje.\n";
                }
            }else{
                echo "No hay mas lugares en este viaje.\n";
            }            
            break;

        case '5':
            echo "Ingrese los datos del pasajero a quitar: \n";
            $pasajero = tomarDatos();
            if($objViaje->quitarPasajero($pasajero)){
                echo "El pasajero se ha quitado con exito.\n";
            }else{
                echo "No se ha encontrado al pasajero, vuelva a intentarlo! .\n";
            }
            break;

        case '6':
            echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = tomarDatos();
            echo "Ingrese los nuevos datos: \n";
            $pasajero2 = tomarDatos();
            if($objViaje->modificarDatosPasajero($pasajero, $pasajero2)){
                echo "Se han modificado los datos.\n";
            }else{
                echo "No se ha encontrado al pasajero.\n";
            }
            break;

        case '7':
            echo $objViaje;
            break;

        default:
            $vuelveMenu = false;
            break;
    }

}while($vuelveMenu);