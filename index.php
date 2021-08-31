<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS, POST, PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
// Si falla, muestra el error correspondiente
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "mascotas";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos)
or die("Conexion fallida".$conexionBD->connect_error);

