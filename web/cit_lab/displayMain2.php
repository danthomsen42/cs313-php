<?php
//conect to DB
require('dbConnect.php');
$db = get_db();
//query for all movies
$stmt = $db->prepare('SELECT id, ast_name FROM assistants');
$courses = $db->prepare('SELECT id, course_code FROM classes');
$joined = $db->prepare('SELECT assistants.ast_name, classes.course_code FROM assistants, classes, assistant_classes WHERE assistant_classes.ast_name = assistants.id and assistant_classes.course_Code = classes.id');

$StudentList = $db->prepare('SELECT id, student_first_name, student_last_name FROM students');

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






$stmt-> execute();
$courses-> execute();
$joined-> execute();
$StudentList-> execute();
$QueueInfo-> execute();


$ast = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cls = $courses->fetchAll(PDO::FETCH_ASSOC);
$jnd = $joined->fetchAll(PDO::FETCH_ASSOC);
$StLst = $StudentList->fetchAll(PDO::FETCH_ASSOC);
$Queue = $QueueInfo->fetchAll(PDO::FETCH_ASSOC);


?>
    <!DOCTYPE html>
    <html>
    <head>
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
