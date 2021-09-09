<?php
include_once("../database/conexion.php");

$DNI=$_POST['codigo'];
$nombre=$_POST['nombre'];
$estado=$_POST['estado'];
$area=$_POST['area'];
$RFID = $_POST['RFID'];


$sql="INSERT INTO empleado VALUES('$DNI','$nombre','$estado','$area','$RFID')";
$query= mysqli_query($conexion,$sql);

if($query){
    Header("Location: personal.php");
}else {
}
?>