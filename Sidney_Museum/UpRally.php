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
$select=$_POST['modernismo'];
$iddd=$_POST['id'];
$des=$_POST['des'];
$time=$_POST['time'];
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

$graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey');
    $graba->bindParam(':ey', $_POST['des']);
    $graba->execute();
    $res = $graba->fetch(PDO::FETCH_ASSOC);
    $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta');
    $record->bindParam(':respuesta', $_POST['answer1']);
    $record->execute();
    $result = $record->fetch(PDO::FETCH_ASSOC);
    $record1 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta1');
    $record1->bindParam(':respuesta1', $_POST['answer2']);
    $record1->execute();
    $result1 = $record1->fetch(PDO::FETCH_ASSOC);
    $record2 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta2');
    $record2->bindParam(':respuesta2', $_POST['answer3']);
    $record2->execute();
    $result2 = $record2->fetch(PDO::FETCH_ASSOC);
    $record3 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta3');
    $record3->bindParam(':respuesta3', $_POST['answer4']);
    $record3->execute();
    $result3 = $record3->fetch(PDO::FETCH_ASSOC);
    $record4 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta4');
    $record4->bindParam(':respuesta4', $_POST['answer5']);
    $record4->execute();
    $result4 = $record4->fetch(PDO::FETCH_ASSOC);
    $record5 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta5');
    $record5->bindParam(':respuesta5', $_POST['answer6']);
    $record5->execute();
    $result5 = $record5->fetch(PDO::FETCH_ASSOC);
    $record6 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta6');
    $record6->bindParam(':respuesta6', $_POST['answer7']);
    $record6->execute();
    $result6 = $record6->fetch(PDO::FETCH_ASSOC);
    $record7 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta7');
    $record7->bindParam(':respuesta7', $_POST['answer8']);
    $record7->execute();
    $result7 = $record7->fetch(PDO::FETCH_ASSOC);
    $record8 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta8');
    $record8->bindParam(':respuesta8', $_POST['answer9']);
    $record8->execute();
    $result8 = $record8->fetch(PDO::FETCH_ASSOC);
    $record9 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta9');
    $record9->bindParam(':respuesta9', $_POST['answer10']);
    $record9->execute();
    $result9 = $record9->fetch(PDO::FETCH_ASSOC);
    $record10 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta10');
    $record10->bindParam(':respuesta10', $_POST['answer11']);
    $record10->execute();
    $result10 = $record10->fetch(PDO::FETCH_ASSOC);
    $record11 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta11');
    $record11->bindParam(':respuesta11', $_POST['answer12']);
    $record11->execute();
    $result11 = $record11->fetch(PDO::FETCH_ASSOC);
    $record12 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta12');
    $record12->bindParam(':respuesta12', $_POST['answer13']);
    $record12->execute();
    $result12 = $record12->fetch(PDO::FETCH_ASSOC);
    $record13 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta13');
    $record13->bindParam(':respuesta13', $_POST['answer14']);
    $record13->execute();
    $result13 = $record13->fetch(PDO::FETCH_ASSOC);
    $record14 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta14');
    $record14->bindParam(':respuesta14', $_POST['answer15']);
    $record14->execute();
    $result14 = $record14->fetch(PDO::FETCH_ASSOC);
    $record15 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta15');
    $record15->bindParam(':respuesta15', $_POST['answer16']);
    $record15->execute();
    $result15 = $record15->fetch(PDO::FETCH_ASSOC);
    $record16 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta16');
    $record16->bindParam(':respuesta16', $_POST['answer17']);
    $record16->execute();
    $result16 = $record16->fetch(PDO::FETCH_ASSOC);
    $record17 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta17');
    $record17->bindParam(':respuesta17', $_POST['answer18']);
    $record17->execute();
    $result17 = $record17->fetch(PDO::FETCH_ASSOC);
    $record18 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta18');
    $record18->bindParam(':respuesta18', $_POST['answer19']);
    $record18->execute();
    $result18 = $record18->fetch(PDO::FETCH_ASSOC);
    $record19 = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta19');
    $record19->bindParam(':respuesta19', $_POST['answer20']);
    $record19->execute();
    $result19 = $record19->fetch(PDO::FETCH_ASSOC);

        $answer_pintura=$result['ID_painting_sculpture'];
        $answer_pintura2=$result1['ID_painting_sculpture'];
        $answer_pintura3=$result2['ID_painting_sculpture'];
        $answer_pintura4=$result3['ID_painting_sculpture'];
        $answer_pintura5=$result4['ID_painting_sculpture'];
        $answer_pintura6=$result5['ID_painting_sculpture'];
        $answer_pintura7=$result6['ID_painting_sculpture'];
        $answer_pintura8=$result7['ID_painting_sculpture'];
        $answer_pintura9=$result8['ID_painting_sculpture'];
        $answer_pintura10=$result9['ID_painting_sculpture'];
        $answer_pintura11=$result10['ID_painting_sculpture'];
        $answer_pintura12=$result11['ID_painting_sculpture'];
        $answer_pintura13=$result12['ID_painting_sculpture'];
        $answer_pintura14=$result13['ID_painting_sculpture'];
        $answer_pintura15=$result14['ID_painting_sculpture'];
        $answer_pintura16=$result15['ID_painting_sculpture'];
        $answer_pintura17=$result16['ID_painting_sculpture'];
        $answer_pintura18=$result17['ID_painting_sculpture'];
        $answer_pintura19=$result18['ID_painting_sculpture'];
        $answer_pintura20=$result19['ID_painting_sculpture'];
        $answer_rally=$res['ID_rally'];

        




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

