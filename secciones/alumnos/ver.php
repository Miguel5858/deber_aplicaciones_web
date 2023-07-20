

<?php

include("../../controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../../login.php");  
}


// Traemos los datos del alumno para mostrarlos con el id correspondiente
if(isset($_GET['txtID'])){
    
  $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM programadores WHERE id=:id");  
    $sentencia->bindParam(":id", $txtID);  
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $nombres=$registro['nombres'];
    $apellidos=$registro['apellidos'];
    $cargo=$registro['cargo'];
    $informacion=$registro['informacion'];
    $imagen=$registro['imagen'];

}











 ?>

<?php include("../../plantillas/cabeceraNav.php"); ?>



<div class="row">
  <div class="col-md-6 mb-3">

  <img class="img-thumbnail" width="450" src="../../imagenes/programador/<?php echo $imagen; ?>" alt="imagen">

  </div>

  <div class="col-md-6"> 

        <div class="card">
          <div class="card-header">
            Información del Programador
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Nombres:</strong> <?php echo $nombres; ?></li>
            <li class="list-group-item"><strong>Apellidos:</strong> <?php echo $apellidos; ?></li>
            <li class="list-group-item"><strong>Cargo:</strong> <?php echo $cargo; ?></li>
            <li class="list-group-item"><strong>Información:</strong> <?php echo $informacion; ?></li>
            <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Regresar</a>
          </ul>
        </div>
    
    </div>

</div>









<?php include("../../plantillas/pie.php");?>


