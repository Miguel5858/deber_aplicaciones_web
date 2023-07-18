<?php
session_start();

include("controladores/conexionBaseDatos.php");

$mensaje = ""; // Inicializar la variable $mensaje

if ($_POST) {
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
  $password = isset($_POST['password']) ? $_POST['password'] : "";

  $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
  $sentencia->bindParam(":usuario", $usuario);
  $sentencia->execute();

  $usuarioEncontrado = $sentencia->fetch(PDO::FETCH_ASSOC);

  if ($usuarioEncontrado) {
    if (password_verify($password, $usuarioEncontrado['password'])) {
      $_SESSION['usuario'] = $usuarioEncontrado['usuario'];
      $_SESSION['logueado'] = true;
      header("Location: secciones/alumnos/index.php");
      exit();
    } else {
      $mensaje = "Error: Contraseña incorrecta.";
    }
  } else {
    $mensaje = "Error: El usuario no existe.";
  }
}
?>



<?php include("plantillas/cabecera.php"); ?>

<br><br><br>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">

      

      <!-- Mensaje de registro-->
      <?php if(isset($_GET['mensaje'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $_GET['mensaje']; ?></strong>         
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>


        <!-- Formulario de Registro/Login -->
        <form method="post" class="p-3 border">

          <!-- Título del formulario -->
          <h2 class="mb-3">Ingresar</h2>

    <!-- Mensaje de Error-->
    <?php if ($_POST && isset($_POST['usuario'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><?php echo $mensaje ;?></strong>         
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
         

        <!-- Campo de Usuario -->
          <div class="form-group mb-3">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresa tu usuario">
          </div>

          <!-- Campo de Contraseña -->
          <div class="form-group mb-3">
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
            <label>Ir a <a href="index.php">inicio</a></label>
          </div>

          <div class="form-group mt-4">
            <label>Miguel Intriago 2023</label>
          </div>

      </div>
    </div>
  </div>

<?php include("plantillas/pie.php"); ?>
