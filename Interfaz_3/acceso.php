<?php
    include("../database/conexion.php");
    session_start();
    $usuario=$_SESSION['user'];
    $consulta = "SELECT E.DNI as dni,E.nombre as nombre, E.area as area, E.RFID as rfid FROM Usuario as U
                            INNER JOIN empleado as E on U.idUser=E.idUsuario WHERE user='$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($resultado);
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
                <h4 class="text-light  mb-0"><a href="../Interfaz_1/inicio/index.php" class="text-light">Hospital Héroes del Bicentenario</a>
                    <br><br><i class="icon ion-md-hand mr-3"></i><i class="icon ion-md-heart mr-3"></i></h4>
            </div>
            <div class="menu">
            <a href="../Interfaz_2/dashboard.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Dashboard</a>

                <a href="personal.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Personal</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Estadísticas</a>
                <a href="acceso.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-book lead mr-2"></i></i>
                    Registro de acceso</a>
                <a href="../Interfaz_1/cerrar_sesion/cerrar_sesion.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-close lead mr-2"></i></i>
                    Cerrar cesión</a>
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
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                                
                                <label for="usuario">Usuario : <?php echo $row['dni'] //<$_SESSION['user'] ?> </label>          
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../Interfaz_2/dashboard.php">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../Interfaz_3/personal.php">Personal</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../Interfaz_3/acceso.php">Registro de acceso</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Interfaz_1/cerrar_sesion/cerrar_sesion.php">Cerrar sesión</a>
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
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $row['nombre'] ?></h1>
                                <label for="">Área perteneciente : <?php echo $row['area'] //<$_SESSION['user'] ?> </label>
                                <p class="lead text-muted">Revisa la última información</p>
                            </div>
                            <div class="col-lg-3 col-md-4 d-flex">
                                <!--<button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>-->
                                <button type="button" class="btn btn-primary w-100 align-self-center" data-toggle="modal" data-target="#exampleModal">
                                    Ver últimas incidencias
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reporte de incidencias</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container-fluid">
                        <div class="card-body">
                            <div class="typo-headers">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">
                                        <h2 style="color:black;" style="text-align:center;">Seleccione el ambiente:</h2>
                                        <hr>
                                        <div class="alert alert-danger" role="alert">
                                            <p style="font-size:130%;">El hospital se divide en 6 ambientes. Presione el boton del ambiente que desea analizar; 
                                                a su derecha hay un plano del hospital que sirve como guía.
                                            </p>
                                            <hr>
                                            <form action="actividad.php" method="post">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="selectLg" class=" form-control-label">Ambiente</label>
                                                    </div>
                                                    <div class="col-10 col-md-8">
                                                        <select name="area" id="selectLg" class="form-control-lg form-control">
                                                            <option value="all">Cualquiera</option>
                                                            <option value="Laboratorio">Laboratorio</option>
                                                            <option value="Sala de seguridad">Sala de seguridad</option>
                                                            <option value="Sala de operaciones A">Sala de operaciones A</option>
                                                            <option value="Sala de operaciones B">Sala de operaciones B</option>
                                                            <option value="Sala de operaciones C">Sala de operaciones C</option>
                                                            <option value="Sala de operaciones D">Sala de operaciones D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="row form-group">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <button type="submit" class="btn btn-info">Ver accesos</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <picture>
                                            <img src="assets/image/plano.png" style="width:auto;">
                                        </picture>
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