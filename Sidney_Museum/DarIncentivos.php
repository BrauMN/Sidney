<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header('location: login.php');
}

require 'include/database.php';

$message = '';


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


$end_time=htmlspecialchars($_POST["pts_min"]);
$end_time2=htmlspecialchars($_POST["pts_max"]);
$descr=htmlspecialchars($_POST["descr"]);
$created_by=$user['mail'];

require_once("include/Sidney_DAO.php");



$objetoVO = new SidneyVO();
$objetoDAO = new SidneyDAO();

if(!empty($_POST['descr'])){

    $record = $conn->prepare('SELECT * FROM C_Category_reward WHERE descr = :descriptionn AND f_deleted = 0');
    $record->bindParam(':descriptionn', $_POST['descr']);
    $record->execute();
    $result = $record->fetch(PDO::FETCH_ASSOC);
    if(count($result)>1){
        echo'<script type="text/javascript">
        alert("Ese incentivo ya existe, por favor agrega otro.");
        </script>';
    }
   else {
    $objetoVO->setAll(0, $end_time,$end_time2, $descr, $created_by);
    $bandera=$objetoDAO->Insert($objetoVO);


if($bandera) {
    
    echo'<script type="text/javascript">
    alert("Incentivo agregado exitosamente");
    </script>';
    
} else {
	echo'<script type="text/javascript">
    alert("Hubo un problema agregando el incentivo");
    </script>';
}
}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/DarAltaObras.css">
<title>Agregar Incentivo</title>
</head>
<body>
  <div class="preguntas">
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido. <?= $user['firstname']; ?></strong>
      <br><strong>Agrega un Incentivo.</strong>
    <?php endif; ?>
        <form action="DarIncentivos.php" method="POST">
          <br>
            <label for="name">Descripción del Incentivo</label>
            <br>
            <input type="text" name="descr" placeholder="Descripción" required="required" />
            <br>
            <br>
            <label for="Time">Puntos para adquirir el incentivo</label>
            <br>
            <br>
            <label for="pts_min">De</label>
            <input type="number" name="pts_min"/>
            <label for="pts_min">a</label>
            <input type="number" name="pts_max"/>
            <label for="pts_min">puntos</label>
            <br>
            <br>
            <br>
            <button type="submit" id="mas" name="abajo">Aceptar</button>
            <br>
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
