<?php
include("controladores/conexionBaseDatos.php");

// Mensaje de error por defecto
$mensaje = "";

// Recepcionamos los valores del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($usuario) || empty($password)) {
        $mensaje = "Por favor, completa todos los campos.";
    } else {
        // Encriptar el password utilizando password_hash()
        $passwordEncriptado = password_hash($password, PASSWORD_DEFAULT);

        $sentencia = $conexion->prepare("INSERT INTO `usuarios`(`id`, `nombre`, `usuario`, `password`)
        VALUES (NULL, :nombre, :usuario, :password);");

        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":usuario", $usuario);
        $sentencia->bindParam(":password", $passwordEncriptado);
        $sentencia->execute();

        $mensaje = "Usuario registrado con éxito.";
        // Redireccionar después de realizar la inserción
        header('Location: login.php?mensaje=' . $mensaje);
        exit; // Detener la ejecución del script después de redireccionar
    }
}
?>

<?php include("plantillas/cabecera.php"); ?>

<br><br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <!-- Formulario de Registro/Login -->
            <form method="post" class="p-3 border">

                <!-- Título del formulario -->
                <h2 class="mb-3">Registro</h2>

                     <!-- Mostrar mensaje de error si existe -->
                     <?php if (!empty($mensaje)) : ?>
                    <div class="alert alert-danger"><?php echo $mensaje; ?></div>
                     <?php endif; ?>

                <!-- Campo de Nombre -->
                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
                </div>

                <!-- Campo de Usuario -->
                <div class="form-group mb-3">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                </div>

                <!-- Campo de Contraseña -->
                <div class="form-group mb-3">
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

<?php include("plantillas/pie.php"); ?>
