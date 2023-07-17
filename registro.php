
<?php 

include("controladores/conexionBaseDatos.php");


// Recepcionamos los valores del formulario
if($_POST) {
  $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
  $password = isset($_POST['password']) ? $_POST['password'] : "";
  
  // Encriptar el password utilizando password_hash()
  $passwordEncriptado = password_hash($password, PASSWORD_DEFAULT);
  
  $sentencia = $conexion->prepare("INSERT INTO `usuarios`(`id`, `nombre`, `usuario`, `password`)
  VALUES (NULL, :nombre, :usuario, :password);");

  $sentencia->bindParam(":nombre", $nombre); 
  $sentencia->bindParam(":usuario", $usuario); 
  $sentencia->bindParam(":password", $passwordEncriptado); 
  $sentencia->execute();

  $mensaje = "Usuario registrado con éxito.";
  header('Location: index.php?mensaje='.$mensaje);
}


?>






<!DOCTYPE html>
<html>

<head>
  <title>Formulario de Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

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

<body>

  <!-- Efecto de carga -->
  <div id="loadingOverlay" class="loading-overlay" style="display: none;">
            <div class="loading-spinner"></div>
        </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">

        <!-- Formulario de Registro/Login -->
        <form method="post" class="p-3 border">

          <!-- Título del formulario -->
          <h2 class="mb-3">Registro</h2>

          <!-- Campo de Nombre -->
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
          </div>

          <!-- Campo de Usuario -->
          <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
          </div>

          <!-- Campo de Contraseña -->
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
          </div>

          <!-- Botón de Registro/Login -->
          <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>


            <div class="form-group mt-4">
            <label>Ya tienes una cuenta? <a href="login.php">Login</a></label>
          </div>

          <div class="form-group mt-4">
            <label>Miguel Intriago 2023</label>
          </div>

      </div>
    </div>
  </div>

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
