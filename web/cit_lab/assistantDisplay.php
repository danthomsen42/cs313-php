<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <form method="POST">




        <?php  
          require('dbConnect.php');
          $db = get_db();
          
$StudentByID = $db->prepare('SELECT students.student_first_name, students.student_last_name, queue.id, student_name, queue.course_code as queue_course_code, ast_name, enter_time, start_time, end_time, comments, classes.course_code as classes_course_code 
FROM students
JOIN queue ON queue.student_name = students.id
JOIN classes ON queue.course_code = classes.id
WHERE queue.student_name = students.id
ORDER BY queue.id;');
     $StudentByID-> execute();
    $StuID = $StudentByID->fetchAll(PDO::FETCH_ASSOC);

          
$Assistants = $db->prepare('SELECT id, ast_name FROM assistants');
$Assistants->execute();
$asstnt = $Assistants->fetchAll(PDO::FETCH_ASSOC);
          
          
    echo '<select name="StudentName">';
            foreach ($StuID as $Que) {
            $endTime = $Que['end_time'];
            $studentFirstName = $Que['student_first_name'];
                $studentLastName = $Que['student_last_name'];
            $queueID = $Que['id'];
            $courseCode = $Que['classes_course_code'];
            $startTime = $Que['start_time'];
            if ($endTime === NULL){      
          echo '<option value='.$queueID.'>'.$studentFirstName.' '.$studentLastName.' ------- '. $courseCode.'</option>';
          // echo $queueID;     
                
            }
            }
               echo '</select>';   
          
    echo '<select name="AssistantName">';
          foreach ($asstnt as $ast) {
              $astID = $ast['id'];
              $astName = $ast['ast_name'];
          echo '<option value='.$astID.'>'.$astName.'</option>';
          
          }
          echo '</select>';
          
          
          //Display the next student in the queue that the assistant is assigned to
          
          //When the button is pressed, it UPDATES queue and sets the end_time to the current time stamp
          
          //figure out how to auto increment to next availbale individual according to courses assitant's can teach, if students are already being helped or not, and if not, being assigned to that next availble student with the course the assistant can teach
         
          if ($_POST["HelpButton"]){
          if (isset($_POST['StudentName']))
          {
              $namie = $_POST['StudentName'];
              $astNamie = $_POST['AssistantName'];
              var_dump($_POST);
            echo 'this is me '.$namie;
             $curr = time(); 
           // $curr= $_SERVER['REQUEST_TIME'];
         $Assistant_help = $db->prepare('UPDATE queue SET start_time = '.$curr.', ast_name = '.$astNamie.' WHERE queue.id = '.$namie);
          $Assistant_help->execute(); 
              
          }
          //When Assistant is assigned, update the Start_time part in the queue.
          
          //Don't Bother with a skip button at this time
          }
          
     
          
          

          
          echo '<input type="submit" name="HelpButton" value="Help">';
        echo '</form>'; 
        
        
        echo '<form method="POST">'; 
    
        if ($_POST['FinishedButton']){    
             if (isset($_POST['StudentName']))
          {
            $namiey = $_POST['StudentName'];
              
            $timey = time();
          $Assistant_finish = $db->prepare('UPDATE queue SET end_time = '.$timey.' WHERE queue.id = '.$namiey);
          
          
          $Assistant_finish->execute();
              }
        }
          
               echo '<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>';
          
            ?>

        <input type="submit" name="FinishedButton" value="Finished">
    </form>

</body>

</html>
