<?php 
include("../../controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../../login.php");  
}

// Borrar dicho registro con el id correspondiente
if(isset($_GET['txtID'])){
    
  $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
  $sentencia=$conexion->prepare("DELETE FROM alumnos WHERE id=:id");  
  $sentencia->bindParam(":id", $txtID);  
  $sentencia->execute();

}

// Seleccionar registros de la base de datos y mostralos en un foreach
$sentencia=$conexion->prepare("SELECT * FROM `alumnos`");
$sentencia->execute();
$lista_alumnos=$sentencia->fetchAll(PDO::FETCH_ASSOC);



?>

<?php include("../../plantillas/cabeceraNav.php"); ?>




 

 <div class="card mt-4">
  <div class="card-header">
    <a class="btn btn-primary btn-sm" href="crear.php">Nuevo Alumno</a>
  </div>
  <div class="card-body">
 
  <div class="table-responsive-sm">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Telefono</th>
          <th scope="col">Direccion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($lista_alumnos as $registros) { ?>
        <tr>
          <td><?php echo $registros['id']; ?></td>
          <td><?php echo $registros['nombres']; ?></td>
          <td><?php echo $registros['apellidos']; ?></td>
          <td><?php echo $registros['telefono']; ?></td>
          <td><?php echo $registros['direccion']; ?></td>
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