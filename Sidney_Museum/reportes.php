<?php


session_start();

if(!isset($_SESSION['user_id']))
{
    header('location: login.php');
}

require 'include/database.php';




?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="CSS/reportes.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reportes</title>
</head>
<body>
<header>
    <nav class="navegacion">
      <ul class="menu">
          <li><a href="background.php">Inicio</a></li>
          <li><a href="rally.php">Rallys</a>
              <ul class="submenu">
                  <li><a href="DarAltaRally.php">Dar de alta un Rally</a></li>
                  <li><a href="DarAltaRallyQns.php">Agregar preguntas</a></li>  
                  <li><a href="UpRally.php">Actualizar Rally</a></li>  
                  <li><a href="DarBajaRally.php">Eliminar Rally</a></li>  
              </ul>
          </li>   
          <li><a href="incentivos.php">Incentivos</a>
              <ul class="submenu">
                  <li><a href="DarIncentivos.php">Ingresar incentivo</a></li> 
                  <li><a href="UpIncentivos.php">Actualizar Incentivo</a></li> 
                  <li><a href="DarBajaIncentivos.php">Eliminar Incentivo</a></li>  
              </ul>
          </li>                 
          <li><a href="Obras.php">Obras</a>
              <ul class="submenu">
                  <li><a href="DarAltaObras.php">Dar de alta obra</a></li> 
                  <li><a href="UpObras.php">Actualizar Obra</a></li> 
                  <li><a href="DarBajaObra.php">Eliminar Obra</a></li>  
              </ul>
          </li>          
          <li><a href="reportes.php">Reportes</a>
          </li>
          <li><a href="#">Usuario</a>
              <ul class="submenu">
                  <li><a href="crearUs.php">Crear Usuario</a></li>  
              </ul>
          </li>
              
          <li name="logout"><a href="cerrar_sesion.php">Cerrar sesión</a></li>
      </ul>
    </nav>
  </header>
  <br>
  <br>
  <br>
<canvas id="myChart" width="10%" height="3"></canvas>
<br>
<br>
<canvas id="myChart1"  width="10%" height="3"></canvas>
<br>
<br>
<canvas id="myChart2"  width="10%" height="3"></canvas>
<br>
<br>
<canvas id="myChart3"  width="10%" height="3"></canvas>
<br>
<br>
<canvas id="myChart4"  width="10%" height="3"></canvas>
<br>
<br>
<script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" integrity="sha256-JG6hsuMjFnQ2spWq0UiaDRJBaarzhFbUxiUTxQDA9Lk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js" integrity="sha256-J2sc79NPV/osLcIpzL3K8uJyAD7T5gaEFKlLDM18oxY=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" integrity="sha256-CfcERD4Ov4+lKbWbYqXD6aFM9M51gN4GUEtDhkWABMo=" crossorigin="anonymous"></script>    
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php
          $sql = "SELECT t.descriptionn AS des, TIME_TO_SEC(SEC_TO_TIME(AVG(TIME_TO_SEC(c.time_played))))/60 FROM C_Rally t,T_Game c WHERE c.ID_rally = t.ID_rally AND t.f_deleted = '0' GROUP BY c.ID_rally ORDER BY TIME_TO_SEC(SEC_TO_TIME(AVG(TIME_TO_SEC(c.time_played))))/60 DESC";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
           ?>
            ['<?php echo $registros["des"] ?>'],
           <?php 
          }
        ?>],
        datasets: [{
            label: 'Promedio en minutos',
            backgroundColor: '#B86755',
            borderColor: 'black',
            data: [<?php
            $a=' minutos';
          $sql2 = "SELECT t.descriptionn, TIME_TO_SEC(SEC_TO_TIME(AVG(TIME_TO_SEC(c.time_played))))/60 FROM C_Rally t,T_Game c WHERE c.ID_rally = t.ID_rally AND t.f_deleted = '0' GROUP BY c.ID_rally ORDER BY TIME_TO_SEC(SEC_TO_TIME(AVG(TIME_TO_SEC(c.time_played))))/60 DESC";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["TIME_TO_SEC(SEC_TO_TIME(AVG(TIME_TO_SEC(c.time_played))))/60"] ?>'],
           <?php 
          }
        ?>
        ]
        }	
		]},
    options: {
                            legend: { 
                                display: true,
                                position: 'top',
                            },
                            scales: {
                                yAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                                xAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                            },
                            pointLabels: { 
                            },

                            title: {
                                display: true,
                                text: 'Tiempo promedio en que se resuelve un rally',
                                fontSize: 30,
                                fontFamily: "candara",
                                fontColor: '#000',  
                                position: 'top',
                            },
                        }             
                    });
