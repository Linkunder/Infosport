   
<?php
session_start();
if($_SESSION["autentica"]=="SI") {

}
else {
header("Location:login.php"); 
}



include_once('../../TO/Jugador.php');
include_once('../../LOGICA/infoJugadores.php');
$jefeJugador = infoJugadores::obtenerInstancia();
$vectorJugadores=$jefeJugador->obtenerJugador();

ob_start();


$id_grupo2 = $_GET['id_grupo'];

//$id_grupo2 =$_SESSION['idBusquedaJ'];
?>

<?php include('headerJugador.php');?>


<div class="section secondary-section " id="portafolio">
        <div class="container">


<table class="table table-bordered2">
    <tr>
        <th>
			<center><h3>Agrega un jugador a tu grupo!</h3></center>
			<center><h5>Buscalo mediante correo electronico</h5></center>
		</th>
    </tr>
</table>

<table class="table table-bordered2">
	<tr>
		<th>Jugadores actuales</th>
	</tr>
	<tr>
		<?php
		$vectorJugadoresAux=$jefeJugador->obtenerJugadores($id_grupo2);
		foreach ($vectorJugadoresAux as $JugadorAux) {
			$nombreJugadorAux = $JugadorAux->getNombre();
			$nombreCompletoJugador = $nombreJugadorAux." ".$JugadorAux->getApellido();
		?>
		<td><?php echo $nombreCompletoJugador?></td>
	</tr>
	<?php
	}
?>
</table>

<center><a href='grupos.php' title="Listo">
    <?php
    echo "<img src='images/ok2.png' height='32px' width='32px'>";
  ?>
</a></center>


<div class = "busqueda">
	<?php
$_SESSION['idBusqueda2'] = $id_grupo2;
?>
<form class="form-wrapper cf" action="nuevoJugador2.php" method="get">
        <input type="text" placeholder="Busca un jugador..." name="search" required>
        <button type="submit">Buscar
        </button>
    </form> 
</div>





<br>

<br>

<?php
	$search = '';
	$cont = 0;
	$aux = 1;
	if (isset($_GET['search'])) {
	    $search = $_GET['search'];
	}

	$val = '';
	$pos = '';
	if ($search!=''){

?>




<div id="single-project">

<?php } 
foreach ($vectorJugadores as $key) {
    $val = $key->getCorreo();
    $pos = strripos($val, $search);
    if ($pos !== false) { ?>
		<div id="slidingDiv<?php echo $cont?>" class="toggleDiv row-fluid single-project">
			<div class="span6">
				<div class="project-description">
					<div class="project-title clearfix">
						<?php 
								$nombreJugador = $key->getNombre();
								$nombreApellido = $nombreJugador." ".$key->getApellido();
								$idNuevo = $key->getId_jugador();
	                        ?>
						<h3> <?php echo " ".$nombreApellido?></h3>
					
					</div>
				
					<div class="project-info">
						
						<!--<div>
							
	                       <	 <span>Nombre</span><?php echo $nombreApellido	;?></div> -->
	                     <div class="fotoagregar">
							<img src="../images/usuarios/<?php echo $key->getDirectorio_foto();?>" height='40' width='40' alt="project 1">
						</div>
	                    <div class="ordenarTexto"> 
	                    	<span>Correo</span><?php echo $key->getCorreo();?>
	                    </div>
	                  
	                    <div class="ordenarTexto"> 
	                    	<span>Deporte</span><?php echo $key->getDeporte_fav();?>
	                    </div>

	                    <div class="ordenarTexto"> 
	                    	<span>Posicion</span><?php echo $key->getPosicion();?>
	                    </div>
	                    <br>
	                    <br>
	                    <div class="addPlayer">
							<a href="agregarJugador.php?id_grupo=<?php echo $id_grupo2?>&id_jugador=<?php echo $idNuevo?>" class="modificar" title="Agregar jugador">
    						<?php
       							 echo "<img src='images/addyellow.png' height='24px' width='24px'>";
     						 ?>
     						</a>
						</div>
						<br>
						<br>
						<br>
						<br>
                    </div>
 
                </div>
            </div>




	<?php 
	$cont++;
	$aux++;
    }  
}
?>

<ul id="portfolio-grid" class="thumbnails row">
<?php
    $cont = 0;
foreach ($vectorJugadores as $key) {
    $val = $key->getCorreo();
    $pos = strripos($val, $search);
    if ($pos !== false) { ?>
        <li class="span4 mix web">
            <div class="thumbnail">
                <img src="../images/usuarios/<?php echo $key->getDirectorio_foto();?>" height='640' width='400' alt="project 1">
                <a href="#single-project" class="more show_hide" rel="#slidingDiv<?php echo $cont?>">
                    <i class="icon-plus"></i>
                </a>
                <h3> <?php echo "$val" ?> </h3>
                <p><?php echo $nombreApellido(); ?></p>
                <div class="mask"></div>
            </div>
        </li>
    <?php $cont++;
    }
}
?>

</ul>


</div>
</div>



<?php include('footer.php'); ?>
<?php include('scrollUp.php'); ?>
<?php include('js.php'); ?>




