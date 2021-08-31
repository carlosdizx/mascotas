<?php
include_once("index.php");

// Consulta todos los registros de la tabla mascotas de un usuario dado su id
if (isset($_GET["all"])){
    $id = $_GET["all"];
    $query = "SELECT * FROM tipo_mascotas";
    $sql = mysqli_query($conexionBD,$query );
    if (!$sql){
        echo json_encode([["mensaje"=>"No hay datos"]]);
    }
    else{
        $tipos = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode([$tipos]);
    }
}