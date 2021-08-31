<?php
include_once("index.php");

// Consulta todos los registros de la tabla mascotas de un usuario dado su id
if (isset($_GET["all_propietario"])){
    $id = $_GET["all_propietario"];
    $query = "SELECT m.id,m.nombre,m.edad,m.procedimiento,m.raza,m.ruta_foto,tm.nombre as tipo
FROM mascotas m INNER JOIN tipo_mascotas tm on m.tipo = tm.id
WHERE m.dueño = '$id'";
    $sql = mysqli_query($conexionBD,$query );
    if (!$sql){
        echo json_encode([["mensaje"=>"No hay datos"]]);
    }
    else{
        $mascotas = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode([$mascotas]);
    }
}