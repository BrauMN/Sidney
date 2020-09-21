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

$class2=false;
$name = null;
$year = null;
$descr = null;
$id = null;
$in = null;


 if(!empty($_POST['incentivo'])){
  $records = $conn->prepare('SELECT ID_category_reward, min_pts, max_pts, descr FROM C_Category_reward WHERE descr = :id AND f_deleted=0');
  $records->bindParam(':id', $_POST['incentivo']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  if (count($results) > 1 && isset($_POST['class2'])  && empty($_POST['descr']) && empty($_POST['pts_min'])) {
      $class2=true;
      $name = $results['descr'];
      $year = $results['min_pts'];
      $year2 = $results['max_pts'];
      $id = $results['ID_category_reward'];
      
  }
  else if($results==false){
    echo'<script type="text/javascript">
    alert("El incentivo introducido no existe");
    </script>';
  }
  else if(empty($_POST['id']) || empty($_POST['descr']) || empty($_POST['pts_min']) || empty($_POST['pts_max']))
  {
    echo'<script type="text/javascript">
    alert("Por favor llena todos los campos.");
    </script>';
      $name = $_POST['descr'];
      $year = $_POST['pts_min'];
      $year2 = $_POST['pts_max'];
      $in = $_POST['incentivo'];
      $id = $_POST['id'];
  }
  
}



require_once("include/Sidney_DAO.php");


$objetoVO = new SidneyVO();
$objetoDAO = new SidneyDAO();

if(!empty($_POST['descr']) && isset($_POST['class2'])){

  $in = $_POST['incentivo'];
  $id = $_POST['id'];
  $name = $_POST['descr'];
  $year = $_POST['pts_min'];
  $year2 = $_POST['pts_max'];
  $updated_by=$user['mail'];

  $objetoVO->setAll_Up($id, $year, $year2, $name, $updated_by, $id);
  $bandera=$objetoDAO->Update($objetoVO);


  if($bandera) {
    ?>
    <script>
      alert("Incentivo actualizado correctamente");
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Hubo un problema actualizando el incentivo");
    </script>
    <?php
  }
}

?>



<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript"  src="JS/UpObras.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/UpObras.css">
<title>Actualizar Incentivo</title>
</head>
<body>
  <div>
  <form action="UpIncentivos.php" method="POST">
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Actualiza un incentivo.</strong>
      <br>
      <br>
      <label for="id">Incentivo a Actualizar</label>
      <select id="in" name="incentivo">
      <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Category_reward WHERE f_deleted = 0 order by 1");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="incentivo">'.$valores['descr'].'</option>';
          }
        ?>
            </select>
            <input type="number" name="id" id="id" class="id_incentivo" value="<?php echo $id;?>" style="display: none"/>
            <br>
    <?php endif; ?>
    <br>    
    <label for="name">Descripción del Incentivo</label>
            <br>
            <input type="text" id="descr_premio" name="descr" disabled="disabled" placeholder="Descripción" required="required" value="<?php echo $name;?>"/>
            <br>
            <label for="Time">Puntos para adquirir el incentivo</label>
            <br>
            <br>
            <label for="pts_min">De</label>
            <input type="number" id="min_puntos" name="pts_min" value="<?php echo $year;?>" disabled="disabled"/>
            <label for="pts_min">a</label>
            <input type="number" id="max_puntos" name="pts_max" value="<?php echo $year2;?>" disabled="disabled"/>
            <label for="pts_min">puntos</label>
            <br>
            <br>
            <br>
            <button name="class2"  type="submit" value="active" id="btn_upp"> ACEPTAR </button>

            <input type="button" name="modificar" value="MODIFICAR" id="modi" onclick="enableBtn2()" />
            <br>
            <br>
            
            
            <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
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
</body>
</html>