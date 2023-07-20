<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a mi página</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      overflow: hidden;
    }
    .jumbotron {
      background-image: url('imagenes/fondo.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    h1 {
      color: white;
      font-size: 3rem;
      margin-bottom: 2rem;
    }
    p {
      color: white;
      font-size: 1.5rem;
    }
    .btn-ingresar {
      background-color: #007bff;
      color: white;
      font-size: 1.2rem;
      padding: 5px 10px;
      border-radius: 5px;
      text-decoration: none;
    }
    .btn-ingresar:hover {
      background-color: #0056b3;
      color: white;
    }

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

  <div class="jumbotron">
    <div class="container">
      <h1>Bienvenido a mi página</h1>
      <p>Administrador de Programadores</p>
      <a class="btn btn-ingresar" href="login.php">Ingresar</a>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
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