var ctx1 = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: 'Rally´s totales jugados al mes',
            backgroundColor: '#38A8B6',
            borderColor: '#38A8B6',
            fill:false,
            data: [<?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_enero FROM T_Game WHERE entry_date >'2020-01-01 00:00:00' AND entry_date <'2020-02-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_enero"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_febrero FROM T_Game WHERE entry_date >'2020-02-01 00:00:00' AND entry_date <'2020-03-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_febrero"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_marzo FROM T_Game WHERE entry_date >'2020-03-01 00:00:00' AND entry_date <'2020-04-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_marzo"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_abril FROM T_Game WHERE entry_date >'2020-04-01 00:00:00' AND entry_date <'2020-05-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_abril"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_mayo FROM T_Game WHERE entry_date >'2020-05-01 00:00:00' AND entry_date <'2020-06-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_mayo"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_junio FROM T_Game WHERE entry_date >'2020-06-01 00:00:00' AND entry_date <'2020-07-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_junio"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_julio FROM T_Game WHERE entry_date >'2020-07-01 00:00:00' AND entry_date <'2020-08-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_julio"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_agosto FROM T_Game WHERE entry_date >'2020-08-01 00:00:00' AND entry_date <'2020-09-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_agosto"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_septiembre FROM T_Game WHERE entry_date >'2020-09-01 00:00:00' AND entry_date <'2020-10-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_septiembre"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_octubre FROM T_Game WHERE entry_date >'2020-10-01 00:00:00' AND entry_date <'2020-11-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_octubre"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_noviembre FROM T_Game WHERE entry_date >'2020-11-01 00:00:00' AND entry_date <'2020-12-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_noviembre"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_game) AS datos_diciembre FROM T_Game WHERE entry_date >'2020-12-01 00:00:00' AND entry_date <'2021-01-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_diciembre"] ?>'],
           <?php 
          }
        ?>]
        },
		]},
    options: {
                            legend: { 
                                display: true,
                                position: 'top',
                            },
                            scales: {
                                yAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                                xAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                            },
                            pointLabels: { 
                            },

                            title: {
                                display: true,
                                text: 'Número de rally´s totales jugados al mes',
                                fontSize: 30,
                                fontFamily: "candara",
                                fontColor: '#000',  
                                position: 'top',
                            },
                        }             
                    });

var ctx2 = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx2, {
    type: 'doughnut',
    data: 	
	{
				datasets: [{
					 data: [<?php
          $sql2 = "SELECT DISTINCT descriptionn, COUNT(ID_game) FROM C_Rally c INNER JOIN T_Game t WHERE c.ID_rally = t.ID_rally AND f_deleted = 0 GROUP BY descriptionn ORDER BY COUNT(ID_game) ASC";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["COUNT(ID_game)"] ?>'],
           <?php 
          }
        ?>
        ],
					backgroundColor: ['palevioletred', 'papayawhip', 'peachpuff','peru','violet','powderblue','rosybrown'],
					label: 'Rally más jugado'
				}],
				labels: [
					<?php
          $sql = "SELECT DISTINCT descriptionn, COUNT(ID_game) FROM C_Rally c INNER JOIN T_Game t WHERE c.ID_rally = t.ID_rally AND f_deleted = 0 GROUP BY descriptionn ORDER BY COUNT(ID_game) ASC";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
           ?>
            ['<?php echo $registros["descriptionn"] ?>'],
           <?php 
          }
        ?>
				]
        },
        options: {
                            legend: { 
                                display: true,
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Rallýs más jugados',
                                fontSize: 30,
                                fontFamily: "candara",
                                fontColor: '#000',  
                                position: 'top',
                            },
                        }             
                    });