if(isset($_POST['mostrar_preguntas']) && !empty($_POST['id'])){
  $query = $conexion -> query ("SELECT * FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0 ORDER BY 1");
  while ($consulta = mysqli_fetch_array($query)) {
    $id_rally[]=$consulta['ID_rally'];
    $question[]=$consulta['question'];
    $answer[]=$consulta['answer'];
  }
    if(!empty($_POST['id'])){
      $select=$_POST['modernismo'];
    $id = $_POST['id'];
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
    }
}


if(isset($_POST['abajo'])){
        
          
  $sql = "UPDATE C_Rally SET descriptionn = '".$des."', maximum_time = '".$time."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally = '".$iddd."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
            alert("Rally actualizado exitosamente");
            </script>';
            $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];

  }
  else{
    echo'<script type="text/javascript">
            alert("Hubo un problema actualizando el rally");
            </script>';
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
  
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura."', question = '".$q1."', answer = '".$r1."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[0]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura2."', question = '".$q2."', answer = '".$r2."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[1]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura3."', question = '".$q3."', answer = '".$r3."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[2]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura4."', question = '".$q4."', answer = '".$r4."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[3]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura5."', question = '".$q5."', answer = '".$r5."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[4]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura6."', question = '".$q6."', answer = '".$r6."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[5]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura7."', question = '".$q7."', answer = '".$r7."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[6]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura8."', question = '".$q8."', answer = '".$r8."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[7]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura9."', question = '".$q9."', answer = '".$r9."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[8]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura10."', question = '".$q10."', answer = '".$r10."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[9]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura11."', question = '".$q11."', answer = '".$r11."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[10]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura12."', question = '".$q12."', answer = '".$r12."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[11]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura13."', question = '".$q13."', answer = '".$r13."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[12]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura14."', question = '".$q14."', answer = '".$r14."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[13]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura15."', question = '".$q15."', answer = '".$r15."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[14]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura16."', question = '".$q16."', answer = '".$r16."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[15]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura17."', question = '".$q17."', answer = '".$r17."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[16]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura18."', question = '".$q18."', answer = '".$r18."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[17]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura19."', question = '".$q19."', answer = '".$r19."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[18]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
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
  $sql = "UPDATE T_Rally_painting SET ID_painting_sculpture = '".$answer_pintura20."', question = '".$q20."', answer = '".$r20."', updated = CURRENT_TIMESTAMP, updated_by = '".$user['mail']."' WHERE ID_rally_painting = '".$id_rally_paint[19]."'";
  
  if(mysqli_multi_query($conexion, $sql))
  {
    echo'<script type="text/javascript">
    alert("Pregunta actualizada exitosamente");
    </script>';
    $select=$_POST['modernismo'];
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
    $a19 = $_POST['answer19'];
    $a20 = $_POST['answer20'];
  }
  else{
    echo'<script type="text/javascript">
    alert("Hubo un problema actualizando la pregunta");
    </script>';
  }
}



    

        

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/DarAltaQns.css">
<title>Actualizar Rally</title>
<script src="JS/UpObras.js"></script>
</head>
<body>
  <div class="preguntas">
  <form class="osi" name="form0" action="UpRally.php" method="POST">
  <?php if(!empty($user)): ?>
    <input type="text" name="modernismo" value="<?php echo $select;?>" style="display:none">
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Actualiza un rally.</strong>
      <br>
      <br>
      <label for="id">Escoja el rally que quiere actualizar y presione aceptar</label>
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
            <input type="text" name="des" value="<?php echo $des;?>"  placeholder="Descripción" readonly="readonly" />
            <br>
            <label for="año">Tiempo máximo a completar el Rally</label>
            <br>
            <input type="time" name="time" value="<?php echo $time;?>" class="without_ampm" min="00:00:00" max="03:00:00" step="1" placeholder="ej.- hh:mm:ss" />
            <br>
            <input type="submit" id="mas_m" name="aceptar" value="Aceptar" >
            <br>
            <br>
            <input type="submit" id="mas_m" name="abajo" value="Actualizar Rally" />
            <br>
            <br>
            <input type="submit" id="mostrar_p" name="mostrar_preguntas" value="Mostrar Preguntas" />
            <br>
            <label for="name">Pregunta 1</label>
            <br>
            <input type="text" id="q1" value="<?php echo $p1;?>" name="question1" placeholder="Pregunta" />
            <br>
            <label for="name">Respuesta</label>
            <br>
            <select id="a1" name="answer1">
            <option value="<?php echo $a1;?>"><?php echo $a1;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer1" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q1" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab2" >Pregunta 2</label>
            <br>
            <input type="text" id="q2" name="question2" value="<?php echo $p2;?>" placeholder="Pregunta"  />
            <br>
            <label for="name" id="lab_2" >Respuesta</label>
            <br>
            <select id="a2" name="answer2" >
            <option value="<?php echo $a2;?>"><?php echo $a2;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer2" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q2" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab3" >Pregunta 3</label>
            <br>
            <input type="text" id="q3" name="question3" value="<?php echo $p3;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_3" >Respuesta</label>
            <br>
            <select id="a3" name="answer3" >
            <option value="<?php echo $a3;?>"><?php echo $a3;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer3" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
        <option value=""></option>
            </select>
            <br>
            <input type="submit" name="btn_q3" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab4" >Pregunta 4</label>
            <br>
            <input type="text" id="q4" name="question4" value="<?php echo $p4;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_4">Respuesta</label>
            <br>
            <select id="a4" name="answer4" >
            <option value="<?php echo $a4;?>"><?php echo $a4;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer4" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q4" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab5" >Pregunta 5</label>
            <br>
            <input type="text" id="q5" name="question5" value="<?php echo $p5;?>" placeholder="Pregunta"  />
            <br>
            <label for="name" id="lab_5">Respuesta</label>
            <br>
            <select id="a5" name="answer5" >
            <option value="<?php echo $a5;?>"><?php echo $a5;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer5" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q5" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab6" >Pregunta 6</label>
            <br>
            <input type="text" id="q6" name="question6" value="<?php echo $p6;?>" placeholder="Pregunta"  />
            <br>
            <label for="name" id="lab_6" >Respuesta</label>
            <br>
            <select id="a6" name="answer6" >
            <option value="<?php echo $a6;?>"><?php echo $a6;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer6" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q6" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab7" >Pregunta 7</label>
            <br>
            <input type="text" id="q7" name="question7" value="<?php echo $p7;?>" placeholder="Pregunta"/>
            <br>
            <label for="name" id="lab_7" >Respuesta</label>
            <br>
            <select id="a7" name="answer7" >
            <option value="<?php echo $a7;?>"><?php echo $a7;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer7" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q7" value="Actualizar pregunta"/>
            <br>
            <label for="name" id="lab8" >Pregunta 8</label>
            <br>
            <input type="text" id="q8" name="question8" value="<?php echo $p8;?>" placeholder="Pregunta"  />
            <br>
            <label for="name" id="lab_8" >Respuesta</label>
            <br>
            <select id="a8" name="answer8" >
            <option value="<?php echo $a8;?>"><?php echo $a8;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer8" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q8" value="Actualizar pregunta"/>
            <br>
            <label for="name" id="lab9" >Pregunta 9</label>
            <br>
            <input type="text" id="q9" name="question9" value="<?php echo $p9;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_9" >Respuesta</label>
            <br>
            <select id="a9" name="answer9">
            <option value="<?php echo $a9;?>"><?php echo $a9;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer9" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q9" value="Actualizar pregunta"/>
            <br>
            <label for="name" id="lab10">Pregunta 10</label>
            <br>
            <input type="text" id="q10" name="question10" value="<?php echo $p10;?>" placeholder="Pregunta"/>
            <br>
            <label for="name" id="lab_10">Respuesta</label>
            <br>
            <select id="a10" name="answer10">
            <option value="<?php echo $a10;?>"><?php echo $a10;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer10" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q10" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab11" >Pregunta 11</label>
            <br>
            <input type="text" id="q11" name="question11" value="<?php echo $p11;?>" placeholder="Pregunta"/>
            <br>
            <label for="name" id="lab_11">Respuesta</label>
            <br>
            <select id="a11" name="answer11" >
            <option value="<?php echo $a11;?>"><?php echo $a11;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer11" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q11" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab12" >Pregunta 12</label>
            <br>
            <input type="text" id="q12" name="question12" value="<?php echo $p12;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_12" >Respuesta</label>
            <br>
            <select id="a12" name="answer12" >
            <option value="<?php echo $a12;?>"><?php echo $a12;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer12" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q12" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab13">Pregunta 13</label>
            <br>
            <input type="text" id="q13" name="question13" value="<?php echo $p13;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_13">Respuesta</label>
            <br>
            <select id="a13" name="answer13" >
            <option value="<?php echo $a13;?>"><?php echo $a13;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer13" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q13" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab14">Pregunta 14</label>
            <br>
            <input type="text" id="q14" name="question14" value="<?php echo $p14;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_14" >Respuesta</label>
            <br>
            <select id="a14" name="answer14" >
            <option value="<?php echo $a14;?>"><?php echo $a14;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer14" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q14" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab15" >Pregunta 15</label>
            <br>
            <input type="text" id="q15" name="question15" value="<?php echo $p15;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_15" >Respuesta</label>
            <br>
            <select id="a15" name="answer15" >
            <option value="<?php echo $a15;?>"><?php echo $a15;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer15" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q15" value="Actualizar pregunta"/>
            <br>
            <label for="name" id="lab16" >Pregunta 16</label>
            <br>
            <input type="text" id="q16" name="question16" value="<?php echo $p16;?>" placeholder="Pregunta"  />
            <br>
            <label for="name" id="lab_16">Respuesta</label>
            <br>
            <select id="a16" name="answer16">
            <option value="<?php echo $a16;?>"><?php echo $a16;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer16" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q16" value="Actualizar pregunta"/>
            <br>
            <label for="name" id="lab17" >Pregunta 17</label>
            <br>
            <input type="text" id="q17" name="question17" value="<?php echo $p17;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_17">Respuesta</label>
            <br>
            <select id="a17" name="answer17">
            <option value="<?php echo $a17;?>"><?php echo $a17;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer17" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q17" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab18" >Pregunta 18</label>
            <br>
            <input type="text" id="q18" name="question18" value="<?php echo $p18;?>" placeholder="Pregunta"/>
            <br>
            <label for="name" id="lab_18" >Respuesta</label>
            <br>
            <select id="a18" name="answer18" >
            <option value="<?php echo $a18;?>"><?php echo $a18;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer18" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q18" value="Actualizar pregunta" />
            <br>
            <label for="name" id="lab19">Pregunta 19</label>
            <br>
            <input type="text" id="q19" name="question19" value="<?php echo $p19;?>" placeholder="Pregunta"/>
            <br>
            <label for="name" id="lab_19" >Respuesta</label>
            <br>
            <select id="a19" name="answer19" >
            <option value="<?php echo $a19;?>"><?php echo $a19;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer19" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q19" value="Actualizar pregunta"/>
            <br>
            <label for="name" id="lab20" >Pregunta 20</label>
            <br>
            <input type="text" id="q20" name="question20" value="<?php echo $p20;?>" placeholder="Pregunta" />
            <br>
            <label for="name" id="lab_20" >Respuesta</label>
            <br>
            <select id="a20" name="answer20" >
            <option value="<?php echo $a20;?>"><?php echo $a20;?></option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer20" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="submit" name="btn_q20" value="Actualizar pregunta"/>
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

