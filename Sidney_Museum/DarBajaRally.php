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




$answer_rally=NULL;
$answer_pintura=NULL;

$graba=NULL;
$res=NULL;
$record=NULL;
$result=NULL;
$sql=NULL;
$stmt=NULL;


$id=NULL;
$des=NULL;
$time=NULL;
$p1=NULL;
$p2=NULL;
$class2=false;
$query=NULL;
$iddd=$_POST['id'];
$descrip=$_POST['des'];
$max_time=$_POST['time'];
$select=$_POST['incentivo'];
$q1=$_POST['question1'];
$q2=$_POST['question2'];
$q3=$_POST['question3'];
$q4=$_POST['question4'];
$q5=$_POST['question5'];
$q6=$_POST['question6'];
$q7=$_POST['question7'];
$q8=$_POST['question8'];
$q9=$_POST['question9'];
$q10=$_POST['question10'];
$q11=$_POST['question11'];
$q12=$_POST['question12'];
$q13=$_POST['question12'];
$q14=$_POST['question14'];
$q15=$_POST['question15'];
$q16=$_POST['question16'];
$q17=$_POST['question17'];
$q18=$_POST['question18'];
$q19=$_POST['question19'];
$q20=$_POST['question20'];
$r1=$_POST['answer1'];
$r2=$_POST['answer2'];
$r3=$_POST['answer3'];
$r4=$_POST['answer4'];
$r5=$_POST['answer5'];
$r6=$_POST['answer6'];
$r7=$_POST['answer7'];
$r8=$_POST['answer8'];
$r9=$_POST['answer9'];
$r10=$_POST['answer10'];
$r11=$_POST['answer11'];
$r12=$_POST['answer12'];
$r13=$_POST['answer13'];
$r14=$_POST['answer14'];
$r15=$_POST['answer15'];
$r16=$_POST['answer16'];
$r17=$_POST['answer17'];
$r18=$_POST['answer18'];
$r19=$_POST['answer19'];
$r20=$_POST['answer20'];

$p1 = NULL;
$p2 = NULL;
$p3 = NULL;
$p4 = NULL;
$p5 = NULL;
$p6 = NULL;
$p7 = NULL;
$p8 = NULL;
$p9 = NULL;
$p10 = NULL;
$p11 = NULL;
$p12 = NULL;
$p13 = NULL;
$p14 = NULL;
$p15 = NULL;
$p16 = NULL;
$p17 = NULL;
$p18 = NULL;
$p19 = NULL;
$p20 = NULL;
$a1 = NULL;
$a2 = NULL;
$a3 = NULL;
$a4 = NULL;
$a5 = NULL;
$a6 = NULL;
$a7 = NULL;
$a8 = NULL;
$a9 = NULL;
$a10 = NULL;
$a11 = NULL;
$a12 = NULL;
$a13 = NULL;
$a14 = NULL;
$a15 = NULL;
$a16 = NULL;
$a17 = NULL;
$a18 = NULL;
$a19 = NULL;
$a20 = NULL;



if(!empty($_POST['incentivo'])){
    $graba = $conn->prepare("SELECT ID_rally, descriptionn, maximum_time FROM C_Rally WHERE descriptionn = '".$select."' AND f_deleted=0");
    $graba->execute();
    $res = $graba->fetch(PDO::FETCH_ASSOC);
    
    
    if (count($res) > 1  && isset($_POST['aceptar'])  && empty($_POST['des']) && empty($_POST['time'])) {
        $class2=true;
        $id = $res['ID_rally'];
        $des = $res['descriptionn'];
        $time = $res['maximum_time'];

}
    else if($res==false){
      echo'<script type="text/javascript">
      alert("El rally solicitado no existe");
      </script>';
}
}

