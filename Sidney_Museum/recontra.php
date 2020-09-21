<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/confirmar_contra.css">
    <title>RECONTRA</title>
</head>
<body>
    <div  class="wrapper">
    <?php

$message="";

if(isset($_POST['enviar'])) {
    require 'include/database.php';

    $email = $conexion->real_escape_string($_POST['mail']);

    $sql = $conexion->query("SELECT firstname, ID_person, mail FROM T_Person WHERE mail = '$email'");
    $row = $sql->fetch_array();
    $count = $sql->num_rows;

    if($count == 1) {
        $token = uniqid();
        $act = $conexion->query("UPDATE T_Person SET token = '$token' WHERE mail = '$email'");

        $email_to = $email;
        $email_subject = "Cambio de clave";
        $email_from = "Sidney@museum.com";

        $email_message = "Hola " . $row['firstname'] . ", solicitaste cambiar tu clave, ingresa al siguiente enlace\n\n";
        $email_message .= "https://nemonico.com.mx/braulio/Sidney_Museum/confirmarcontra.php?user=".$row['ID_person']."&token=".$token."\n\n";

        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);

        echo'<script type="text/javascript">
            alert("Te hemos enviado un correo electrónico para cambiar tu contraseña.");
            </script>';
    }
    else{
        echo'<script type="text/javascript">
            alert("El correo electrónico no está registrado.");
            </script>';
    }
}
?>
<br>
<br>
        <a type="text" name="titulo" href="cerrar_sesion.php">Sidney Museum</a>
        <h2>Cambia tu contraseña</h2>
        <form action="recontra.php" method="post">
            <label for="rec">Ingresa tu correo electrónico</label>
            <input type="email" name="mail" placeholder="Correo Electrónico" required="required" />
            <button type="submit" name="enviar" class="btn btn-primary btn-block btn-large">| ACEPTAR |</button>
            <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        </form>
    </div>
</body>
</html>
