<?php
    include("../../database/conexion.php");
    $sql="SELECT * FROM empleado";
    $query=mysqli_query($conn,$sql);
    $nr = mysqli_num_rows($query);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Hospital Héroes del Bicentenario</title>
    <link rel="icon" type="image/svg" href="hospital.svg"/>
</head>

<body>
    <div class="d-flex" id="content-wrapper">
        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light  mb-0">Hospital Héroes del Bicentenario<i class="icon ion-md-hand mr-3"></i><i class="icon ion-md-heart mr-3"></i></h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>Dashboard</a>
                <a href="personal.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>Personal</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>Estadísticas</a>
                <a href="acceso.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-book lead mr-2"></i></i>Registro de acceso</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-close lead mr-2"></i></i>Cerrar cesión</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="form-inline position-relative d-inline-block my-2">
                        <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                        </form>
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="assets/img/user-1.png" class="img-fluid rounded-circle avatar mr-2"
                            alt="https://generated.photos/" />
                            Diego Velázquez
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Mi perfil</a>
                            <a class="dropdown-item" href="#">Suscripciones</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Cerrar sesión</a>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">
                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-8">
                                <h1 class="font-weight-bold mb-0" >Registro de acceso</h1>
                                <p class="lead text-muted">Revisa la última información</p>
                            </div>
                            <div class="col-lg-3 col-md-3 d-flex">
                                <img src="assets/img/Captura.PNG">
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container-fluid">
                        <div class="card-body">
                            <div class="typo-headers">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h1>Ingrese datos</h1>
                                            <form action="insertar.php" method="POST">
                                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo">
                                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                                <input type="text" class="form-control mb-3" name="estado" placeholder="Estado">
                                                <input type="text" class="form-control mb-3" name="actividad" placeholder="Ultima actividad">
                                                <input type="submit" class="btn btn-primary">
                                            </form>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="alert alert-danger" role="alert">
                                            <p style="font-size:130%;">Asistencia de Personal:</p>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row form-group"></div>
                                                <div class="row form-group">
                                                    <div class="table-responsive ">
                                                        <table class="table table-borderless table-striped" style="width:100%;">
                                                            <thead class="table-success table-striped" >
                                                                <tr style="background-color: #5DC1B9;">
                                                                    <th>Codigo</th>
                                                                    <th>Nombres</th>
                                                                    <th>Estado</th>
                                                                    <th>Ultima actividad</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                            
                                                            <tbody>
                                                                <?php
                                                                    if($nr < 1){
                                                                        echo "<option value='No hay Especialidades'>No hay Especialidades</option>";
                                                                    }else{
                                                                        for ($i=0; $i <$nr; $i++){
                                                                            $n = $i + 1;
                                                                            $row = mysqli_fetch_array($query);
                                                                            echo "
                                                                            <tr>
                                                                                <th>".$row['DNI']."</th>
                                                                                <th>".$row['nombre']."</th>
                                                                                <th><span class='badge badge-success' style='font-size: 110%;'>".$row['estado']."</span></th>
                                                                                <th>".$row['ultActividad']."</th>"    
                                                                ?>
                                                                                <th><a href="actualizar.php?id=<?php echo $row['DNI'] ?>" class="btn btn-info">Editar</a></th>
                                                                                <th><a href="delete.php?id=<?php echo $row['DNI'] ?>" class="btn btn-danger">Eliminar</a></th>                                       
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>    
                                                            </tbody>
                                                        </table>
                                                    </div>                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                     
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    </script>


</body>

</html>