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
<link rel="stylesheet" href="CSS/rally.css">
<title>Rally´s</title>
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
  <?php if(!empty($user)): ?>
    <br>
      <br><strong class="titulo_rally">Rallys en el sistema.</strong>
<strong class="titulo_preguntas">Preguntas de cada rally.</strong>
    <?php endif; ?>
  <div class="rallys">
    <table>
        <br>
    <tr>
    <th>Tiempo a completar el rally</th>
    <th>Rally</th>
    </tr>
    <?php
      $sql="SELECT * from C_Rally WHERE f_deleted = 0";
      
      $result=mysqli_query($conexion,$sql);
    
    if($result) {
        while($row=mysqli_fetch_assoc($result))
        {
           echo "<tr>";
    
           echo "<td align=center>".$row["maximum_time"]."</td>";
           echo "<td width=450px>".$row["descriptionn"]."</td>";
           echo "</tr>";
        }
    }
    else
    {
        echo "Error";
    }
    ?>
    </table>
    </div>
    <div class="preguntas">
    <table>
        <br>
    <tr>

    <th style="height: 55px">Rally</th>
    <th>Pregunta</th>
    <th>Respuesta</th>
    </tr>
    <?php
      $sql="SELECT c.descriptionn AS rally, t.question AS question, t.answer AS answer FROM T_Rally_painting t, C_Rally c WHERE c.ID_rally=t.ID_rally AND t.f_deleted=0 ORDER BY 1";
      $result=mysqli_query($conexion,$sql);
    
    if($result) {
        while($row=mysqli_fetch_assoc($result))
        {
           echo "<tr>";
    
           echo "<td>".$row["rally"]."</td>";
           echo "<td>".$row["question"]."</td>";
           echo "<td>".$row["answer"]."</td>";
           echo "</tr>";
        }
    }
    else
    {
        echo "Error";
    }
    ?>
    </table>
    </div>
</body>
</html>