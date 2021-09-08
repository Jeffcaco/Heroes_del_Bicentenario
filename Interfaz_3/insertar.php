<?php
include_once("../database/conexion.php");

$DNI=$_POST['codigo'];
$nombre=$_POST['nombre'];
$estado=$_POST['estado'];
$actividad=$_POST['actividad'];


$sql="INSERT INTO empleado VALUES('$DNI','$nombre','$estado','$actividad')";
$query= mysqli_query($conexion,$sql);

if($query){
    Header("Location: personal.php");
}else {
}
?>