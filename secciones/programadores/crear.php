<?php 

include("../../controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../../login.php");
  
}


// Recepcionamos los valores del formulario
if($_POST){ 
  $nombres=(isset($_POST['nombres']))?$_POST['nombres']:"";
  $apellidos=(isset($_POST['apellidos']))?$_POST['apellidos']:"";
  $cargo=(isset($_POST['cargo']))?$_POST['cargo']:"";
  $informacion=(isset($_POST['informacion']))?$_POST['informacion']:"";
  $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
       
    // SUBIR LA IMAGEN INICIO
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

    $tmp_imagen=$_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
    move_uploaded_file($tmp_imagen,"../../imagenes/programador/".$nombre_archivo_imagen);
    }
     // SUBIR LA IMAGEN FIN  
  $sentencia=$conexion->prepare("INSERT INTO `programadores`(`ID`, `nombres`, `apellidos`, `cargo`, `informacion`,`imagen`)
  VALUES (NULL, :nombres, :apellidos, :cargo, :informacion, :imagen);");

  $sentencia->bindParam(":nombres", $nombres); 
  $sentencia->bindParam(":apellidos", $apellidos); 
  $sentencia->bindParam(":cargo", $cargo); 
  $sentencia->bindParam(":informacion", $informacion); 
  $sentencia->bindParam(":imagen", $nombre_archivo_imagen); 
  $sentencia->execute();


  header('Location: index.php?');

  }


?>

<?php include("../../plantillas/cabeceraNav.php"); ?>



<div class="card">
    <div class="card-header">
        Crear Programador
    </div>
    <div class="card-body">
     
    <form enctype="multipart/form-data" action="" method="post">

    <div class="mb-3">
      <label for="nombres" class="form-label">Nombres:</label>
    <input type="text"
        class="form-control" name="nombres" id="nombres" placeholder="Ingresar nombres" required>
    </div>

    <div class="mb-3">
      <label for="apellidos" class="form-label">Apellidos:</label>
    <input type="text"
        class="form-control" name="apellidos" id="apellidos" placeholder="Ingresar apellidos" required>
    </div>

    <div class="mb-3">
      <label for="cargo" class="form-label">Cargo:</label>
    <input type="text"
        class="form-control" name="cargo" id="cargo" placeholder="Ingresar Cargo" required>
    </div>

    <div class="mb-3">
      <label for="informacion" class="form-label">Informacion:</label>
      <textarea class="form-control" rows="5" name="informacion" id="informacion"></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen:</label>
    <input type="file"
        class="form-control" name="imagen" id="imagen" required>
    </div>


    <button type="submit" class="btn btn-success btn-sm">Agregar</button>

    <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Salir</a>


    </form>

    </div>

</div>



<?php include("../../plantillas/pie.php");?>
