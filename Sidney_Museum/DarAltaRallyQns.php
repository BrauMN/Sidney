<?php

session_start();
if(!isset($_SESSION['user_id']))
{
    header('location: login.php');
}

require 'include/database.php';

$message = '';


$answer_rally=NULL;
$answer_pintura=NULL;

$graba=NULL;
$res=NULL;
$record=NULL;
$result=NULL;
$sql=NULL;
$stmt=NULL;

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

$id=NULL;
$des=NULL;
$time=NULL;
$p1=NULL;
$p2=NULL;
$class2=false;
$query=NULL;
$select=$_POST['modernismo'];
$select=$_POST['incentivo'];
$iddd=$_POST['id'];
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
$created_by=$user['mail'];

require_once("include/RallyDAO.php");



$objetoVO = new RallyVO();
$objetoDAO = new RallyDAO();


if(!empty($_POST['incentivo']) && isset($_POST['insertar'])){
    $graba = $conn->prepare("SELECT ID_rally, descriptionn, maximum_time FROM C_Rally WHERE descriptionn = '".$select."' AND f_deleted = 0");
    $graba->execute();
    $res = $graba->fetch(PDO::FETCH_ASSOC);
    $query = $conexion -> query ("SELECT ID_rally, question, answer FROM T_Rally_painting WHERE ID_rally = '".$iddd."' AND f_deleted=0");
          while ($consulta = mysqli_fetch_array($query)) {
            $id_rally[]=$consulta['ID_rally'];
            $question[]=$consulta['question'];
            $answer[]=$consulta['answer'];
          }
    
    if (count($res) > 1  && isset($_POST['insertar'])  && empty($_POST['des']) && empty($_POST['time'])) {
        $class2=true;
        $id = $res['ID_rally'];
        $des = $res['descriptionn'];
        $time = $res['maximum_time'];

        
        echo'<script type="text/javascript">
        alert("Agregue las preguntas que desee y presione Aceptar");
        </script>';
        
        
}
    else if($res==false){
      echo'<script type="text/javascript">
      alert("El rally solicitado no existe");
      </script>';
}
}


if(isset($_POST['insertar']) && !empty($_POST['question1']) || !empty($_POST['question2']) || !empty($_POST['question3']) || !empty($_POST['question4']) || !empty($_POST['question5']) || !empty($_POST['question6'])
|| !empty($_POST['question7']) || !empty($_POST['question8']) || !empty($_POST['question9']) || !empty($_POST['question10']) || !empty($_POST['question11']) || !empty($_POST['question12']) || !empty($_POST['question13'])
|| !empty($_POST['question14']) || !empty($_POST['question15']) || !empty($_POST['question16']) || !empty($_POST['question17'])|| !empty($_POST['question18']) || !empty($_POST['question19']) || !empty($_POST['question20'])){
  echo'<script type="text/javascript">
            alert("Preguntas guardadas exitosamente");
            </script>';
} else if(isset($_POST['insertar']) && empty($_POST['question1']) && empty($_POST['question2']) && empty($_POST['question3']) && empty($_POST['question4']) && empty($_POST['question5']) && empty($_POST['question6'])
&& empty($_POST['question7']) && empty($_POST['question8']) && empty($_POST['question9']) && empty($_POST['question10']) && empty($_POST['question11']) && empty($_POST['question12']) && empty($_POST['question13'])
&& empty($_POST['question14']) && empty($_POST['question15']) && empty($_POST['question16']) && empty($_POST['question17']) && empty($_POST['question18']) && empty($_POST['question19']) && empty($_POST['question20'])
&& !empty($_POST['des']) && !empty($_POST['time'])){
  $id = $_POST['id'];
    $des = $_POST['des'];
    $time = $_POST['time'];
    $select = $_POST['modernismo'];
  echo'<script type="text/javascript">
            alert("Por favor agregue preguntas");
            </script>';
}


if(!empty($_POST['answer1']) && !empty($_POST['question1'])){
$graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
$graba->bindParam(':ey', $_POST['des']);
$graba->execute();
$res = $graba->fetch(PDO::FETCH_ASSOC);
$record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
$record->bindParam(':respuesta', $_POST['answer1']);
$record->execute();
$result = $record->fetch(PDO::FETCH_ASSOC);

if(count($result) > 0 && count($res) > 0){
    $answer_pintura=$result['ID_painting_sculpture'];
    $answer_rally=$res['ID_rally'];
    $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q1, $r1, $created_by);
    $bandera=$objetoDAO->Insert_questions($objetoVO);
}

}

