<?php

include_once('conexion.php');

$primer_nombre    = $_POST['primer_nombre'];
$segundo_nombre   = $_POST['segundo_nombre'];
$primer_apellido  = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$id_sexo          = $_POST['id_sexo'];
$id_ciudad        = $_POST['id_ciudad'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

if (!isset($_POST['id'])) {
    $query = "INSERT INTO personas(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_sexo, id_ciudad, fecha_nacimiento) VALUES ('$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$id_sexo','$id_ciudad','$fecha_nacimiento')";
} else {
    $query = "UPDATE personas SET primer_nombre='$primer_nombre',segundo_nombre='$segundo_nombre',primer_apellido='$primer_apellido',segundo_apellido = '$segundo_apellido',id_sexo = '$id_sexo',id_ciudad = '$id_ciudad', fecha_nacimiento = {$fecha_nacimiento}  WHERE id = {$_POST['id']}";
}

$result = mysqli_query($con, $query) or die(mysqli_error($con));


header("Location: index.php");