if(isset($_POST['mostrar_preguntas'])){
$query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
  while ($consulta = mysqli_fetch_array($query)) {
    $id_rally[]=$consulta['ID_rally'];
    $question[]=$consulta['question'];
    $answer[]=$consulta['answer'];
  }
$p1 = $question[0];
    $p2 = $question[1];
    $p3 = $question[2];
    $p4 = $question[3];
    $p5 = $question[4];
    $p6 = $question[5];
    $p7 = $question[6];
    $p8 = $question[7];
    $p9 = $question[8];
    $p10 = $question[9];
    $p11 = $question[10];
    $p12 = $question[11];
    $p13 = $question[12];
    $p14 = $question[13];
    $p15 = $question[14];
    $p16 = $question[15];
    $p17 = $question[16];
    $p18 = $question[17];
    $p19 = $question[18];
    $p20 = $question[19];
    $a1 = $answer[0];
    $a2 = $answer[1];
    $a3 = $answer[2];
    $a4 = $answer[3];
    $a5 = $answer[4];
    $a6 = $answer[5];
    $a7 = $answer[6];
    $a8 = $answer[7];
    $a9 = $answer[8];
    $a10 = $answer[9];
    $a11 = $answer[10];
    $a12 = $answer[11];
    $a13 = $answer[12];
    $a14 = $answer[13];
    $a15 = $answer[14];
    $a16 = $answer[15];
    $a17 = $answer[16];
    $a18 = $answer[17];
    $a19 = $answer[18];
    $a20 = $answer[19];
    $id = $_POST['id'];
    $des = $_POST['des'];
    $time = $_POST['time'];

}


