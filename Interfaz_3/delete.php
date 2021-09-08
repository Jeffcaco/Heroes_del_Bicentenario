<?php

include_once("../database/conexion.php");

$dni=$_GET['id'];

$sql="DELETE FROM empleado  WHERE DNI='$dni'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: personal.php");
    }else{
        
    }
?>