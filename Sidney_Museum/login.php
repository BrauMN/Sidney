<?php

  session_start();


  if (isset($_SESSION['user_id'])) {
    
    header('Location: background.php');
  }
  require 'include/database.php';

  if (!empty($_POST['mail']) && !empty($_POST['pswd'])) {
    $records = $conn->prepare('SELECT ID_person, mail, pswd FROM T_Person WHERE mail = :mail AND ID_user_type = 1');
    $records->bindParam(':mail', $_POST['mail']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['pswd'], $results['pswd'])) {
      $_SESSION['user_id'] = $results['ID_person'];
      $record = $conn->prepare('SELECT ID_person, firstname, mail, pswd FROM T_Person WHERE mail = :mail AND ID_user_type = 1');
      $record->bindParam(':mail', $_POST['mail']);
      $record->execute();
      $result = $record->fetch(PDO::FETCH_ASSOC);
      header('Location: background.php');
    } else {
      echo'<script type="text/javascript">
            alert("Usuario o contraseña incorrectos");
            </script>';
    }
  }

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<title>LOGIN</title>
<link rel="stylesheet" href="CSS/log.css">
</head>
<body>


<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        <h1></h1>
        <br>
        <br>
        <br>
        <form action="login.php" method="POST">            
            <label for="co">Usuario</label>
            <br>
            <input type="email" name="mail" placeholder="Correo Electronico" required="required" />
            <br>
            <label for="pass">Contraseña</label>
            <br>
            <input type="password" name="pswd" placeholder="Contraseña" required="required" />
            <br>
            <button type="submit" class="btn btn-primary btn-block btn-large" >| INGRESAR |</button>
            <br>
            <br>
            <a type="text" name="rec" href="recontra.php">¿Has olvidado tu contraseña?</a>
        </form>
    
    
</body>
</html>