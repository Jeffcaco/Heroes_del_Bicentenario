<?php

include("../../database/conexion.php");

$dni=$_POST['DNI'];
$nombre=$_POST['nombre'];
$estado=$_POST['estado'];
$actividad=$_POST['actividad'];

$sql="UPDATE empleado SET  nombre='$nombre',estado='$estado',ultActividad='$actividad' WHERE DNI=$dni";
$query=mysqli_query($conn,$sql);

if($query){
        Header("Location: personal.php");
}else {
}
?>