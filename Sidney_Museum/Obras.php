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
<link rel="stylesheet" href="CSS/obras.css">
<title>Obras</title>
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
      <br><strong class="titulo">Obras en el sistema.</strong><br>
    <?php endif; ?>
  <div class="obras">
    <table>
        <br>

    <?php
      require_once("include/ObrasDAO.php");
      $dao = new ObrasDAO();
      $todos = $dao->selectAll();
      $contador=0;
      $name_obra="Nombre: ";
      $año_obra="Año: ";
      $tema="Tema: ";
      $autor="Autor: ";
    
      foreach($todos as $objeto) {
        
           echo "<tr align=center>";
           echo "<td class='norepeat' rowspan='4' width=500 height= 360><div class='img-side'><img class='img_img' src=".$objeto->getImg_obra()." alt=''><div class='info'><p style=opacity:1>".$objeto->getDes_obra()."</p></div></img></div></td>";

           echo "<td class='up_border'><strong>".$objeto->getName_obra()."</strong></td>";
           echo "</tr>";
           echo "<tr align=center>";
           
           echo "<td class='td_autor'>".$autor.$objeto->getAuthor_obra()."</td>";
           echo "</tr>";
           echo "<tr align=center>";
           
           echo "<td class='td_year'>".$año_obra.$objeto->getYear_obra()."</td>";
           echo "</tr>";
           echo "<tr align=center>";
           
           echo "<td class='td_theme'>".$tema.$objeto->getTheme_obra()."</td>";
           echo "</tr>";
        
    }

    /*echo "<td class='name_obra'><strong>".$name_obra."</strong></td>";
    echo "<td class='name_obra'><strong>".$autor."</strong></td>";
    echo "<td class='name_obra'><strong>".$año_obra."</strong></td>";
    echo "<td class='name_obra'><strong>".$tema."</strong></td>";*/
    ?>
    </table>
    </div>
</body>
</html>