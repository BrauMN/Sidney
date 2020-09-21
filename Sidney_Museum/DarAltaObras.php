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

  $cont = date('Y');


$name_obra=htmlspecialchars($_POST["name_obra"]);
$year=htmlspecialchars($_POST["year"]);
$descr_obra=htmlspecialchars($_POST["descr"]);
$author_obra=htmlspecialchars($_POST["author"]);
$theme_obra=htmlspecialchars($_POST["theme"]);
$created_by=$user['mail'];

require_once("include/ObrasDAO.php");



$objetoVO = new ObrasVO();
$objetoDAO = new ObrasDAO();

if (!empty($_POST['name_obra']) && !empty($_POST['year']) && !empty($_POST['descr']) && !empty($_POST['author']) && !empty($_POST['theme'])) {
  $archivo = $_FILES['imagen_obra']['tmp_name'];
  $destino = "imagenes/". $_FILES['imagen_obra']['name'];
  move_uploaded_file($archivo,$destino);
  $objetoVO->setAll_Insert_Obras(0, $name_obra, $author_obra, $year, $descr_obra, $theme_obra, $destino, $created_by);
  $bandera=$objetoDAO->Insert($objetoVO);


if($bandera) {
    
    echo'<script type="text/javascript">
    alert("Obra agregada exitosamente");
    </script>';
    
} else {
	echo'<script type="text/javascript">
    alert("Hubo un problema agregando la obra");
    </script>';
}

}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/DarAltaObras.css">
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
<title>Agregar Obras</title>
</head>
<body>
  <div>
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Agrega una nueva obra.</strong>
    <?php endif; ?>
        <form action="DarAltaObras.php" method="POST" enctype="multipart/form-data">
          <br>
            <label for="name">Nombre de la obra</label>
            <br>
            <input type="text" class="name_obra" name="name_obra" placeholder="Nombre" required="required" />
            <br>
            <label for="año">Año de la obra</label>
            <br>
            <select id="sel1" name="year" style="width: 100px">
            <?php while ($cont >= 1000) { ?>
              <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
            <?php $cont = ($cont-1); } ?>
            </select>
            <input type="file" style="margin-left: 20px" name="imagen_obra" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
            <label for="file-3" style="margin-left: 110px"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escoje una imagen&hellip;</span></label>
            <br>
            <label for="des">Descripción de la obra</label>
            <br>
            <textarea type="text" name="descr" class="descr_obra" placeholder="Escribe una descripción..." required="required"></textarea>
            <br>
            <label for="aut">Autor de la obra</label>
            <br>
            <input type="text" name="author" placeholder="Autor" class="auth_obra" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required="required" />
            <br>
            <label for="año">Tema de la obra</label>
            <br>
            <input type="text" name="theme" placeholder="Tema" class="theme_obra" required="required" />
            <br>
            <br>
            <button type="submit" value="Submit" class="btn_insert">Aceptar</button>
            <br>
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