var ctx3 = document.getElementById('myChart3').getContext('2d');
var chart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: [<?php
          $sql = "SELECT DISTINCT descriptionn, COUNT(ID_game) FROM C_Rally c INNER JOIN T_Game_answer t WHERE c.ID_rally = t.ID_rally AND f_deleted = 0 GROUP BY descriptionn ORDER BY COUNT(ID_game) ASC";
          $result = mysqli_query($conexion, $sql);
          while ($registros = mysqli_fetch_array($result)) {
           ?>
            ['<?php echo $registros["descriptionn"] ?>'],
           <?php 
          }
        ?>],
        datasets: [{
            label: 'Respuestas del rally',
            backgroundColor: '#42a5f5',
            borderColor: 'gray',
            data: [<?php
          $sql2 = "SELECT DISTINCT descriptionn, COUNT(ID_game) as res1 FROM C_Rally c INNER JOIN T_Game_answer t WHERE c.ID_rally = t.ID_rally AND f_deleted = 0 GROUP BY descriptionn ORDER BY COUNT(ID_game) ASC";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["res1"] ?>'],
           <?php 
          }
        ?>
        ]
        },{
            label: 'Respuestas correctas del rally',
            backgroundColor: '#ffab91',
            borderColor: 'yellow',
            data: [<?php
          $sql2 = "SELECT DISTINCT descriptionn, COUNT(ID_game) as res2 FROM C_Rally c INNER JOIN T_Game_answer t WHERE c.ID_rally = t.ID_rally AND f_deleted = 0 AND t.result = 1 GROUP BY descriptionn ORDER BY COUNT(ID_game) ASC";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["res2"] ?>'],
           <?php 
          }
        ?>
        ]
        }		
		]},
    options: {
                            legend: { 
                                display: true,
                                position: 'top',
                            },
                            scales: {
                                yAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                                xAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                            },
                            pointLabels: { 
                            },

                            title: {
                                display: true,
                                text: 'Total de respuestas de cada rally',
                                fontSize: 30,
                                fontFamily: "candara",
                                fontColor: '#000',  
                                position: 'top',
                            },
                        }             
                    });

var ctx4 = document.getElementById('myChart4').getContext('2d');
var chart = new Chart(ctx4, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: 'Número de usuarios que ingresan a la app por mes ',
            backgroundColor: '#E16262',
            fill:false,
            borderColor: '#E16262',
            data: [<?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_enero FROM T_sesion WHERE created >'2020-01-01 00:00:00' AND created <'2020-02-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_enero"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_febrero FROM T_sesion WHERE created >'2020-02-01 00:00:00' AND created <'2020-03-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_febrero"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_marzo FROM T_sesion WHERE created >'2020-03-01 00:00:00' AND created <'2020-04-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_marzo"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_abril FROM T_sesion WHERE created >'2020-04-01 00:00:00' AND created <'2020-05-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_abril"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_mayo FROM T_sesion WHERE created >'2020-05-01 00:00:00' AND created <'2020-06-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_mayo"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_junio FROM T_sesion WHERE created >'2020-06-01 00:00:00' AND created <'2020-07-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_junio"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_julio FROM T_sesion WHERE created >'2020-07-01 00:00:00' AND created <'2020-08-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_julio"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_agosto FROM T_sesion WHERE created >'2020-08-01 00:00:00' AND created <'2020-09-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_agosto"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_septiembre FROM T_sesion WHERE created >'2020-09-01 00:00:00' AND created <'2020-10-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_septiembre"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_octubre FROM T_sesion WHERE created >'2020-10-01 00:00:00' AND created <'2020-11-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_octubre"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_noviembre FROM T_sesion WHERE created >'2020-11-01 00:00:00' AND created <'2020-12-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_noviembre"] ?>'],
           <?php 
          }
        ?>
        <?php
          $sql2 = "SELECT COUNT(ID_person) AS datos_diciembre FROM T_sesion WHERE created >'2020-12-01 00:00:00' AND created <'2021-01-01 00:00:00'";
          $resu = mysqli_query($conexion, $sql2);
          while ($regis = mysqli_fetch_array($resu)) {
           ?>
            ['<?php echo $regis["datos_diciembre"] ?>'],
           <?php 
          }
        ?>]
        }		
		]},
    options: {
                            legend: { 
                                display: true,
                                position: 'top',
                            },
                            scales: {
                                yAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                                xAxes: [{
                                    ticks: { 
                                        beginAtZero: true,
                                    }
                                }],
                            },
                            pointLabels: { 
                            },

                            title: {
                                display: true,
                                text: 'Usuarios que ingresan a la app por mes',
                                fontSize: 30,
                                fontFamily: "candara",
                                fontColor: '#000',  
                                position: 'top',
                            },
                        }             
                    });

</script>
</body>
</html>    


