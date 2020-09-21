<?php
session_start();
  require 'include/database.php';

  $message = '';

  $nombre=NULL;
  $apellido_p=NULL;
  $apellido_m=NULL;
  $telephone=NULL;
  $direction=NULL;
  $email=NULL;
  $contra=NULL;
  $enviado=false;

  
  
  if(isset($_POST['enviado']))
  {
    $enviado=true;
    $nombre=$_POST['firstname'];
    $apellido_p=$_POST['f_last_name'];
    $apellido_m=$_POST['m_last_name'];
    $telephone=$_POST['phone'];
    $direction=$_POST['direction'];
    $email=$_POST['mail'];
    $contra=$_POST['pswd'];
  
  }


  if ($_POST['pswd'] != $_POST['confirm_password']) {
    echo'<script type="text/javascript">
    alert("Las contraseñas no coinciden");
    </script>';
 }

 else if (!empty($_POST['mail'])) {
  $records = $conn->prepare('SELECT ID_person, mail, pswd FROM T_Person WHERE mail = :mail');
  $records->bindParam(':mail', $_POST['mail']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 1 ) {
    echo'<script type="text/javascript">
    alert("El correo ya existe, por favor usa otro.");
    </script>';
    $email=NULL;
  } 
else{

  if (!empty($_POST['firstname']) && !empty($_POST['f_last_name']) && !empty($_POST['m_last_name']) && !empty($_POST['phone']) && !empty($_POST['direction']) && !empty($_POST['mail']) && !empty($_POST['pswd'])) {
    $sql = "INSERT INTO T_Person (ID_user_type, firstname, f_last_name, m_last_name, phone, direction, mail, pswd) VALUES (1,:firstname, :f_last_name, :m_last_name, :phone, :direction, :mail, :pswd)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':f_last_name', $_POST['f_last_name']);
    $stmt->bindParam(':m_last_name', $_POST['m_last_name']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':direction', $_POST['direction']);
    $stmt->bindParam(':mail', $_POST['mail']);
    $pswd = password_hash($_POST['pswd'], PASSWORD_BCRYPT);
    $stmt->bindParam(':pswd', $pswd);

    if ($stmt->execute()) {
      echo'<script type="text/javascript">
      alert("Usuario creado exitosamente");
      </script>';
      $nombre=NULL;
      $apellido_p=NULL;
      $apellido_m=NULL;
      $telephone=NULL;
      $direction=NULL;
      $email=NULL;
      $contra=NULL;
    } else {
      echo'<script type="text/javascript">
      alert("Lo sentimos, hubo un problema creando el usuario");
      </script>';
    }
  }
}
 }
 
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/crearus.css">
<title>CREARUS</title>

</head>
<body>
    <div>
    <a type="text" name="titulo" href="background.php">Sidney Museum</a>
        <h2>Crea tu cuenta por favor</h2>
        <form action="crearUs.php" method="POST">
            <label for="firstname">Nombre</label>
            <input type="text" name="firstname" placeholder="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required="required" value="<?php echo $nombre;?>" />
            <label for="last_name">Apellido paterno</label>
            <input type="text" name="f_last_name" placeholder="Apellido paterno" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required="required" value="<?php echo $apellido_p;?>" />
            <label for="last_name2">Apellido materno</label>
            <input type="text" name="m_last_name" placeholder="Apellido materno" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required="required" value="<?php echo $apellido_m;?>" />
            <label for="phone">Teléfono</label>
            <input type="tel" name="phone" placeholder="ej.- 55-33-44-33-44" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required="required" value="<?php echo $telephone;?>" />
            <label for="direction">Dirección</label>
            <input type="text" name="direction" placeholder="Dirección" required="required" value="<?php echo $direction;?>"/>
            <label for="email">Correo Electrónico</label>
            <input type="email" name="mail" placeholder="ej.- usuario@servidor.com" required="required" value="<?php echo $email;?>" />
            <label for="password">Contraseña</label>
            <input type="password" name="pswd" placeholder="Contraseña" pattern="[a-zA-Z0-9]{2,48}" required="required" />
            <label for="password">Confirmar contraseña</label>
            <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required="required" />
            <button type="submit" value="Submit" name="enviado">| ACEPTAR |</button>
            <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        </form>
    </div>
</body>
</html>