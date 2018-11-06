<?php
session_start();
//conect to DB
require('dbConnect.php');
$db = get_db();
//query for all movies




$QueueInfo = $db->prepare('SELECT id, student_name, course_code, ast_name, enter_time, start_time, end_time, comments FROM queue');


$StudentByID = $db->prepare('SELECT
students.student_first_name,
queue.id, student_name, queue.course_code as queue_course_code, ast_name, enter_time, start_time, end_time, comments, classes.course_code as classes_course_code
FROM students
JOIN queue ON queue.student_name = students.id
JOIN classes ON queue.course_code = classes.id
WHERE queue.student_name = students.id
ORDER BY queue.id;');
$StudentByID-> execute();
$StuID = $StudentByID->fetchAll(PDO::FETCH_ASSOC);

          $assistantList = $db->prepare('SELECT * FROM assistant_classes');
          
          $assistantList->execute();
        //, assistants.ast_name as asst_ast_name,    as queue_ast_name JOIN assistants ON queue.ast_name = assistants.id
          
$AstLst = $assistantList->fetchAll(PDO::FETCH_ASSOC);
          
          //var_dump($AstLst);
var_dump($_SESSION);
foreach ($AstLst as $asls){
    $astlstID = $asls['id'];
    $astlstName = $asls['ast_name'];
    $astlstCode = $asls['course_code'];
    
    if($_SESSION[$astlstName][$astlstCode] === true || $_SESSION[$astlstName][$astlstCode] === false){
    $_SESSION[$astlstName][$astlstCode] = $_SESSION[$astlstName][$astlstCode];
       
}
    else{
         $_SESSION[$astlstName][$astlstCode] = true;
    }
    
}

var_dump($_SESSION);

$_SESSION[1][3] = false;

$QueueInfo-> execute();



$Queue = $QueueInfo->fetchAll(PDO::FETCH_ASSOC);


?>
    <!DOCTYPE html>
    <html>
    <head>
         <meta http-equiv="refresh" content="5; URL=https://radiant-gorge-54637.herokuapp.com/cit_lab/displayMain2.php">
    </head>
    <body>
        <header>
            <h2>Assistants and Classes</h2>
        </header>



        <!--        <ul>-->

        <table name="StudentQueue" style="width:100%">
            <tr style="color: white; background-color: orange;">
                <th>Student Name</th>
                <th>Course</th>
                <th>Comments</th>
                <th>Lab Assistant</th>
                <th>Minutes in Queue</th>
            </tr>
            <?php 
                        
    ///////WORK WITH DAVID!!!!!//////////        
     //       $studentIndex = $Que['student_name'];
       //     $studentName = $StuID[$studentIndex];
            
            
            
                
        foreach ($StuID as $Que) {
            $endTime = $Que['end_time'];
            
//            $studentIndex = $Que['student_name'];
            $studentName = $Que['student_first_name'];
            
//            $studentName = $Que['student_name'];
            $courseCode = $Que['classes_course_code'];
            $startTime = $Que['start_time'];
            $assistantName = $Que['ast_name'];
            $roger = $Que['comments'];
            if ($endTime === NULL){
            echo '<tr>';
                echo '<td>'.$studentName.'</td>';
                echo '<td>'.$courseCode.'</td>';
                echo '<td>'.$roger.'</td>';
                echo '<td>'.$assistantName.'</td>';
                echo '<td>filler</td>';
            echo '</tr>';
            }
//            else{
//                echo '<tr>';
//                echo '<td>Filler</td>';
//                echo '<td>Filler</td>';
//                echo '<td>Filler</td>';
//                echo '<td>Filler</td>';
//                echo '<td>Filler</td>';
//            echo '</tr>';
//            }
            
        }
                ?>
            <!--                    <td></td>-->

        </table>



           <!--        </ul>-->

            <!--        <form>-->

            <?php 

        ?>

            <!--        </form>-->




    </body>


    </html>
