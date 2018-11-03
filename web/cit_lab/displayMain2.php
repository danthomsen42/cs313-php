<?php
//conect to DB
require('dbConnect.php');
//$db = get_db();
//query for all movies
$stmt = $db->prepare('SELECT id, ast_name FROM assistants');
$courses = $db->prepare('SELECT id, course_code FROM classes');
$joined = $db->prepare('SELECT assistants.ast_name, classes.course_code FROM assistants, classes, assistant_classes WHERE assistant_classes.ast_name = assistants.id and assistant_classes.course_Code = classes.id');

$StudentList = $db->prepare('SELECT id, student_first_name, student_last_name FROM students');

$QueueInfo = $db->prepare('SELECT id, student_name, course_code, ast_name, enter_time, start_time, end_time FROM queue');

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
// go through each movie in th eresult and display it

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
                        
        foreach ($Queue as $Que) {
            $endTime = $Que['end_time'];
            $studentName = $Que['student_name'];
            $courseCode = $Que['course_code'];
            $startTime = $Que['start_time'];
            $assistantName = $Que['ast_name'];
            $notes = $Que['notes'];
            if ($endTime === NULL){
            
            echo '<tr>';
                echo '<td>'.$studentName.'</td>';
                echo '<td>'.$courseCode.'</td>';
                echo '<td>'.$notes.'</td>';
                echo '<td>'.$assistantName.'</td>';
                echo '<td>filler</td>';
            echo '</tr>';
            }
            else{
                echo '<tr>';
                echo '<td>Filler</td>';
                echo '<td>Filler</td>';
                echo '<td>Filler</td>';
                echo '<td>Filler</td>';
                echo '<td>Filler</td>';
            echo '</tr>';
            }
            
        }
        
                
                
              
                
          
                ?>  
<!--                    <td></td>-->

            </table>



            <?php
        
        
       echo '<form method="POST" action="displayMain2.php">';   
    echo '<select name="courseCode">';
        
        
       foreach ($cls as $class) {
           $classcode = $class['course_code'];
           $id = $class['id'];
//           $course_code = $ast['courseCode'];
           echo '<option value='.$id.'>'.$classcode.'</option>';
//           var_dump($class);       
           
       } 


     
        echo '</select>';
    echo '</br>'; 
       echo '</br>';
   
        
//The purpose of this Portion is to generate the list of students in the database of students.     
        echo '<select name="StudentName">';  
   
        foreach ($StLst as $ListOfStudents) {
           $FirstName = $ListOfStudents['student_first_name'];
           $LastName = $ListOfStudents['student_last_name']; 
           $id = $ListOfStudents['id'];
//           $course_code = $ast['courseCode'];
           echo '<option value='.$id.'>'.$FirstName.' '.$LastName. '</option>';
//           var_dump($class);
                  
       } 
       
       echo '</select>';  
        
        
        
            echo '</br>';
            echo '</br>';
        
        
                  echo 'Notes:</br>';
              echo '<textarea cols=40 rows=3 placeholder="Notes:"></textarea>';
    echo '</br>';
         
        echo '<input type="submit" value="Submit">';            
            
            
    echo '<h3>Not on the list? Sign up down below to be added to the list. </h3>';        
        
        
     if  (isset($_POST["StudentFirstName"]) && isset($_POST["StudentLastName"]) && isset($_POST["INumber"])){ 
         $StFirstName = $_POST["StudentFirstName"];
         $StLastName = $_POST["StudentLastName"];
         $StINumber = $_POST["INumber"];
         $CourseNum = $_POST["courseCode"];
        $student = $db->prepare('INSERT INTO students (student_first_name, student_last_name, i_number) VALUES (\''.$StFirstName.'\',\''.$StLastName.'\',\''.$StINumber.'\');');
       // $queue = $db->prepare('INSERT INTO queue()') 
         
        try {
         $student->execute();
        }
         catch(Exception $e){
            echo $e;
         }
        }  
        
        
        /*    
               if  (isset($_POST["StudentFirstName"]) && isset($_POST["StudentLastName"]) && isset($_POST["INumber"])){ 
         $StFirstName = $_POST["StudentFirstName"];
         $StLastName = $_POST["StudentLastName"];
         $StINumber = $_POST["INumber"];
         $CourseNum = $_POST["courseCode"];
        $student = $db->prepare('INSERT INTO students (student_first_name, student_last_name, course_code, enter_time) VALUES (\''.$StFirstName.'\',\''.$StLastName.'\','.$CourseNum. ', now());');
        try {
         $student->execute();
        }
         catch(Exception $e){
            echo $e;
         }
        }  
        */  
            
      
    echo '<input type="text" name="StudentFirstName" placeholder="First name">';
    echo '<input type="text" name="StudentLastName" placeholder="Last name">'; 
    echo '<input type="text" name="INumber" placeholder="I-Number">';         
        
    echo '<input type="submit" value="Submit">';    
    echo '</form>';
        
        

//        
//      You close php here...    
        
          ?>
<!--        </ul>-->

<!--        <form>-->

            <?php 

        ?>

<!--        </form>-->




    </body>


    </html>
