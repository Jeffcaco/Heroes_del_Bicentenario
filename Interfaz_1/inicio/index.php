<?php
    
    include_once("../../database/conexion.php");
    session_start();
    //si se desea extraer mas datos
    $usuario=$_SESSION['user'];
    $consulta = "SELECT E.DNI as dni,E.nombre as nombre, E.area as area, E.RFID as rfid FROM Usuario as U
                            INNER JOIN empleado as E on U.idUser=E.idUsuario WHERE user='$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($resultado);
    //<?php echo $row['password']; 

    $consulta2="SELECT * FROM registro WHERE acceso=1";
    $resultado2 = mysqli_query($conexion, $consulta2);
    $regitrados = mysqli_num_rows($resultado2);

    $consultaA="SELECT * FROM registro WHERE acceso=1 AND area='Sala de Seguridad'";
    $resultadoA = mysqli_query($conexion, $consultaA);
    $regitradosA = mysqli_num_rows($resultadoA);

    $consultaB="SELECT * FROM registro WHERE acceso=1 AND area='Laboratorio'";
    $resultadoB = mysqli_query($conexion, $consultaB);
    $regitradosB = mysqli_num_rows($resultadoB);

    $consultaC="SELECT * FROM registro WHERE acceso=1 AND area='Sala de Operaciones A'";
    $resultadoC = mysqli_query($conexion, $consultaC);
    $regitradosC = mysqli_num_rows($resultadoC);

    $consultaD="SELECT * FROM registro WHERE acceso=1 AND area='Sala de Operaciones B'";
    $resultadoD = mysqli_query($conexion, $consultaD);
    $regitradosD = mysqli_num_rows($resultadoD);

    $consultaE="SELECT * FROM registro WHERE acceso=1 AND area='Sala de Operaciones C'";
    $resultadoE = mysqli_query($conexion, $consultaE);
    $regitradosE = mysqli_num_rows($resultadoE);

    $consultaF="SELECT * FROM registro WHERE acceso=1 AND area='Sala de Operaciones D'";
    $resultadoF = mysqli_query($conexion, $consultaF);
    $regitradosF = mysqli_num_rows($resultadoF);
    
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
    <link rel="stylesheet" href="../recursos/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Hospital Héroes del Bicentenario</title>
    <link rel="icon" type="image/svg" href="../recursos/img/hospital.svg"/>
</head>

<body>
    <div class="d-flex" id="content-wrapper">
        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light  mb-0">Hospital Héroes del Bicentenario
                <br><br><i class="icon ion-md-hand mr-3"></i><i class="icon ion-md-heart mr-3"></i></h4>
                
            </div>
            <div class="menu">
                <a href="../../Interfaz_2/dashboard.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Dashboard</a>

                <a href="../../Interfaz_3/personal.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Personal</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Estadísticas</a>
                <a href="../../Interfaz_3/acceso.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-book lead mr-2"></i></i>
                    Registro de acceso</a>
                <a href="../cerrar_sesion/cerrar_sesion.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-close lead mr-2"></i></i>
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
                      <a class="dropdown-item" href="../cerrar_sesion/cerrar_sesion.php">Cerrar sesión</a>
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

              <section class="bg-mix py-3">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted"><i class="icon ion-md-stats mr-2" style="font-size:25px;"></i>Total asistencia</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;">42</h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted"><i class="icon ion-md-document mr-2" style="font-size:25px;"></i>Total informes</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;">100</h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted"><i class="icon ion-md-mail mr-2" style="font-size:25px;"></i>Total aviso seguridad</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;">15</h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted"><i class="icon ion-md-barcode mr-2" style="font-size:25px;"></i>Personal registrado</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;"><?php echo $regitrados; ?></h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>

              <section>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 my-3">
                              <div class="card rounded-0">
                                  <div class="card-header bg-light">
                                    <h5 class="font-weight-bold mb-0">Número de personal registrado por área</h5>
                                    <h4 style="text-align:right;"><span class="badge badge-dark">
                                        <?php 
                                            date_default_timezone_set('America/Lima'); 
                                            echo date('m-d-Y, h:i:s a', time()); 
                                        ?>
                                    </h4></span>
                                    <h3 class="link text-dark">Total : <?php echo $regitrados ?></h3>
                                  </div>
                                  <div class="card-body">
                                    <canvas id="myChart" width="300" height="150"></canvas>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Movimiento por departamento</h6>
                                </div>
                                <div class="card-body pt-2" >
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0 badge badge-secondary" style="font-size:28px;"><i class="icon ion-md-desktop"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                        <small class="d-block text-muted">SALA DE SEGURIDAD</small>
                                        <h6 class="d-inline-block mb-0">250</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0 badge badge-secondary" style="font-size:28px;"><i class="icon ion-md-pulse"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                        <small class="d-block text-muted">SALA DE OPERACIONES</small>
                                        <h6 class="d-inline-block mb-0">250</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0 badge badge-secondary" style="font-size:28px;"><i class="icon ion-md-body"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                        <small class="d-block text-muted">SALA DE DESINFECCION</small>
                                        <h6 class="d-inline-block mb-0">250</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0 badge badge-secondary" style="font-size:28px;"><i class="icon ion-md-flask"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                        <small class="d-block text-muted">LABORATORIO</small>
                                        <h6 class="d-inline-block mb-0">250</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0 badge badge-secondary" style="font-size:28px;"><i class="icon ion-md-clipboard"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                        <small class="d-block text-muted">CONSULTORIO</small>
                                        <h6 class="d-inline-block mb-0">250</h6>
                                        </div>
                                    </div>
                                    <!--  -->
                                        <a href="../../Interfaz_2/dashboard.php" class="btn btn-primary w-100" role="button" aria-pressed="true">Ver detalles</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            <?php
                  $num=50;
                  $num2=115;
                  $num3=185;
                  $num4=235;
                  $num5=235;
                  $num6=235;
            ?>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Seguridad', 'Laboratorio','Operaciones A', 'Operaciones B','Operaciones C','Operaciones D'],
                    datasets: [{
                        label: 'Cantidad',
                        data: [<?php print $regitradosA.','.$regitradosB.','.$regitradosC.','.$regitradosD.','.$regitradosE.','.$regitradosF; ?>],
                        backgroundColor: [
                            '#B10F1C',  
                            '#343A40',
                            '#B10F1C',
                            '#343A40',
                            '#B10F1C',  
                            '#343A40'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>