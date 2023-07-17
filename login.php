
<?php 
session_start();

include("controladores/conexionBaseDatos.php");

$mensaje = ""; // Inicializar la variable $mensaje

if($_POST){ 

  $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
  $password=(isset($_POST['password']))?$_POST['password']:"";


  $sentencia=$conexion->prepare("SELECT *, id, usuario, password, COUNT(*) AS n_usuario
   FROM usuarios WHERE usuario = :usuario GROUP BY id,  password = :password ");
  

   
  $sentencia->bindParam(":usuario", $usuario); 
  $sentencia->bindParam(":password", $password); 
  $sentencia->execute();

  $lista_usuarios=$sentencia->fetch(PDO::FETCH_LAZY);


  if ($lista_usuarios && $lista_usuarios['n_usuario'] > 0) {
    $_SESSION['usuario'] = $lista_usuarios['usuario'];
    $_SESSION['logueado'] = true;
    header("Location: index.php");
    exit(); // Importante: Terminar el script después de redirigir
  } else {
    $mensaje = "Error: El usuario o la contraseña son incorrectos.";
  }
}


 ?>

<!DOCTYPE html>
<html>

<head>
  <title>Formulario de Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

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



  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">

      <!-- Mensaje de registro-->
      <?php if(isset($_GET['mensaje'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $_GET['mensaje']; ?></strong>         
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>


        <!-- Formulario de Registro/Login -->
        <form method="post" class="p-3 border">

          <!-- Título del formulario -->
          <h2 class="mb-3">Login</h2>

    <!-- Mensaje de Error-->
    <?php if ($_POST && isset($_POST['usuario'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><?php echo $mensaje ;?></strong>         
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>


         

        <!-- Campo de Usuario -->
          <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresa tu usuario">
          </div>

          <!-- Campo de Contraseña -->
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña">
          </div>

          <!-- Botón de Registro/Login -->
          <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

        
          <div class="form-group mt-4">
            <label>Aun no tienes una cuenta? <a href="registro.php">Registrarse</a></label>
          </div>

          <div class="form-group mt-4">
            <label>Miguel Intriago 2023</label>
          </div>

      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
