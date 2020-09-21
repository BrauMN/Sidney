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
  $author = null;
  $theme = null;
  $id = null;
  

  if(!empty($_POST['incentivo'])){
    $records = $conn->prepare('SELECT * FROM C_Category_reward WHERE descr = :id AND f_deleted=0');
    $records->bindParam(':id', $_POST['incentivo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 1 && isset($_POST['class2'])  && empty($_POST['descr'])) {
        $class2=true;
        $id = $results['ID_category_reward'];
        $name = $results['descr'];
        $year = $results['min_pts'];
        $year2 = $results['max_pts'];

        
    }
    else if($results==false){
      echo'<script type="text/javascript">
      alert("El incentivo solicitado no existe");
      </script>';
    }
}

require_once("include/Sidney_DAO.php");


$objetoVO = new SidneyVO();
$objetoDAO = new SidneyDAO();

if(!empty($_POST['descr'])){

  $id = $_POST['id'];
  $deleted_by = $user['mail'];
  
  $objetoVO->setAll_Del($id, $deleted_by, $id);
  $bandera=$objetoDAO->Delete($objetoVO);


  if($bandera) {
    echo'<script type="text/javascript">
        alert("Incentivo eliminado exitosamente");
        </script>';
  } else {
    echo'<script type="text/javascript">
        alert("Hubo un problema eliminando el incentivo");
        </script>';
  }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/UpObras.css">
<title>Eliminar incentivo</title>
</head>
<body>
  <div>
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Elimina un incentivo</strong>
    <?php endif; ?>
        <form action="DarBajaIncentivos.php" method="POST">
            <br>
            <label for="id">Incentivo a Eliminar</label>
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
            <br>
            <label for="name">Descripción del incentivo</label>
            <br>
            <input type="text" name="descr" placeholder="Descripcion" readonly="readonly"   value="<?php echo $name;?>"/>
            <br>
            <label for="Time">Puntos para adquirir el incentivo</label>
            <br>
            <br>
            <label for="pts_min">De</label>
            <input type="number" id="min_puntos" name="pts_min" value="<?php echo $year;?>" readonly="readonly"/>
            <label for="pts_min">a</label>
            <input type="number" id="max_puntos" name="pts_max" value="<?php echo $year2;?>" readonly="readonly"/>
            <label for="pts_min">puntos</label>
            <br>
            <br>
            <br>

            <button name="class2" type="submit" value="Submit">ACEPTAR</button>
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