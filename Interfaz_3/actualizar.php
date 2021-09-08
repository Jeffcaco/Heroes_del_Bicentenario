<?php 
    include_once("../database/conexion.php");

$dni=$_GET['id'];
$sql="SELECT * FROM empleado WHERE DNI='$dni'";
$query=mysqli_query($conexion,$sql);
$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                            <input type="hidden" name="DNI" value="<?php echo $row['DNI']  ?>">
                            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                            <input type="text" class="form-control mb-3" name="estado" placeholder="Estado" value="<?php echo $row['estado']  ?>">
                            <input type="text" class="form-control mb-3" name="actividad" placeholder="Ultima actividad" value="<?php echo $row['ultActividad']  ?>">
                        <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                        <input type="submit" class="btn btn-primary btn-block" value="Volver" onclick="location.href='personal.php'">
                        
                    </form>
                </div>
                
    </body>
</html>