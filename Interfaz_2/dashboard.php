<?php
    include_once("../database/conexion.php");
    session_start();
    
    $usuario=$_SESSION['user'];
    $consulta = "SELECT E.DNI as dni,E.nombre as nombre, E.area as area, E.RFID as rfid FROM Usuario as U
                            INNER JOIN empleado as E on U.idUser=E.idUsuario WHERE user='$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    $row2 = mysqli_fetch_array($resultado);
    
?>

<?php
    //Obtendremos la cantidad de trabajadores con acceso a las áreas registrados 
    $consulta="SELECT COUNT(*) as contar FROM empleado";
    $resultado=mysqli_query($conexion,$consulta);
    $array=mysqli_fetch_array($resultado);
    $num_empleados=$array[0];

    //Obtenemos los registros aceptados y denegados
    $consultaAcep="SELECT COUNT(*) as contar FROM registro WHERE acceso=1 AND RFID!=''";
    $consultaDene="SELECT COUNT(*) as contar FROM registro WHERE acceso=0 AND RFID!=''";
    $resultadoA=mysqli_query($conexion,$consultaAcep);
    $resultadoD=mysqli_query($conexion,$consultaDene);
    $arrayA=mysqli_fetch_array($resultadoA);
    $arrayD=mysqli_fetch_array($resultadoD);
    $aceptados=$arrayA[0];
    $denegados=$arrayD[0];

    $areas = array('Sala de Seguridad', 'Sala de Operaciones A', 'Sala de Operaciones B', 'Sala de Operaciones C',
    'Sala de Operaciones D', 'Laboratorio');

    $a = array(0, 0, 0, 0, 0, 0);
    $d = array(0, 0, 0, 0, 0, 0);

    for ($i = 0; $i < 6; $i++) {
        $consultaAcep="SELECT COUNT(*) as contar FROM registro WHERE acceso=1 AND RFID!='' AND area='$areas[$i]'";
        $consultaDene="SELECT COUNT(*) as contar FROM registro WHERE acceso=0 AND RFID!='' AND area='$areas[$i]'";
        $resultadoA=mysqli_query($conexion,$consultaAcep);
        $resultadoD=mysqli_query($conexion,$consultaDene);
        $arrayA=mysqli_fetch_array($resultadoA);
        $arrayD=mysqli_fetch_array($resultadoD);
        $a[$i]=$arrayA[0];
        $d[$i]=$arrayD[0];     
    }
    
    $horas = array(0, 0, 0, 0);    

    $consultaInter="SELECT fecha FROM registro WHERE acceso=1 AND RFID!=''";        
    $resultadoI=mysqli_query($conexion,$consultaInter);
        
    for ($i = 0; $i < $aceptados ; $i++) {        
        $row=mysqli_fetch_array($resultadoI);
        $hora = substr($row['fecha'], 11, 2);        
        if($hora>=0 and $hora<6){ //0 a 6
            $horas[0]++;
        }
        if($hora>=6 and $hora<12){ //6 a 12
            $horas[1]++;
        }
        if($hora>=12 and $hora<18){ //12 a 18
            $horas[2]++;
        }
        if($hora>=18 and $hora<24){ //18 a 24
            $horas[3]++;
        }     
    }

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
    <link rel="icon" type="image/svg" href="assets/img/hospital.svg"/>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light  mb-0">
                    <a href="../Interfaz_1/inicio/index.php" class="text-light">Hospital Héroes del Bicentenario</a>
                    <br><br>
                    <i class="icon ion-md-hand mr-3"></i><i class="icon ion-md-heart mr-3"></i>
                </h4>
            </div>
            <div class="menu">
                <a href="" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Dashboard</a>

                <a href="../Interfaz_3/personal.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Personal</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Estadísticas</a>
                <a href="../Interfaz_3/acceso.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-book lead mr-2"></i></i>
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
                        <label for="usuario">Usuario : <?php echo $row2['dni'] //<$_SESSION['user'] ?> </label>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="">Dashboard</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="../Interfaz_3/personal.php">Personal</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="../Interfaz_3/acceso.php">Registro de acceso</a>
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
                            <h1 class="font-weight-bold mb-0">Centro de reportes y estadísticas</h1>
                            <p class="lead text-muted">Dashboard a cerca del uso de las áreas del hospital</p>
                          </div>
                          <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
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
                                        <h6 class="text-muted">Ingresos registrados a las áreas</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;"><?php echo $aceptados; ?></h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos denegados a las áreas</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;"><?php echo $denegados; ?></h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Empleados registrados</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;"><?php echo $num_empleados; ?></h3>
                                        <h6 class="text-success" style="text-align:right;"><i class="icon ion-md-swap mr-2"></i> 00.00%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Áreas bioseguridad</h6>
                                        <h3 class="font-weight-bold" style="text-align:center;">6</h3>
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
                  <div class="card rounded-0">
                    <div class="card-body">
                      <div class="row">
                        
                        <div class="col-lg-8 my-3 mx-auto">
                          <div class="card rounded-0">
                              <div class="card-header bg-light">                                
                                <h6 class="font-weight-bold mb-0">Cantidad de ingresos por áreas</h6>
                                <h4 style="text-align:right;"><span class="badge badge-dark">
                                        <?php 
                                            date_default_timezone_set('America/Lima'); 
                                            echo date('m-d-Y, h:i:s a', time()); 
                                        ?>
                                    </h4></span>
                              </div>
                              <div class="card-body">
                                <canvas id="myChart" width="300" height="150"></canvas>
                              </div>
                          </div>
                      </div>


                        <div class="col-lg-8 my-3 mx-auto">
                          <div class="card rounded-0">
                              <div class="card-header bg-light">
                                <h6 class="font-weight-bold mb-0">Distribución de ingresos por horarios</h6>
                              </div>
                              <div class="card-body">
                                <canvas id="horarios" width="300" height="150"></canvas>
                              </div>
                          </div>
                        </div>

                        <div class="col-lg-8 my-3 mx-auto">
                          <div class="card rounded-0">
                              <div class="card-header bg-light">
                                <h6 class="font-weight-bold mb-0">Ingresos denegados por áreas</h6>
                              </div>
                              <div class="card-body">
                                <canvas id="denegados" width="300" height="150"></canvas>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['S. Seguridad', 'S. Operaciones A', 'S. Operaciones B', 'S. Operaciones C', 'S. Operaciones D', 'Laboratorio'],
                    datasets: [{
                        label: 'Ingresos registrados',
                        data: [<?php echo $a[0]; ?>,<?php echo $a[1]; ?>,<?php echo $a[2]; ?>,<?php echo $a[3]; ?>,<?php echo $a[4]; ?>,<?php echo $a[5]; ?>],
                        backgroundColor: [
                            '#12C9E5',  
                            '#12C9E5',
                            '#12C9E5',
                            '#12C9E5',  
                            '#12C9E5',                            
                            '#12C9E5'
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
        <script>
          var ctx = document.getElementById('horarios').getContext('2d');
          var myChart = new Chart(ctx, { 
              type: 'doughnut',
              data: {
                  labels: ['00:00 - 06:00', '06:00 - 12:00', '12:00 - 18:00', '18:00 - 24:00'],
                  datasets: [{
                      label: 'Distribución de horarios',
                      data: [<?php echo $horas[0]; ?>,<?php echo $horas[1]; ?>,<?php echo $horas[2]; ?>,<?php echo $horas[3]; ?>],
                      backgroundColor: [
                          '#5DADE2',  
                          '#82E0AA',
                          '#FAD7A0',
                          '#F1948A'
                      ],
                      maxBarThickness: 30,
                      maxBarLength: 2
                  }]
              },              
          });
      </script>
      <script>
        var ctx = document.getElementById('denegados').getContext('2d');
        var myChart = new Chart(ctx, { 
            type: 'bar',
            data: {
                labels: ['S. Seguridad', 'S. Operaciones A', 'S. Operaciones B', 'S. Operaciones C', 'S. Operaciones D', 'Laboratorio'],
                datasets: [{
                    label: 'Ingresos denegados',                    
                    data: [<?php echo $d[0]; ?>,<?php echo $d[1]; ?>,<?php echo $d[2]; ?>,<?php echo $d[3]; ?>,<?php echo $d[4]; ?>,<?php echo $d[5]; ?>],
                    backgroundColor: [
                        '#12C9E5',  
                        '#12C9E5',
                        '#12C9E5',
                        '#12C9E5',  
                        '#12C9E5',                            
                        '#12C9E5'
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