
<?php 

include("controladores/conexionBaseDatos.php");


// Recepcionamos los valores del formulario
if($_POST){ 
  $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
  $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
  $password=(isset($_POST['password']))?$_POST['password']:"";
  
  $sentencia=$conexion->prepare("INSERT INTO `usuarios`(`id`, `nombre`, `usuario`, `password`)
  VALUES (NULL, :nombre, :usuario, :password);");

  $sentencia->bindParam(":nombre", $nombre); 
  $sentencia->bindParam(":usuario", $usuario); 
  $sentencia->bindParam(":password", $password); 
  $sentencia->execute();

  $mensaje="Usuario registrado con exito.";
  header('Location: index.php?mensaje='.$mensaje);

  }

?>






<!DOCTYPE html>
<html>

<head>
  <title>Formulario de Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

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

</body>

</html>
