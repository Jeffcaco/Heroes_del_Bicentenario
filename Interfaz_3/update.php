<?php

include_once("../database/conexion.php");

$dni=$_POST['DNI'];
$nombre=$_POST['nombre'];
$estado=$_POST['estado'];
$area=$_POST['area'];
$RFID=$_POST['RFID'];

$sql="UPDATE empleado SET  nombre='$nombre',estado='$estado',area='$area', RFID='$RFID' WHERE DNI=$dni";
$query=mysqli_query($conexion,$sql);

if($query){
        Header("Location: personal.php");
}else {
}
?>