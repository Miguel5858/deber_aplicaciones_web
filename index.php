<?php 
include("controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:login.php");
  
}

?>

<?php include("plantillas/cabecera.php"); ?>


  <div class="container">

 <h1>Hola Mundo</h1>

 <a class="btn btn-danger btn-sm" href="controladores/cerrar.php">Cerrar Sesion</a>


 <div class="card mt-4">
  <div class="card-header">
    Lista de Registros
    <a class="btn btn-primary btn-sm" href="#">Nuevo Registro</a>
  </div>
  <div class="card-body">
 
  <div class="table-responsive-sm">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Telefono</th>
          <th scope="col">Direccion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Miguel Jose</td>
          <td>Intriago tobar</td>
          <td>0996193351</td>
          <td>Quito, Cotocollao</td>
          <td>
          <a class="btn btn-warning btn-sm" href="#">Editar</a> | <a class="btn btn-danger btn-sm" href="#">Eliminar</a>            
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  
  </div>
 </div>


 

</div>

<?php include("plantillas/pie.php"); ?>