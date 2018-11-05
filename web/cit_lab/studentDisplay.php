<!DOCTYPE html>
<html>

<head></head>

<body>
    <?php
require('dbConnect.php');
$db = get_db();        


$stmt = $db->prepare('SELECT id, ast_name FROM assistants');
$courses = $db->prepare('SELECT id, course_code FROM classes');
$joined = $db->prepare('SELECT assistants.ast_name, classes.course_code FROM assistants, classes, assistant_classes WHERE assistant_classes.ast_name = assistants.id and assistant_classes.course_Code = classes.id');
$StudentList = $db->prepare('SELECT id, student_first_name, student_last_name FROM students');
$QueueInfo = $db->prepare('SELECT student_name, end_time FROM queue');    
    
 $studentNumber = 0; 
//echo 'Hello';    
var_dump($_POST);    
$studentNumber = $_POST['StudentName'];  
    echo $studentNumber;  
$CheckQueue = $db->prepare('SELECT COUNT(*) FROM queue WHERE end_time = NULL AND student_name = '.$studentNumber);  
//echo 'SELECT COUNT(*) FROM queue WHERE end_time = NULL AND student_name = '.$studentNumber.'';    
    
 //echo 'Hello1';      


$stmt-> execute();
$courses-> execute();
$joined-> execute();
$StudentList-> execute();
$QueueInfo->execute();
echo 'Hello2';    
    
echo 'Hello3';   
$ast = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cls = $courses->fetchAll(PDO::FETCH_ASSOC);
$jnd = $joined->fetchAll(PDO::FETCH_ASSOC);
$StLst = $StudentList->fetchAll(PDO::FETCH_ASSOC);
$QueueStuff = $QueueInfo->fetchAll(PDO::FETCH_ASSOC);  


//    if ($Check > 0){
//        echo 'alert("validation failed false");';
//    }
//    else{
//        
//    }
echo 'Hello4';       
echo '<form method="POST" onsubmit="return validateMyForm();">';   
echo 'Hello5';   
    

    if (isset($_POST['comments'])){
     
   $studentNameId = $_POST["StudentName"];
   $courseCodeId = $_POST["courseCode"];
   $studentNotes = $_POST["comments"];
        
    $queueInput = $db->prepare('INSERT INTO queue (student_name, course_code, comments, enter_time) VALUES
    (\''.$studentNameId.'\',\''.$courseCodeId.'\',\''.$studentNotes.'\', now());');    
      
            try {
        $CheckQueue->execute();
        $Check = $CheckQueue->fetchAll(PDO::FETCH_ASSOC);    
            if ($Check > 0){
        echo 'alert("validation failed false");';
    }    
         $queueInput->execute();
        }
         catch(Exception $e){
            echo $e;
         }          
        }
    
   // echo $studentNameId;    
        
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
              echo '<textarea cols=40 rows=3 placeholder="Notes:" name="comments"></textarea>';
    echo '</br>';
         
    echo '<input type="submit" value="Submit">';      
    echo '</form>';    
        ?>


        <script>
            function validateMyForm() {
                var result = <?php echo alertCheck(); ?>
                return result;
                //                <?php
                //                function alertCheck(){
                //                $nullOperand = NULL; 
                //                foreach ($QueueStuff as $Que) {
                //                    $endTime = $Que['end_time'];
                //                    $Student = $Que['student_name'];
                //                    foreach ($StLst as $ListOfStudents){
                //                             $id = $ListOfStudents['id'];
                //                    if ($id == $Student && $endTime === $nullOperand){    
                //               // echo 'if ('.$id.' == '.$Student.' && '.$endTime.' === '.$nullOperand.'){ <br>';
                //                        echo 'alert("validation failed false");<br>';
                //                        return 'false';
                //                        echo 'return false;<br>';
                //                    }
                //                        //echo 'else{<br>';
                //                    else{        
                //                        return 'true';
                //                        echo 'return true;<br>';    
                //                    }
                //                    }
                //                    }
                //                }
                //                ?>
            }




            //                if (check
            //                    if your conditions are not satisfying) {
            //                    alert("validation failed false");
            //                    returnToPreviousPage();
            //                    return false;
            //                }
            //
            //                alert("validations passed");
            //                return true;
            //
            //
            //            }

        </script>



        <?php
//////SECOND FORM        
        
        
    echo '<form method="POST">';          
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
     
      
    echo '<input type="text" name="StudentFirstName" placeholder="First name">';
    echo '<input type="text" name="StudentLastName" placeholder="Last name">'; 
    echo '<input type="text" name="INumber" placeholder="I-Number">';         
        
    echo '<input type="submit" value="Submit">';    
    echo '</form>';
        
        
echo '<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>';
//        
//      You close php here...    
        
          ?>
</body>

</html>
