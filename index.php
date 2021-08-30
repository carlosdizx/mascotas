<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
// Si falla, muestra el error correspondiente
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "mascotas";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos)
or die("Conexion fallida".$conexionBD->connect_error);



// Consulta todos los registros de la tabla propietarios
if (isset($_GET["all_propietarios"])){
    $query = "SELECT * FROM propietarios;";
    $sql = mysqli_query($conexionBD,$query );
    if(mysqli_num_rows($sql) > 0){
        $propietarios = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode($propietarios);
    }
    else{ echo json_encode([["mensaje"=>"No hay datos"]]); }
}

// Consulta por un propietario dado su id
if (isset($_GET["id_propietario"])){
    $id = $_GET["id_propietario"];
    $query = "SELECT * FROM propietarios WHERE id = '$id'";
    $sql = mysqli_query($conexionBD,$query);
    if(mysqli_num_rows($sql) > 0){
        $propietarios = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode($propietarios);
        exit();
    }
    else{  echo json_encode([]); }
}

// Se elimina a un propietario dado su id
if (isset($_GET["id_propietario_del"])){
    $id = $_GET["id_propietario_del"];
    $query = "SELECT * FROM propietarios WHERE id = '$id'";
    $sql = mysqli_query($conexionBD,$query);
    if(mysqli_num_rows($sql) > 0){
        $query = "DELETE FROM propietarios WHERE id = '$id';";
        $sql = mysqli_query($conexionBD,$query);
        if (!$sql){
            echo json_encode(["mensaje"=>"No se pudo eliminar, ".$conexionBD->error]);
        }
        else
        {
            echo json_encode(["mensaje"=>"eliminado"]);
            exit();
        }
    }
    else{
        echo json_encode(["mensaje"=>"No existe"]);
    }
}

//Insertar un nuevo propietario
if (isset($_GET["id_propietario_ins"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombres = $data->nombres;
    $apellidos = $data->apellidos;
    $documento = $data->documento;
    $direccion = $data->direccion;
    $telefono = $data->telefono;
    $correo = $data->correo;
    $query = "INSERT INTO propietarios (nombres, apellidos, documento, direccion, telefono,correo) VALUES 
                ('$nombres','$apellidos','$documento','$direccion','$telefono','$correo')";
    $sql = mysqli_query($conexionBD,$query);
    echo json_encode(["mensaje"=>"Nuevo propietario"]);
}

//Actulizar datos de un propietario dado su id
if (isset($_GET["id_propietario_upd"])){
    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id;
    $nombres = $data->nombres;
    $apellidos = $data->apellidos;
    $documento = $data->documento;
    $direccion = $data->direccion;
    $telefono = $data->telefono;
    $correo = $data->correo;
    $query = "UPDATE propietarios SET nombres='$nombres',apellidos='$apellidos',documento='$documento',
                        direccion='$direccion',telefono='$telefono',correo='$correo' WHERE id = '$id';";
    $sql = mysqli_query($conexionBD,$query);
    if (!$sql){
        echo json_encode(["mensaje"=>"No se pudo actualizar, ".$conexionBD->error]);
    }
    else
    {
        echo json_encode(["mensaje"=>"Propietario actualizado"]);
        exit();
    }
}