if(!empty($_POST['answer2']) && !empty($_POST['question2'])){
    $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
    $graba->bindParam(':ey', $_POST['des']);
    $graba->execute();
    $res = $graba->fetch(PDO::FETCH_ASSOC);
    $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
    $record->bindParam(':respuesta', $_POST['answer2']);
    $record->execute();
    $result = $record->fetch(PDO::FETCH_ASSOC);
    
    if(count($result) > 0 && count($res) > 0){
        $answer_pintura=$result['ID_painting_sculpture'];
        $answer_rally=$res['ID_rally'];
        $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q2, $r2, $created_by);
        $bandera=$objetoDAO->Insert_questions($objetoVO);
      }
    
    }

    if(!empty($_POST['answer3']) && !empty($_POST['question3'])){
        $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
        $graba->bindParam(':ey', $_POST['des']);
        $graba->execute();
        $res = $graba->fetch(PDO::FETCH_ASSOC);
        $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
        $record->bindParam(':respuesta', $_POST['answer3']);
        $record->execute();
        $result = $record->fetch(PDO::FETCH_ASSOC);
        
        if(count($result) > 0 && count($res) > 0){
            $answer_pintura=$result['ID_painting_sculpture'];
            $answer_rally=$res['ID_rally'];
            $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q3, $r3, $created_by);
            $bandera=$objetoDAO->Insert_questions($objetoVO);
          }
        
        }

        if(!empty($_POST['answer4']) && !empty($_POST['question4'])){
            $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
            $graba->bindParam(':ey', $_POST['des']);
            $graba->execute();
            $res = $graba->fetch(PDO::FETCH_ASSOC);
            $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
            $record->bindParam(':respuesta', $_POST['answer4']);
            $record->execute();
            $result = $record->fetch(PDO::FETCH_ASSOC);
            
            if(count($result) > 0 && count($res) > 0){
                $answer_pintura=$result['ID_painting_sculpture'];
                $answer_rally=$res['ID_rally'];
                $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q4, $r4, $created_by);
                $bandera=$objetoDAO->Insert_questions($objetoVO);

              }
            
            }

            if(!empty($_POST['answer5']) && !empty($_POST['question5'])){
                $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                $graba->bindParam(':ey', $_POST['des']);
                $graba->execute();
                $res = $graba->fetch(PDO::FETCH_ASSOC);
                $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                $record->bindParam(':respuesta', $_POST['answer5']);
                $record->execute();
                $result = $record->fetch(PDO::FETCH_ASSOC);
                
                if(count($result) > 0 && count($res) > 0){
                    $answer_pintura=$result['ID_painting_sculpture'];
                    $answer_rally=$res['ID_rally'];
                    $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q5, $r5, $created_by);
                    $bandera=$objetoDAO->Insert_questions($objetoVO);

                  }
                
                }

                if(!empty($_POST['answer6']) && !empty($_POST['question6'])){
                    $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                    $graba->bindParam(':ey', $_POST['des']);
                    $graba->execute();
                    $res = $graba->fetch(PDO::FETCH_ASSOC);
                    $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                    $record->bindParam(':respuesta', $_POST['answer6']);
                    $record->execute();
                    $result = $record->fetch(PDO::FETCH_ASSOC);
                    
                    if(count($result) > 0 && count($res) > 0){
                        $answer_pintura=$result['ID_painting_sculpture'];
                        $answer_rally=$res['ID_rally'];
                        $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q6, $r6, $created_by);
                        $bandera=$objetoDAO->Insert_questions($objetoVO);
 
                      }
                    
                    }

                    if(!empty($_POST['answer7']) && !empty($_POST['question7'])){
                        $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                        $graba->bindParam(':ey', $_POST['des']);
                        $graba->execute();
                        $res = $graba->fetch(PDO::FETCH_ASSOC);
                        $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                        $record->bindParam(':respuesta', $_POST['answer7']);
                        $record->execute();
                        $result = $record->fetch(PDO::FETCH_ASSOC);
                        
                        if(count($result) > 0 && count($res) > 0){
                            $answer_pintura=$result['ID_painting_sculpture'];
                            $answer_rally=$res['ID_rally'];
                            $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q7, $r7, $created_by);
                            $bandera=$objetoDAO->Insert_questions($objetoVO);
   
                          }
                        
                        }

                        if(!empty($_POST['answer8']) && !empty($_POST['question8'])){
                            $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                            $graba->bindParam(':ey', $_POST['des']);
                            $graba->execute();
                            $res = $graba->fetch(PDO::FETCH_ASSOC);
                            $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                            $record->bindParam(':respuesta', $_POST['answer8']);
                            $record->execute();
                            $result = $record->fetch(PDO::FETCH_ASSOC);
                            
                            if(count($result) > 0 && count($res) > 0){
                                $answer_pintura=$result['ID_painting_sculpture'];
                                $answer_rally=$res['ID_rally'];
                                $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q8, $r8, $created_by);
                                $bandera=$objetoDAO->Insert_questions($objetoVO);

                              }
                            
                            }

                            if(!empty($_POST['answer9']) && !empty($_POST['question9'])){
                                $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                $graba->bindParam(':ey', $_POST['des']);
                                $graba->execute();
                                $res = $graba->fetch(PDO::FETCH_ASSOC);
                                $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                $record->bindParam(':respuesta', $_POST['answer9']);
                                $record->execute();
                                $result = $record->fetch(PDO::FETCH_ASSOC);
                                
                                if(count($result) > 0 && count($res) > 0){
                                    $answer_pintura=$result['ID_painting_sculpture'];
                                    $answer_rally=$res['ID_rally'];
                                    $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q9, $r9, $created_by);
                                    $bandera=$objetoDAO->Insert_questions($objetoVO);

                                  }
                                
                                }

                                if(!empty($_POST['answer10']) && !empty($_POST['question10'])){
                                    $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                    $graba->bindParam(':ey', $_POST['des']);
                                    $graba->execute();
                                    $res = $graba->fetch(PDO::FETCH_ASSOC);
                                    $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                    $record->bindParam(':respuesta', $_POST['answer10']);
                                    $record->execute();
                                    $result = $record->fetch(PDO::FETCH_ASSOC);
                                    
                                    if(count($result) > 0 && count($res) > 0){
                                        $answer_pintura=$result['ID_painting_sculpture'];
                                        $answer_rally=$res['ID_rally'];
                                        $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q10, $r10, $created_by);
                                        $bandera=$objetoDAO->Insert_questions($objetoVO);
   
                                      }
                                    
                                    }

                                    if(!empty($_POST['answer11']) && !empty($_POST['question11'])){
                                        $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                        $graba->bindParam(':ey', $_POST['des']);
                                        $graba->execute();
                                        $res = $graba->fetch(PDO::FETCH_ASSOC);
                                        $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                        $record->bindParam(':respuesta', $_POST['answer11']);
                                        $record->execute();
                                        $result = $record->fetch(PDO::FETCH_ASSOC);
                                        
                                        if(count($result) > 0 && count($res) > 0){
                                            $answer_pintura=$result['ID_painting_sculpture'];
                                            $answer_rally=$res['ID_rally'];
                                            $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q11, $r11, $created_by);
                                            $bandera=$objetoDAO->Insert_questions($objetoVO);

                                          }
                                        
                                        }

                                        if(!empty($_POST['answer12']) && !empty($_POST['question12'])){
                                            $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                            $graba->bindParam(':ey', $_POST['des']);
                                            $graba->execute();
                                            $res = $graba->fetch(PDO::FETCH_ASSOC);
                                            $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                            $record->bindParam(':respuesta', $_POST['answer12']);
                                            $record->execute();
                                            $result = $record->fetch(PDO::FETCH_ASSOC);
                                            
                                            if(count($result) > 0 && count($res) > 0){
                                                $answer_pintura=$result['ID_painting_sculpture'];
                                                $answer_rally=$res['ID_rally'];
                                                $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q12, $r12, $created_by);
                                                $bandera=$objetoDAO->Insert_questions($objetoVO);
         
                                              }
                                            
                                            }

                                            if(!empty($_POST['answer13']) && !empty($_POST['question13'])){
                                                $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                $graba->bindParam(':ey', $_POST['des']);
                                                $graba->execute();
                                                $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                $record->bindParam(':respuesta', $_POST['answer13']);
                                                $record->execute();
                                                $result = $record->fetch(PDO::FETCH_ASSOC);
                                                
                                                if(count($result) > 0 && count($res) > 0){
                                                    $answer_pintura=$result['ID_painting_sculpture'];
                                                    $answer_rally=$res['ID_rally'];
                                                    $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q13, $r13, $created_by);
                                                    $bandera=$objetoDAO->Insert_questions($objetoVO);

                                                  }
                                                
                                                }

                                                if(!empty($_POST['answer14']) && !empty($_POST['question14'])){
                                                    $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                    $graba->bindParam(':ey', $_POST['des']);
                                                    $graba->execute();
                                                    $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                    $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                    $record->bindParam(':respuesta', $_POST['answer14']);
                                                    $record->execute();
                                                    $result = $record->fetch(PDO::FETCH_ASSOC);
                                                    
                                                    if(count($result) > 0 && count($res) > 0){
                                                        $answer_pintura=$result['ID_painting_sculpture'];
                                                        $answer_rally=$res['ID_rally'];
                                                        $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q14, $r14, $created_by);
                                                        $bandera=$objetoDAO->Insert_questions($objetoVO);

                                                      }
                                                    
                                                    }

                                                    if(!empty($_POST['answer15']) && !empty($_POST['question15'])){
                                                        $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                        $graba->bindParam(':ey', $_POST['des']);
                                                        $graba->execute();
                                                        $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                        $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                        $record->bindParam(':respuesta', $_POST['answer15']);
                                                        $record->execute();
                                                        $result = $record->fetch(PDO::FETCH_ASSOC);
                                                        
                                                        if(count($result) > 0 && count($res) > 0){
                                                            $answer_pintura=$result['ID_painting_sculpture'];
                                                            $answer_rally=$res['ID_rally'];
                                                            $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q15, $r15, $created_by);
                                                            $bandera=$objetoDAO->Insert_questions($objetoVO);

                                                          }
                                                        
                                                        }

                                                        if(!empty($_POST['answer16']) && !empty($_POST['question16'])){
                                                            $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                            $graba->bindParam(':ey', $_POST['des']);
                                                            $graba->execute();
                                                            $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                            $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                            $record->bindParam(':respuesta', $_POST['answer16']);
                                                            $record->execute();
                                                            $result = $record->fetch(PDO::FETCH_ASSOC);
                                                            
                                                            if(count($result) > 0 && count($res) > 0){
                                                                $answer_pintura=$result['ID_painting_sculpture'];
                                                                $answer_rally=$res['ID_rally'];
                                                                $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q16, $r16, $created_by);
                                                                $bandera=$objetoDAO->Insert_questions($objetoVO);
        
                                                              }
                                                            
                                                            }

                                                            if(!empty($_POST['answer17']) && !empty($_POST['question17'])){
                                                                $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                                $graba->bindParam(':ey', $_POST['des']);
                                                                $graba->execute();
                                                                $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                                $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                                $record->bindParam(':respuesta', $_POST['answer17']);
                                                                $record->execute();
                                                                $result = $record->fetch(PDO::FETCH_ASSOC);
                                                                
                                                                if(count($result) > 0 && count($res) > 0){
                                                                    $answer_pintura=$result['ID_painting_sculpture'];
                                                                    $answer_rally=$res['ID_rally'];
                                                                    $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q17, $r17, $created_by);
                                                                    $bandera=$objetoDAO->Insert_questions($objetoVO);
          
                                                                  }
                                                                
                                                                }

                                                                if(!empty($_POST['answer18']) && !empty($_POST['question18'])){
                                                                    $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                                    $graba->bindParam(':ey', $_POST['des']);
                                                                    $graba->execute();
                                                                    $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                                    $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                                    $record->bindParam(':respuesta', $_POST['answer18']);
                                                                    $record->execute();
                                                                    $result = $record->fetch(PDO::FETCH_ASSOC);
                                                                    
                                                                    if(count($result) > 0 && count($res) > 0){
                                                                        $answer_pintura=$result['ID_painting_sculpture'];
                                                                        $answer_rally=$res['ID_rally'];
                                                                        $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q18, $r18, $created_by);
                                                                        $bandera=$objetoDAO->Insert_questions($objetoVO);

                                                                      }
                                                                    
                                                                    }

                                                                    if(!empty($_POST['answer19']) && !empty($_POST['question19'])){
                                                                        $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                                        $graba->bindParam(':ey', $_POST['des']);
                                                                        $graba->execute();
                                                                        $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                                        $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                                        $record->bindParam(':respuesta', $_POST['answer19']);
                                                                        $record->execute();
                                                                        $result = $record->fetch(PDO::FETCH_ASSOC);
                                                                        
                                                                        if(count($result) > 0 && count($res) > 0){
                                                                            $answer_pintura=$result['ID_painting_sculpture'];
                                                                            $answer_rally=$res['ID_rally'];
                                                                            $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q19, $r19, $created_by);
                                                                            $bandera=$objetoDAO->Insert_questions($objetoVO);

                                                                          }
                                                                        
                                                                        }

                                                                        if(!empty($_POST['answer20']) && !empty($_POST['question20'])){
                                                                            $graba = $conn->prepare('SELECT ID_rally FROM C_Rally WHERE descriptionn = :ey AND f_deleted=0');
                                                                            $graba->bindParam(':ey', $_POST['des']);
                                                                            $graba->execute();
                                                                            $res = $graba->fetch(PDO::FETCH_ASSOC);
                                                                            $record = $conn->prepare('SELECT ID_painting_sculpture FROM C_Painting_Sculpture WHERE name = :respuesta AND f_deleted=0');
                                                                            $record->bindParam(':respuesta', $_POST['answer20']);
                                                                            $record->execute();
                                                                            $result = $record->fetch(PDO::FETCH_ASSOC);
                                                                            
                                                                            if(count($result) > 0 && count($res) > 0){
                                                                                $answer_pintura=$result['ID_painting_sculpture'];
                                                                                $answer_rally=$res['ID_rally'];
                                                                                $objetoVO->setAll_questions($answer_rally, $answer_pintura, $q20, $r20, $created_by);
                                                                                $bandera=$objetoDAO->Insert_questions($objetoVO);

                                                                              }
                                                                            
                                                                            }