if(isset($_POST['abajo'])){
        
          
          $sql = "UPDATE C_Rally SET deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally = '".$iddd."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
        alert("Rally eliminado exitosamente");
        </script>';
          }
          else{
            echo'<script type="text/javascript">
        alert("Hubo un problema eliminando el rally");
        </script>';
          }
        }

        if(isset($_POST['abajo'])){
        
          
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally = '".$iddd."'";
            
            if(mysqli_multi_query($conexion, $sql))
            {

          }
          
          }

          if(isset($_POST['btn_q1']) && !empty($_POST['question1']) && !empty($_POST['answer1']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          
          $sql = "UPDATE T_Rally_painting SET  question = '".$q1."', answer = '".$r1."', deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted = 1 WHERE ID_rally_painting = '".$id_rally_paint[0]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
        
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
  
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q2']) && !empty($_POST['question2']) && !empty($_POST['answer2']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  question = '".$q2."', answer = '".$r2."', deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."',f_deleted = 1 WHERE ID_rally_painting = '".$id_rally_paint[1]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
       
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
    
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q3']) && !empty($_POST['question3']) && !empty($_POST['answer3']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  question = '".$q3."', answer = '".$r3."', deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted = 1 WHERE ID_rally_painting = '".$id_rally_paint[2]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
     
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
        
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q4']) && !empty($_POST['question4']) && !empty($_POST['answer4']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[3]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
     
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
       
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q5']) && !empty($_POST['question5']) && !empty($_POST['answer5']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[4]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
      
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
      
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q6']) && !empty($_POST['question6']) && !empty($_POST['answer6']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[5]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
     
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];

            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q7']) && !empty($_POST['question7']) && !empty($_POST['answer7']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[6]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];

            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
     
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q8']) && !empty($_POST['question8']) && !empty($_POST['answer8']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[7]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
  
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];

            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q9']) && !empty($_POST['question9']) && !empty($_POST['answer9']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[8]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];

            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];

            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q10']) && !empty($_POST['question10']) && !empty($_POST['answer10']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[9]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];

            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];

            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q11']) && !empty($_POST['question11']) && !empty($_POST['answer11']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[10]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];

            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
 
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q12']) && !empty($_POST['question12']) && !empty($_POST['answer12']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[11]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
   
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];

            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q13']) && !empty($_POST['question13']) && !empty($_POST['answer13']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[12]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
 
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
  
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q14']) && !empty($_POST['question14']) && !empty($_POST['answer14']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[13]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];

            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
   
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q15']) && !empty($_POST['question15']) && !empty($_POST['answer15']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[14]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];

            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];

            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q16']) && !empty($_POST['question16']) && !empty($_POST['answer16']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[15]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];

            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];

            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q17']) && !empty($_POST['question17']) && !empty($_POST['answer17']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[16]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];

            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];

            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q18']) && !empty($_POST['question18']) && !empty($_POST['answer18']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[17]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];

            $p19 = $_POST['question19'];
            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
 
            $a19 = $_POST['answer19'];
            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q19']) && !empty($_POST['question19']) && !empty($_POST['answer19']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[18]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];

            $p20 = $_POST['question20'];
            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];

            $a20 = $_POST['answer20'];
          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

        if(isset($_POST['btn_q20']) && !empty($_POST['question20']) && !empty($_POST['answer20']))
        {
          $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally_paint[]=$consulta['ID_rally_painting'];
            $id_rally[]=$consulta['ID_rally'];
            $id_paint[]=$consulta['ID_painting_sculpture'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
          $sql = "UPDATE T_Rally_painting SET  deleted = CURRENT_TIMESTAMP, deleted_by = '".$user['mail']."', f_deleted=1 WHERE ID_rally_painting = '".$id_rally_paint[19]."'";
          
          if(mysqli_multi_query($conexion, $sql))
          {
            echo'<script type="text/javascript">
            alert("Pregunta eliminada exitosamente");
            </script>';
            $id = $_POST['id'];
            $des = $_POST['des'];
            $time = $_POST['time'];
            $p1 = $_POST['question1'];
            $p2 = $_POST['question2'];
            $p3 = $_POST['question3'];
            $p4 = $_POST['question4'];
            $p5 = $_POST['question5'];
            $p6 = $_POST['question6'];
            $p7 = $_POST['question7'];
            $p8 = $_POST['question8'];
            $p9 = $_POST['question9'];
            $p10 = $_POST['question10'];
            $p11 = $_POST['question11'];
            $p12 = $_POST['question12'];
            $p13 = $_POST['question13'];
            $p14 = $_POST['question14'];
            $p15 = $_POST['question15'];
            $p16 = $_POST['question16'];
            $p17 = $_POST['question17'];
            $p18 = $_POST['question18'];
            $p19 = $_POST['question19'];

            $a1 = $_POST['answer1'];
            $a2 = $_POST['answer2'];
            $a3 = $_POST['answer3'];
            $a4 = $_POST['answer4'];
            $a5 = $_POST['answer5'];
            $a6 = $_POST['answer6'];
            $a7 = $_POST['answer7'];
            $a8 = $_POST['answer8'];
            $a9 = $_POST['answer9'];
            $a10 = $_POST['answer10'];
            $a11 = $_POST['answer11'];
            $a12 = $_POST['answer12'];
            $a13 = $_POST['answer13'];
            $a14 = $_POST['answer14'];
            $a15 = $_POST['answer15'];
            $a16 = $_POST['answer16'];
            $a17 = $_POST['answer17'];
            $a18 = $_POST['answer18'];
            $a19 = $_POST['answer19'];

          }
          else{
            echo'<script type="text/javascript">
            alert("Hubo un problema eliminando la pregunta");
            </script>';
          }
        }

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/DarAltaQns.css">
<title>Eliminar Rally</title>
</head>
<body>
  <div class="preguntas">
  <form class="osi" name="form0" action="DarBajaRally.php" method="POST">
  <?php if(!empty($user)): ?>
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Elimina un rally.</strong>
      <br>
      <br>
      <label for="id">Escoja el rally que quiere eliminar y presione aceptar</label>
          <br>
          <select id="in" name="incentivo">
      <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Rally WHERE f_deleted = 0 order by 1");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="incentivo">'.$valores['descriptionn'].'</option>';
          }
        ?>
            </select>
            <input type="number" name="id" id="id" class="id_incentivo" value="<?php echo $id;?>" style="display: none"/>
    <?php endif; ?>
          <br>
            <label for="name">Descripción del Rally</label>
            <br>
            <input type="text" name="des" value="<?php echo $des;?>" readonly="readonly" placeholder="Descripción" required="required" />
            <br>
            <label for="año">Tiempo máximo a completar el Rally</label>
            <br>
            <input type="time" name="time" value="<?php echo $time;?>" readonly="readonly" class="without_ampm" min="00:00:00" max="03:00:00" step="1" placeholder="ej.- hh:mm:ss" />
            <br>
            <input type="submit" id="mas_m" name="aceptar" value="Aceptar" />
            <br>
            <br>
            <input type="submit" id="mas_m" name="abajo" value="Borrar Rally" />
            <br>
            <br>
            <input type="submit" id="mostrar_p" name="mostrar_preguntas" value="Mostrar Preguntas" />
            <br>
            <label for="name">Pregunta 1</label>
            <br>
            <input type="text" id="q1" value="<?php echo $p1;?>" name="question1" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name">Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a1;?>" name="answer1" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q1" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab2">Pregunta 2</label>
            <br>
            <input type="text" id="q2" name="question2" value="<?php echo $p2;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_2" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a2;?>" name="answer2" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" id="btnq2" name="btn_q2" value="Borrar Pregunta"/>
            <br>
            <br>
            <label for="name" id="lab3" >Pregunta 3</label>
            <br>
            <input type="text" id="q3" name="question3" value="<?php echo $p3;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_3" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a3;?>" name="answer3" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q3" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab4" >Pregunta 4</label>
            <br>
            <input type="text" id="q4" name="question4" value="<?php echo $p4;?>" placeholder="Pregunta"readonly="readonly"/>
            <br>
            <label for="name" id="lab_4" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a4;?>" name="answer4" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q4" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab5" >Pregunta 5</label>
            <br>
            <input type="text" id="q5" name="question5" value="<?php echo $p5;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_5" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a5;?>" name="answer5" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q5" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab6">Pregunta 6</label>
            <br>
            <input type="text" id="q6" name="question6" value="<?php echo $p6;?>" placeholder="Pregunta" readonly="readonly" />
            <br>
            <label for="name" id="lab_6" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a6;?>" name="answer6" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q6" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab7" >Pregunta 7</label>
            <br>
            <input type="text" id="q7" name="question7" value="<?php echo $p7;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_7">Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a7;?>" name="answer7" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q7" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab8" >Pregunta 8</label>
            <br>
            <input type="text" id="q8" name="question8" value="<?php echo $p8;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_8" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a8;?>" name="answer8" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q8" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab9" >Pregunta 9</label>
            <br>
            <input type="text" id="q9" name="question9" value="<?php echo $p9;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_9" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a9;?>" name="answer9" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q9" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab10" >Pregunta 10</label>
            <br>
            <input type="text" id="q10" name="question10" value="<?php echo $p10;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_10">Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a10;?>" name="answer10" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q10" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab11" >Pregunta 11</label>
            <br>
            <input type="text" id="q11" name="question11" value="<?php echo $p11;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_11">Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a11;?>" name="answer11" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q11" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab12">Pregunta 12</label>
            <br>
            <input type="text" id="q12" name="question12" value="<?php echo $p12;?>" placeholder="Pregunta" readonly="readonly" />
            <br>
            <label for="name" id="lab_12" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a12;?>" name="answer12" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q12" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab13" >Pregunta 13</label>
            <br>
            <input type="text" id="q13" name="question13" value="<?php echo $p13;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_13" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a13;?>" name="answer13" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q13" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab14">Pregunta 14</label>
            <br>
            <input type="text" id="q14" name="question14" value="<?php echo $p14;?>" placeholder="Pregunta" readonly="readonly" />
            <br>
            <label for="name" id="lab_14">Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a14;?>" name="answer14" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q14" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab15" >Pregunta 15</label>
            <br>
            <input type="text" id="q15" name="question15" value="<?php echo $p15;?>" placeholder="Pregunta" readonly="readonly"/>
            <br>
            <label for="name" id="lab_15" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a15;?>" name="answer15" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q15" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab16" >Pregunta 16</label>
            <br>
            <input type="text" id="q16" name="question16" value="<?php echo $p16;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_16" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a16;?>" name="answer16" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q16" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab17" >Pregunta 17</label>
            <br>
            <input type="text" id="q17" name="question17" value="<?php echo $p17;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_17" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a17;?>" name="answer17" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q17" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab18" >Pregunta 18</label>
            <br>
            <input type="text" id="q18" name="question18" value="<?php echo $p18;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_18" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a18;?>" name="answer18" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q18" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab19" >Pregunta 19</label>
            <br>
            <input type="text" id="q19" name="question19" value="<?php echo $p19;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_19" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a19;?>" name="answer19" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q19" value="Borrar Pregunta" />
            <br>
            <br>
            <label for="name" id="lab20" >Pregunta 20</label>
            <br>
            <input type="text" id="q20" name="question20" value="<?php echo $p20;?>" placeholder="Pregunta"  readonly="readonly"/>
            <br>
            <label for="name" id="lab_20" >Respuesta</label>
            <br>
            <input type="text" id="q1" value="<?php echo $a20;?>" name="answer20" placeholder="Respuesta" readonly="readonly"/>
            <br>
            <input type="submit" name="btn_q20" value="Borrar Pregunta" />
            <br>
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
  <?php if(!empty($message)): ?>
      <p class="rally"> <?= $message ?></p>
    <?php endif; ?>
</body>
</html>

