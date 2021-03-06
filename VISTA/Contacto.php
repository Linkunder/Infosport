<?php
include('header.php'); ?>

<html lang="en">

  <title>jQuery UI Draggable - Snap to element or grid</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .draggable { width: 40px; height: 40px; padding: 5px; float: left; float: ; margin: 0 10px 10px 0; font-size: .9em; }
  .ui-widget-header p, .ui-widget-content p { margin: 0; }
  #snaptarget { height: 500px; width: 900px; float: right;}
  </style>
  <script>
  $(function() {
    $( "#draggable" ).draggable({ snap: true });
    $( "#draggable2" ).draggable({ snap: ".ui-widget-header" });
    $( "#draggable3" ).draggable({ snap: ".ui-widget-header" });
    $( "#draggable4" ).draggable({ snap: ".ui-widget-header" });
    $( "#draggable5" ).draggable({ snap: ".ui-widget-header" });
    $( "#draggable6" ).draggable({ snap: ".ui-widget-header" });
    $( "#draggable7" ).draggable({ snap: ".ui-widget-header" });
  });
  </script>


<div id="snaptarget" class="ui-widget-header">
  <p>Jugadores</p>
</div>
 
<br style="clear:none">
 
 
<div id="draggable2" class="draggable ui-widget-content">
  <img src="images/usuarios/cbravo.png" width="30" alt="image02">
  <p>Claudio Bravo</p>
</div>
<div id="draggable3" class="draggable ui-widget-content" align="center">
  <img src="images/1442031669_football.png" width="20" alt="image02">
  <p>Jugador</p>
</div>


 


 

</html>

<?php


include('scrollUp.php');
?>