?>




<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/DarAltaQns.css">
<title>Agregar Preguntas</title>
<script src="JS/UpObras.js"></script>
</head>
<body>
  <div class="preguntas">
  <form class="osi" name="form0" action="DarAltaRallyQns.php" method="POST">
  <?php if(!empty($user)): ?>
    <input type="text" name="modernismo" value="<?php echo $select;?>" style="display:none">
      <br><strong>Bienvenido <?= $user['firstname']; ?></strong>
      <br><strong>Agrega preguntas al rally.</strong>
    <?php endif; ?>
          <br>
          <br>
          <label for="id">Escoja el rally para agregar las preguntas</label>
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
            <label for="name">Descripción del Rally</label>
            <br>
            <input type="text" name="des" value="<?php echo $des;?>" readonly="readonly" placeholder="Descripción" required="required" />
            <br>
            <label for="año">Tiempo máximo a completar el Rally</label>
            <br>
            <input type="time" name="time" value="<?php echo $time;?>" readonly="readonly" class="without_ampm" min="00:00:00" max="03:00:00" step="1" placeholder="ej.- hh:mm:ss" />
            <br>
            <button name="insertar" id="int" type="submit">Aceptar</button>
            <br>
            <br>
            <label for="ag">Agregar preguntas</label>
            <br>
            <br>
            <label for="name">Pregunta 1</label>
            <br>
            <input type="text" id="q1" name="question1" placeholder="Pregunta"/>
            <br>
            <label for="name">Respuesta</label>
            <br>
            <select id="a1" name="answer1">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer1" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar" onclick="hideshow()" value="+"/>
            <br>
            <label for="name" id="lab2" style="display: none">Pregunta 2</label>
            <br>
            <input type="text" id="q2" name="question2" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_2" style="display: none">Respuesta Correcta</label>
            <br>
            <select id="a2" name="answer2" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer2" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar2" onclick="hideshow2()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab3" style="display: none">Pregunta 3</label>
            <br>
            <input type="text" id="q3" name="question3" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_3" style="display: none">Respuesta</label>
            <br>
            <select id="a3" name="answer3" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer3" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar3" onclick="hideshow3()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab4" style="display: none">Pregunta 4</label>
            <br>
            <input type="text" id="q4" name="question4" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_4" style="display: none">Respuesta</label>
            <br>
            <select id="a4" name="answer4" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer4" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar4" onclick="hideshow4()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab5" style="display: none">Pregunta 5</label>
            <br>
            <input type="text" id="q5" name="question5" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_5" style="display: none">Respuesta</label>
            <br>
            <select id="a5" name="answer5" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer5" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar5" onclick="hideshow5()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab6" style="display: none">Pregunta 6</label>
            <br>
            <input type="text" id="q6" name="question6" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_6" style="display: none">Respuesta</label>
            <br>
            <select id="a6" name="answer6" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer6" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar6" onclick="hideshow6()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab7" style="display: none">Pregunta 7</label>
            <br>
            <input type="text" id="q7" name="question7" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_7" style="display: none">Respuesta</label>
            <br>
            <select id="a7" name="answer7" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer7" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar7" onclick="hideshow7()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab8" style="display: none">Pregunta 8</label>
            <br>
            <input type="text" id="q8" name="question8" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_8" style="display: none">Respuesta</label>
            <br>
            <select id="a8" name="answer8" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer8" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar8" onclick="hideshow8()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab9" style="display: none">Pregunta 9</label>
            <br>
            <input type="text" id="q9" name="question9" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_9" style="display: none">Respuesta</label>
            <br>
            <select id="a9" name="answer9" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer9" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar9" onclick="hideshow9()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab10" style="display: none">Pregunta 10</label>
            <br>
            <input type="text" id="q10" name="question10" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_10" style="display: none">Respuesta</label>
            <br>
            <select id="a10" name="answer10" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer10" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar10" onclick="hideshow10()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab11" style="display: none">Pregunta 11</label>
            <br>
            <input type="text" id="q11" name="question11" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_11" style="display: none">Respuesta</label>
            <br>
            <select id="a11" name="answer11" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer11" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar11" onclick="hideshow11()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab12" style="display: none">Pregunta 12</label>
            <br>
            <input type="text" id="q12" name="question12" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_12" style="display: none">Respuesta</label>
            <br>
            <select id="a12" name="answer12" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer12" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar12" onclick="hideshow12()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab13" style="display: none">Pregunta 13</label>
            <br>
            <input type="text" id="q13" name="question13" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_13" style="display: none">Respuesta</label>
            <br>
            <select id="a13" name="answer13" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer13" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar13" onclick="hideshow13()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab14" style="display: none">Pregunta 14</label>
            <br>
            <input type="text" id="q14" name="question14" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_14" style="display: none">Respuesta</label>
            <br>
            <select id="a14" name="answer14" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer14" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar14" onclick="hideshow14()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab15" style="display: none">Pregunta 15</label>
            <br>
            <input type="text" id="q15" name="question15" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_15" style="display: none">Respuesta</label>
            <br>
            <select id="a15" name="answer15" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer15" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar15" onclick="hideshow15()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab16" style="display: none">Pregunta 16</label>
            <br>
            <input type="text" id="q16" name="question16" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_16" style="display: none">Respuesta</label>
            <br>
            <select id="a16" name="answer16" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer16" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar16" onclick="hideshow16()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab17" style="display: none">Pregunta 17</label>
            <br>
            <input type="text" id="q17" name="question17" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_17" style="display: none">Respuesta</label>
            <br>
            <select id="a17" name="answer17" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer17" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar17" onclick="hideshow17()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab18" style="display: none">Pregunta 18</label>
            <br>
            <input type="text" id="q18" name="question18" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_18" style="display: none">Respuesta</label>
            <br>
            <select id="a18" name="answer18" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer18" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar18" onclick="hideshow18()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab19" style="display: none">Pregunta 19</label>
            <br>
            <input type="text" id="q19" name="question19" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_19" style="display: none">Respuesta</label>
            <br>
            <select id="a19" name="answer19" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer19" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
            <br>
            <input type="button" id="ocultar19" onclick="hideshow19()" value="+" style="display: none"/>
            <br>
            <label for="name" id="lab20" style="display: none">Pregunta 20</label>
            <br>
            <input type="text" id="q20" name="question20" placeholder="Pregunta" style="display: none" />
            <br>
            <label for="name" id="lab_20" style="display: none">Respuesta</label>
            <br>
            <select id="a20" name="answer20" style="display: none">
            <option value="0">Seleccione:</option>
            <?php
          $query = $conexion -> query ("SELECT * FROM C_Painting_Sculpture WHERE f_deleted = 0 AND theme = '".$select."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="answer20" value="'.$valores['name'].'">'.$valores['name'].'</option>';
          }
        ?>
            </select>
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

