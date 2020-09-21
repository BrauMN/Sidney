<?php
  session_start();

  if(!isset($_SESSION['user_id']))
  {
      header('location: login.php');
  }

  require 'include/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID_person, firstname, mail, pswd FROM T_Person WHERE ID_person = :ID_person');
    $records->bindParam(':ID_person', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
    
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/tabla.css">
<title>Incentivos</title>
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
  <?php if(!empty($user)): ?>
      <br><strong>Incentivos en el sistema.</strong><br>
    <?php endif; ?>
  <div class="incentivos">
    <table>
        <br>
    <tr>
    <th style="height: 55px" class="tiempo_in">Puntos necesarios</th>
    <th class="tiempo_in">Descripción</th>
    </tr>
    <?php

    require_once("include/Sidney_DAO.php");
    $dao = new SidneyDAO();
    $todos = $dao->selectAll();
    $contador=0; 
    foreach($todos as $objeto) {
        echo "<tr>";
    
           echo "<td align=left>".'De '.$objeto->getMin_pts().' a '.$objeto->getMax_pts().' puntos'."</td>";
           echo "<td width=400px>".$objeto->getDes()."</td>";
           echo "</tr>";
}
    
    ?>
    </table>
    </div>
</body>
</html>