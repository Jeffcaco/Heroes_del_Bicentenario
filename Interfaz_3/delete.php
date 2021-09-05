<?php

include("../../database/conexion.php");

$dni=$_GET['id'];

$sql="DELETE FROM empleado  WHERE DNI='$dni'";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: personal.php");
    }else{
        
    }
?>