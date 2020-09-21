
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
$imgs = null;



$cont = date('Y');

 if(!empty($_POST['incentivo'])){
  $records = $conn->prepare('SELECT ID_painting_sculpture, name, year, descr, author, theme, img FROM C_Painting_Sculpture WHERE name = :id AND f_deleted=0');
  $records->bindParam(':id', $_POST['incentivo']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  if (count($results) > 1 && isset($_POST['class2'])  && empty($_POST['name']) && empty($_POST['year']) && empty($_POST['descr']) && empty($_POST['author']) && empty($_POST['theme'])) {
      $class2=true;
      $id = $results['ID_painting_sculpture'];
      $name = $results['name'];
      $year = $results['year'];
      $descr = $results['descr'];
      $author = $results['author'];
      $theme = $results['theme'];
      
  }
  else if($results==false){
    echo'<script type="text/javascript">
    alert("La obra solicitada no existe");
    </script>';
  }
  else if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['year']) || empty($_POST['descr']) || empty($_POST['author']) || empty($_POST['theme']))
  {
    echo'<script type="text/javascript">
    alert("Por favor llena todos los campos");
    </script>';
      $name = $_POST['name'];
      $year = $_POST['year'];
      $descr = $_POST['descr'];
      $author = $_POST['author'];
      $theme = $_POST['theme'];
      $id = $_POST['id'];
  }
  
  
}



require_once("include/ObrasDAO.php");



$objetoVO = new ObrasVO();
$objetoDAO = new ObrasDAO();

if (!empty($_POST['id']) &&!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['descr']) && !empty($_POST['author']) && !empty($_POST['theme']) && $_FILES['imagen_obra']['name'] != null) 
{
$id_obra = $_POST['id'];
$name_obra=htmlspecialchars($_POST["name"]);
$year_obra=htmlspecialchars($_POST["year"]);
$descr_obra=htmlspecialchars($_POST["descr"]);
$author_obra=htmlspecialchars($_POST["author"]);
$theme_obra=htmlspecialchars($_POST["theme"]);
$updated_by=$user['mail'];
$archivo = $_FILES['imagen_obra']['tmp_name'];
$destino = "imagenes/". trim($_FILES['imagen_obra']['name']);
move_uploaded_file($archivo,$destino);
$objetoVO->setAll_Update_Obras($id_obra, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $destino, $updated_by, $id_obra);
$bandera=$objetoDAO->Update($objetoVO);


if($bandera) {
    
    echo'<script type="text/javascript">
    alert("Obra actualizada exitosamente");
    </script>';
    
} else {
	echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la obra");
    </script>';
}

}

if (!empty($_POST['id']) &&!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['descr']) && !empty($_POST['author']) && !empty($_POST['theme']) && $_FILES['imagen_obra']['name'] == null) 
{
  $id_obra = $_POST['id'];
  $name_obra=htmlspecialchars($_POST["name"]);
  $year_obra=htmlspecialchars($_POST["year"]);
  $descr_obra=htmlspecialchars($_POST["descr"]);
  $author_obra=htmlspecialchars($_POST["author"]);
  $theme_obra=htmlspecialchars($_POST["theme"]);
  $updated_by=$user['mail'];
  $objetoVO->setAll_Update_Obras_2($id_obra, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $updated_by, $id_obra);
  $bandera=$objetoDAO->Update_2($objetoVO);
  if($bandera) {
    
    echo'<script type="text/javascript">
    alert("Obra actualizada exitosamente");
    </script>';
    
} else {
	echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la obra");
    </script>';
}

}



?>



<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript"  src="JS/UpObras.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/UpObras.css">
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
<title>Actualizar Obra</title>
</head>
<body>
  <div>
  <form action="UpObras.php" method="POST" enctype="multipart/form-data">
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Actualiza una obra.</strong>
      <br>
      
      <label for="id">Obra a actualizar</label>
    <?php endif; ?>
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
            <label for="name">Nombre de la obra</label>
            <br>
            <input type="text" id="n" name="name" placeholder="Nombre" disabled="disabled"  value="<?php echo $name;?>"/>
            <br>
            <label for="año">Año de la obra</label>
            <br>
            <select id="select_obra" name="year" style="width: 100px" disabled="disabled">
            <option id="sell" value="<?php echo $year;?>"><?php echo $year;?></option>
            <?php while ($cont >= 1000) { ?>
              <option id="sell" value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
            <?php $cont = ($cont-1); } ?>
            </select>
            <input type="file" name="imagen_obra" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
            <label  for="file-3" style="margin-left: 110px"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escoje una imagen (opcional)&hellip;</span></label>
            <br>
            <label for="des">Descripción de la obra</label>
            <br>
            <textarea type="text" id="d" name="descr" disabled="disabled" placeholder="Escribe una descripción..."><?php echo $descr;?></textarea>
            <br>
            <label for="aut">Autor de la obra</label>
            <br>
            <input type="text" id="a" name="author" disabled="disabled" placeholder="Autor" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"  value="<?php echo $author;?>"/>
            <br>
            <label for="año">Tema de la obra</label>
            <br>
            <input type="text" id="t" name="theme" disabled="disabled" placeholder="Tema"  value="<?php echo $theme;?>"/>
            <br>
            <br>
            <button name="class2"  type="submit" value="active" id="btn_up">Aceptar</button>
            <input type="button" name="modificar" value="Modificar" id="mod" onclick="enableBtn()" />
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
<script>
  
  'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
</script>
</html>