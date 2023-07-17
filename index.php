<?php 
include("controladores/conexionBaseDatos.php");

session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:login.php");
  
}

?>


<!doctype html>
<html lang="es">

<head>
  <title>Inicio</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CSS personalizado para el efecto de carga -->
    <style>
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loading-spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

</head>

<body>

  <!-- Efecto de carga -->
  <div id="loadingOverlay" class="loading-overlay" style="display: none;">
            <div class="loading-spinner"></div>
        </div>



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

 
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<script>


// Mostrar el elemento de carga mientras la página se está cargando
document.addEventListener("DOMContentLoaded", function() {
document.getElementById('loadingOverlay').style.display = 'flex';
});

// Ocultar el elemento de carga después de que la página se haya cargado completamente
window.addEventListener("load", function() {
setTimeout(function() {
    document.getElementById('loadingOverlay').style.display = 'none';
}, 500); // Retraso de 2000 milisegundos (2 segundos)
});
</script>

</body>

</html>