   
<?php
session_start();
if($_SESSION["autentica"]=="SI") {

}
else {
header("Location:login.php"); 
}

include_once('../../TO/Partido.php');
include_once('../../LOGICA/controlPartido.php');

include_once('../../TO/RecintoDeportivo.php');
include_once('../../LOGICA/infoRecintos.php');


$idRecinto = $_GET['id_recinto'];
$jefeRecintos = infoRecintos::obtenerInstancia();
$precioRecinto = $jefeRecintos->obtenerPrecio($idRecinto);

// en el fondo lo que hago es actualizar la informacion del recinto ya creado

$jefePartidos = controlPartido::obtenerInstancia();
$vectorPartidos = $jefePartidos->obtenerPartidos();
$ultimoPartido = end($vectorPartidos);
$idUltimoPartido = $ultimoPartido->getIdPartido();

$jefe = controlPartido::obtenerInstancia();
$jefe->agregarRecinto($idUltimoPartido, $idRecinto, $precioRecinto);

echo "<script type='text/javascript'>alert('Partido agendado!');</script>";
header("Location:index2.php");


?>

