<?php

  require 'include/database.php';

  $message = '';

  session_start();


  if ($_POST['pswd'] != $_POST['new_password']) {
    $message='Las contraseñas no coinciden';
 }

else{
  if (isset($_SESSION['user_id']) && !empty($_POST['pswd'])) {
    $records = $conn->prepare('UPDATE T_Person set pswd = :password WHERE mail = :mail');
    $records->bindParam(':mail', $_POST['mail']);
    $password = password_hash($_POST['pswd'], PASSWORD_BCRYPT);
    $records->bindParam(':password', $password);    
    
    if ($records->execute()) {
      $message = 'Contraseña actualizada correctamente.';
    } else {
      $message = 'Lo sentimos, hubo un problema actualizando la contraseña.';
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/confirmar_contra.css">
    <title>RECONTRA</title>
</head>
<body>
    <div>
        <a type="text" name="titulo" href="cerrar_sesion.php">Sidney Museum</a>
        <h2>Cambia tu contraseña</h2>
        <form action="confirmar_contra.php" method="post">
            <label for="rec">Ingresa tu correo electrónico</label>
            <input type="email" name="mail" placeholder="Correo Electrónico" required="required" />
            <label for="rec">Ingresa tu contraseña nueva</label>
            <input type="password" name="pswd" placeholder="Contraseña" required="required" />
            <label for="rec">Confirma tu contraseña nueva</label>
            <input type="password" name="new_password" placeholder="Confirmar contraseña" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">| ACEPTAR |</button>
            <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        </form>
    </div>
</body>
</html>