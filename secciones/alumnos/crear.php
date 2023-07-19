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
  $telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
  $direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
  
  $sentencia=$conexion->prepare("INSERT INTO `alumnos`(`ID`, `nombres`, `apellidos`, `telefono`, `direccion`)
  VALUES (NULL, :nombres, :apellidos, :telefono, :direccion);");

  $sentencia->bindParam(":nombres", $nombres); 
  $sentencia->bindParam(":apellidos", $apellidos); 
  $sentencia->bindParam(":telefono", $telefono); 
  $sentencia->bindParam(":direccion", $direccion); 
  $sentencia->execute();


  header('Location: index.php?');

  }


?>

<?php include("../../plantillas/cabeceraNav.php"); ?>



<div class="card">
    <div class="card-header">
        Crear Alumno
    </div>
    <div class="card-body">
     
    <form action="" method="post">

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
      <label for="telefono" class="form-label">Teléfono:</label>
    <input type="text"
        class="form-control" name="telefono" id="telefono" placeholder="Ingresar teléfono" required>
    </div>

    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección:</label>
    <input type="text"
        class="form-control" name="direccion" id="direccion" placeholder="Ingresar dirección" required>
    </div>


    <button type="submit" class="btn btn-success btn-sm">Agregar</button>

    <a name="" id="" class="btn btn-primary btn-sm" href="index.php" role="button">Salir</a>


    </form>

    </div>

</div>



<?php include("../../plantillas/pie.php");?>
