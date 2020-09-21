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
  

  $class2=false;
  $name = null;
  $year = null;
  $descr = null;
  $author = null;
  $theme = null;
  $id = null;
  

   if(!empty($_POST['incentivo'])){
    $records = $conn->prepare('SELECT ID_painting_sculpture, name, year, author, theme FROM C_Painting_Sculpture WHERE name = :id AND f_deleted=0');
    $records->bindParam(':id', $_POST['incentivo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 1 && isset($_POST['class2']) && empty($_POST['name']) && empty($_POST['year']) && empty($_POST['author']) && empty($_POST['theme'])) {
        $class2=true;
        $id = $results['ID_painting_sculpture'];
        $name = $results['name'];
        $year = $results['year'];
        $author = $results['author'];
        $theme = $results['theme'];
    }
    else if($results==false){
      echo'<script type="text/javascript">
      alert("La obra solicitada no existe");
      </script>';
    }
}


require_once("include/ObrasDAO.php");



$objetoVO = new ObrasVO();
$objetoDAO = new ObrasDAO();

if (!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['author']) && !empty($_POST['theme'])) {
  $id_obra = $_POST['id'];
  $deleted_by_obra=$user['mail'];
  $objetoVO->setAll_Delete_Obras($id_obra, $deleted_by_obra, $id_obra);
  $bandera=$objetoDAO->Delete($objetoVO);
  
  
  
  if($bandera) {
      
      echo'<script type="text/javascript">
      alert("Obra eliminada exitosamente");
      </script>';
      
  } else {
    echo'<script type="text/javascript">
      alert("Hubo un problema eliminando la obra");
      </script>';
  }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/UpObras.css">
<title>Eliminar Obra</title>
</head>
<body>
  <div>
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Elimina una obra</strong>
    <?php endif; ?>
        <form action="DarBajaObra.php" method="POST">
            <br>
            <label for="id">Obra a eliminar</label>
    <select id="in" name="incentivo">
      <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 order by 1");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="incentivo">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <input type="number" name="id" id="id" class="id_incentivo" value="<?php echo $id;?>" style="display: none"/>
            <br>
            <br>
            <label for="name">Nombre de la obra</label>
            <br>
            <input type="text" name="name" placeholder="Nombre" readonly   value="<?php echo $name;?>"/>
            <br>
            <label for="año">Año de la obra</label>
            <br>
            <input type="number" name="year" placeholder="ej.- 1998" readonly   value="<?php echo $year;?>"/>
            <br>
            <label for="aut">Autor de la obra</label>
            <br>
            <input type="text" name="author" placeholder="Autor" readonly  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"   value="<?php echo $author;?>"/>
            <br>
            <label for="año">Tema de la obra</label>
            <br>
            <input type="text" name="theme" placeholder="Tema" readonly   value="<?php echo $theme;?>"/>
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