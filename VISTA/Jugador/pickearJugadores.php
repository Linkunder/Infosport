<?php
session_start();
include_once('../../TO/RecintoDeportivo.php');
include_once('../../LOGICA/inforecintos.php');
include_once('../../TO/Jugador.php');
include_once('../../LOGICA/infoJugadores.php');
include_once('../../TO/Grupo.php');
include_once('../../LOGICA/infoGrupos.php');
include_once('../../TO/GrupoConformado.php');
include_once('../../LOGICA/infoGruposConformados.php');
include_once('../../PERSISTENCIA/conexion.php');

include('headerJugador.php'); 

$jefeRecinto = infoRecintos::obtenerInstancia();
$vectorRecintos=$jefeRecinto->obtenerRecinto();
$vectorJugador=$jefeJugador= infoJugadores::obtenerInstancia();
$vectorJugador1=$jefeJugador= infoJugadores::obtenerInstancia();
$jefeGrupoConformado = infoGruposConformados::obtenerInstancia();


$_SESSION['id_grupoA']= "1"; //$_GET['id_grupo'];
$id_grupo=$_SESSION['id_grupoA'];
$vectorJugador = $jefeGrupoConformado->obtenerJugadores($id_grupo);
$vectorJugador1 = $jefeGrupoConformado->obtenerJugadores($id_grupo);


$_SESSION['id_grupoA']="1";      //$_GET['id_grupo'];
$_SESSION['id_recintoA']="3";    //$_GET['id_recinto'];
$_SESSION['id_partidoA']="9";    //$_GET['id_partido'];

 $conexionBD= new conexion();
 require_once('JSON.php');
 $json = new Services_JSON();
?>




  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .draggable { width: 40px; height: 40px; padding: 5px; float: left; float: ; margin: 0 10px 10px 0; font-size: 0.9em; color: black; text-align: center;}
  .ui-widget-header p{color: black; text-align: center;}, .ui-widget-content p { margin: 0;color: black; text-align: center; }
  #snaptarget { height: 452px; width: 726px; float: right; color: black; text-align: center;
    background-image: url("images/cfut.jpg"); 
  }
  </style>

  <script>
  var arrayJugador = new Array();
  $(function(){
     
    $( "#draggable" ).draggable({ snap: true 
    });

    $("#snaptarget").data("numsoltar",0);//variable que guarda el num de jugadores
    $("#snaptarget").droppable({
      drop: function( event, ui ) { //Aqui entra
      if (!ui.draggable.data("jugador")){
         ui.draggable.data("jugador", true);
         var elem = $(this);
         var elem1 = $(this);
         
         elem.data("numsoltar", elem.data("numsoltar") + 1);
         elem.html("" + elem.data("numsoltar") + " jugadores elegidos");
         var idjugador= ui.draggable.data("id");  
         arrayJugador[elem.data("numsoltar")-1]=(ui.draggable.data("id"));
         // alert(""+ arrayJugador+""); NO BORRAR SIRVE PARA DEBUGGEAR 
      }

   },
   out: function( event, ui ) { //Aqui sale
      if (ui.draggable.data("jugador")){
         ui.draggable.data("jugador", false);
         var elem = $(this);
   var elem1 = $(this);


         elem.data("numsoltar", elem.data("numsoltar") - 1);
         elem1.html("" + ui.draggable.data("id") + "Salio");

      }
   }

});

   <?php 
   foreach ($vectorJugador1 as $Jugador1) { ?>
    $( "#draggable<?php echo $Jugador1->getId_jugador();?>" ).draggable({ 
      snap: ".ui-widget-header",
      create: function(event, $Jugador1){}
      });
    $("#draggable<?php echo $Jugador1->getId_jugador();?>").data("jugador",false);
    $("#draggable<?php echo $Jugador1->getId_jugador();?>").data("id","<?php echo $Jugador1->getId_jugador();?>");

      <?php } ?> 
      });

  function setValue(){
    //arv= arrayJugador.join(","); //Funciona
    var jObject={};
    for(i in arrayJugador){
      jObject[i] = arrayJugador[i];
    }

    jObject=JSON.stringify(jObject);
      $.ajax({
          type:'post',
          cache:false,
          url:"eleccionJugadores.php",
          data:{jObject:jObject},
          success:function(server){
            alert(server);
          }
    });
    }


  </script>



<div class= "fondoamarillo">

<div  id="snaptarget" class="ui-widget-header">
  <p><?php echo "Recinto"?></p>
</div>

 
<br style="clear:none">
 
<?php 
$cont=2;

foreach ($vectorJugador as $Jugador) {
  
?>
<div id="draggable<?php echo $Jugador->getId_jugador();?>" class="draggable ui-widget-content">
  <img src="../images/usuarios/<?php echo $Jugador->getDirectorio_foto()?>" width="30" alt="image02">
  <p color: "black"; text-align: "center"; ><?php echo $Jugador->getNombre()?></p>
</div>

<?php

  $cont++;
  }//fin del foreach
?>

<?php

?>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>




  <center><button class="btn12" onclick="setValue()"><a href=''>Siguiente</a></button></center>
<!-- Ponle el href que quiera aqui :) -->


<?php
include('footer.php');

include('scrollUp.php');
?>