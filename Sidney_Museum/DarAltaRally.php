<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header('location: login.php');
}

require 'include/database.php';

$message = '';

$descr=null;
$time=null;
$btn=false;




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

require_once("include/RallyDAO.php");



$objetoVO = new RallyVO();
$objetoDAO = new RallyDAO();

if(!empty($_POST['des'])){
  $record = $conn->prepare('SELECT ID_rally, descriptionn FROM C_Rally WHERE descriptionn = :descriptionn AND f_deleted = 0');
  $record->bindParam(':descriptionn', $_POST['des']);
  $record->execute();
  $result = $record->fetch(PDO::FETCH_ASSOC);
  if(count($result)>1){
    echo'<script type="text/javascript">
    alert("Ese rally ya existe, por favor agrega otro.");
    </script>';
  }
 else {
 
 if(!empty($_POST['des']) && !empty($_POST['time'])){


  $des_rally=$_POST['des'];
  $time_rally=$_POST['time'];
  $created_by=$user['mail'];
  $objetoVO->setAll(0, $des_rally, $time_rally, $created_by);
  $bandera=$objetoDAO->Insert($objetoVO);


if($bandera) {
  
  echo'<script type="text/javascript">
  alert("Rally agregado exitosamente");
  </script>';
  
} else {
echo'<script type="text/javascript">
  alert("Hubo un problema agregando el rally");
  </script>';
}
 }
}
}





?>




<!DOCTYPE html>
<html>
<head>
<script type="text/javascript"  src="JS/UpObras.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/DarAltaObras.css">
<title>Agregar Rally</title>
</head>
<body>
  <div class="preguntas">
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido. <?= $user['firstname']; ?></strong>
      <br><strong>Agrega un nuevo rally.</strong>
    <?php endif; ?>
        <form action="DarAltaRally.php" method="POST">
          <br>
            <label for="name">Tema del Rally</label>
            <br>
            <select name="des">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT DISTINCT theme FROM C_Painting_Sculpture WHERE f_deleted = 0");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['theme'].'">'.$valores['theme'].'</option>';
          }
        ?>
            </select>
            <br>
            <label for="año">Tiempo máximo a completar el Rally</label>
            <br>
            <input type="time" name="time" class="without_ampm" min="00:00:00" max="02:00:00" step="1" placeholder="ej.- hh:mm:ss" required="required"/>
            <br>
            <br>
            <input type="submit" id="mas" name="abajo" value="Aceptar" />
        </form>
    </div>
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
  <?php if(!empty($message)): ?>
      <p class="rally"> <?= $message ?></p>
    <?php endif; ?>
</body>
</html>


