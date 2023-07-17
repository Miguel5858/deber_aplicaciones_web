
<?php

$servidor="localhost";
$baseDeDatos="deber_programacion_web";
$usuario="root";
$contrasenia="Mordecai58";

try{
$conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
 echo "Conexión realizada...";

}catch(Exception $error){
echo $error->getMessage();
}



?>






