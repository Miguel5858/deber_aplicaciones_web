<?php

include("../../controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../../login.php");
  
}


// Editar dicho registro con el id correspondiente
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

if($_POST){ 
  $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
  $nombres=(isset($_POST['nombres']))?$_POST['nombres']:"";
  $apellidos=(isset($_POST['apellidos']))?$_POST['apellidos']:"";
  $cargo=(isset($_POST['cargo']))?$_POST['cargo']:"";
  $informacion=(isset($_POST['informacion']))?$_POST['informacion']:"";
  
  $sentencia=$conexion->prepare("UPDATE programadores 
  SET
  nombres=:nombres,
  apellidos=:apellidos,
  cargo=:cargo,
  informacion=:informacion 
  WHERE id=:id");

  $sentencia->bindParam(":nombres", $nombres); 
  $sentencia->bindParam(":apellidos", $apellidos); 
  $sentencia->bindParam(":cargo", $cargo); 
  $sentencia->bindParam(":informacion", $informacion); 
  $sentencia->bindParam(":id", $txtID);
  $sentencia->execute();


  // ACTUALIZAR  LA IMAGEN INICIO
  if($_FILES['imagen']['tmp_name']!=""){

    $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

    $tmp_imagen=$_FILES["imagen"]["tmp_name"];

    move_uploaded_file($tmp_imagen,"../../imagenes/programador/".$nombre_archivo_imagen);


    // Borrar cuando tiene imagen
        $sentencia=$conexion->prepare("SELECT imagen FROM programadores WHERE id=:id");  
        $sentencia->bindParam(":id", $txtID);  
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
    
        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../imagenes/programador/".$registro_imagen["imagen"])){
                unlink("../../imagenes/programador/".$registro_imagen["imagen"]);
    
            }
        }
        // Borrar cuando tiene imagen    

    $sentencia=$conexion->prepare("UPDATE programadores SET imagen=:imagen WHERE id=:id"); 
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen); 
    $sentencia->bindParam(":id", $txtID);  
    $sentencia->execute();  

}
// ACTUALIZAR LA IMAGEN FIN

 
  header('Location: index.php?');

  }

 ?>

<?php include("../../plantillas/cabeceraNav.php"); ?>


<div class="card">
    <div class="card-header">
        Editar Alumno
    </div>
    <div class="card-body">
     
    <form enctype="multipart/form-data" action="" method="post">

    <div class="mb-3 d-none">
      <label for="txtID" class="form-label">ID:</label>
    <input value="<?php echo $txtID; ?>" type="text"
        class="form-control" name="txtID" id="txtID" placeholder="">
    </div>

    <div class="mb-3">
      <label for="nombres" class="form-label">Nombres:</label>
    <input value="<?php echo $nombres; ?>" type="text"
        class="form-control" name="nombres" id="nombres" placeholder="Ingresar nombres" required>
    </div>

    <div class="mb-3">
      <label for="apellidos" class="form-label">Apellidos:</label>
    <input value="<?php echo $apellidos; ?>" type="text"
        class="form-control" name="apellidos" id="apellidos" placeholder="Ingresar apellidos" required>
    </div>

    <div class="mb-3">
      <label for="cargo" class="form-label">Teléfono:</label>
    <input value="<?php echo $cargo; ?>" type="text"
        class="form-control" name="cargo" id="cargo" placeholder="Ingresar Cargo" required>
    </div>

    <div class="mb-3">
      <label for="informacion" class="form-label">Informacion:</label>
      <textarea class="form-control" rows="5" name="informacion" id="informacion"><?php echo $informacion; ?></textarea>
    </div>

    <div class="mb-3">
          <label for="imagen" class="form-label">Imagen:</label>
          <img width="50" src="../../imagenes/programador/<?php echo $imagen; ?>" alt="">
          <input type="file"
            class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
        </div>


    <button type="submit" class="btn btn-warning btn-sm">Actualizar</button>

    <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Salir</a>


    </form>

    </div>

</div>


<?php include("../../plantillas/pie.php");?>

