<?php 
include("../../controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../../login.php");  
}

// Borrar dicho registro con el id correspondiente
if(isset($_GET['txtID'])){

  
$txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
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
    
  $sentencia=$conexion->prepare("DELETE FROM programadores WHERE id=:id");  
  $sentencia->bindParam(":id", $txtID);  
  $sentencia->execute();

}


// Seleccionar registros de la base de datos y mostralos en un foreach
$sentencia=$conexion->prepare("SELECT * FROM `programadores`");
$sentencia->execute();
$lista_programadores=$sentencia->fetchAll(PDO::FETCH_ASSOC);



?>

<?php include("../../plantillas/cabeceraNav.php"); ?>








 <div class="card mt-4">
  <div class="card-header">
    <a class="btn btn-primary btn-sm" href="crear.php">Nuevo Registro</a>
  </div>
  <div class="card-body">
 
  <div class="table-responsive-sm">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Imagen</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Cargo</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($lista_programadores as $registros) { ?>
        <tr>
          <td><?php echo $registros['id']; ?></td>
          <td>
          <img class="img-thumbnail" width="50" src="../../imagenes/programador/<?php echo $registros['imagen']; ?>" alt="">
          </td>
          <td><?php echo $registros['nombres']; ?></td>
          <td><?php echo $registros['apellidos']; ?></td>
          <td><?php echo $registros['cargo']; ?></td>
          <td>
          <a name="" id="" class="btn btn-warning btn-sm" href="editar.php?txtID=<?php echo $registros['id']; ?>" role="button">Editar</a>
          <a name="" id="" class="btn btn-info btn-sm" href="ver.php?txtID=<?php echo $registros['id']; ?>" role="button">Informacion</a>
          <a name="" id="" class="btn btn-danger btn-sm" href="index.php?txtID=<?php echo $registros['id']; ?>" onclick="return confirm('Estás seguro que deseas eliminar el registro?');" role="button">Eliminar</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
  </div>
 </div>


 



<?php include("../../plantillas/pie.php"); ?>