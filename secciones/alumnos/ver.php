

<?php

include("../../controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../../login.php");  
}


// Traemos los datos del alumno para mostrarlos con el id correspondiente
if(isset($_GET['txtID'])){
    
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM alumnos WHERE id=:id");  
    $sentencia->bindParam(":id", $txtID);  
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $nombres=$registro['nombres'];
    $apellidos=$registro['apellidos'];
    $telefono=$registro['telefono'];
    $direccion=$registro['direccion'];

}



 ?>

<?php include("../../plantillas/cabeceraNav.php"); ?>



<div class="card" style="width: 28rem;">
  <div class="card-header">
    Información del Alumno
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Nombres:</strong> <?php echo $nombres; ?></li>
    <li class="list-group-item"><strong>Apellidos:</strong> <?php echo $apellidos; ?></li>
    <li class="list-group-item"><strong>Teléfono:</strong> <?php echo $telefono; ?></li>
    <li class="list-group-item"><strong>Dirección:</strong> <?php echo $direccion; ?></li>
    <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Regresar</a>
  </ul>
</div>



<?php include("../../plantillas/pie.php");?>


