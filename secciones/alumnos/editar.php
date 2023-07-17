<?php

include("../../controladores/conexionBaseDatos.php");


// Editar dicho registro con el ID correspondiente
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

if($_POST){ 
  $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
  $nombres=(isset($_POST['nombres']))?$_POST['nombres']:"";
  $apellidos=(isset($_POST['apellidos']))?$_POST['apellidos']:"";
  $telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
  $direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
  
  $sentencia=$conexion->prepare("UPDATE alumnos 
  SET
  nombres=:nombres,
  apellidos=:apellidos,
  telefono=:telefono,
  direccion=:direccion 
  WHERE id=:id");

  $sentencia->bindParam(":nombres", $nombres); 
  $sentencia->bindParam(":apellidos", $apellidos); 
  $sentencia->bindParam(":telefono", $telefono); 
  $sentencia->bindParam(":direccion", $direccion); 
  $sentencia->bindParam(":id", $txtID);
  $sentencia->execute();

 
  header('Location: index.php?');

  }

 ?>

<?php include("../../plantillas/cabeceraNav.php"); ?>


<div class="card">
    <div class="card-header">
        Editar Alumno
    </div>
    <div class="card-body">
     
    <form action="" method="post">

    <div class="mb-3 d-none">
      <label for="txtID" class="form-label">ID:</label>
    <input value="<?php echo $txtID; ?>" type="text"
        class="form-control" name="txtID" id="txtID" placeholder="">
    </div>

    <div class="mb-3">
      <label for="nombres" class="form-label">Nombres:</label>
    <input value="<?php echo $nombres; ?>" type="text"
        class="form-control" name="nombres" id="nombres" placeholder="Ingresar nombres">
    </div>

    <div class="mb-3">
      <label for="apellidos" class="form-label">Apellidos:</label>
    <input value="<?php echo $apellidos; ?>" type="text"
        class="form-control" name="apellidos" id="apellidos" placeholder="Ingresar apellidos">
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono:</label>
    <input value="<?php echo $telefono; ?>" type="text"
        class="form-control" name="telefono" id="telefono" placeholder="Ingresar teléfono">
    </div>

    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección:</label>
    <input value="<?php echo $direccion; ?>" type="text"
        class="form-control" name="direccion" id="direccion" placeholder="Ingresar dirección">
    </div>


    <button type="submit" class="btn btn-info btn-sm">Actualizar</button>

    <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Cancelar</a>


    </form>

    </div>

</div>


<?php include("../../plantillas/pie.php");?>

