<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/confirmar_contra.css">
    <title>RECONTRA</title>
</head>
<body>
    <?php
    if(isset($_GET['user']) && isset($_GET['token'])) {

        require 'include/database.php';

        $user = $conexion->real_escape_string($_GET['user']);
        $token = $conexion->real_escape_string($_GET['token']);

        $sql = $conexion->query("SELECT token FROM T_Person WHERE ID_person = '$user'");
        $row = $sql->fetch_array();

        if($row['token'] == $token) {

    ?>
    <div class="wrapper">

    <?php

    if($_POST['pswd'] != $_POST['new_password']) {
        echo'<script type="text/javascript">
        alert("Las contraseñas no coinciden");
        </script>';}
       else {
       if(isset($_POST['codigo'])) {
           require 'include/database.php';

           $clave = $conexion->real_escape_string($_POST['pswd']);
           $clave = password_hash($clave, PASSWORD_BCRYPT);

           $act = $conexion->query("UPDATE T_Person SET pswd = '$clave', token = '' WHERE ID_person = '$user'");

           if($act) {echo'<script type="text/javascript">
            alert("Su contraseña ha sido actualizada exitosamente");
            </script>';}
    
       }
    }
    ?>
        <a type="text" name="titulo" href="cerrar_sesion.php">Sidney Museum</a>
        <h2>Recupera tu contraseña</h2>
        <form action="" method="post">
            <label for="rec">Ingresa tu contraseña nueva</label>
            <input type="password" name="pswd" placeholder="Contraseña" required="required" />
            <label for="rec">Confirma tu contraseña nueva</label>
            <input type="password" name="new_password" placeholder="Confirmar contraseña" required="required" />
            <button type="submit" name="codigo"  class="btn btn-primary btn-block btn-large">| ACEPTAR |</button>
            <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        </form>
    </div>
</body>
            <?php } } ?>
</html>