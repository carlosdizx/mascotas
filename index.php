<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "mascotas";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


// Consulta por un propietario dado su id
if (isset($_GET["id_propietario"])){
    $id = $_GET["id_propietario"];
    $query = "SELECT * FROM propietarios WHERE id = '$id'";
    $sql = mysqli_query($conexionBD,$query);
    if(mysqli_num_rows($sql) > 0){
        $empleaados = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode($empleaados);
        exit();
    }
    else{  echo json_encode([]); }
}

// Consulta todos los registros de la tabla propietarios
$query = "SELECT * FROM propietarios;";
$sql = mysqli_query($conexionBD,$query );
if(mysqli_num_rows($sql) > 0){
    $empleaados = mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($empleaados);
}
else{ echo json_encode([]); }