        <?php
        
        
echo '<form method="POST" action="displayMain2.php?action=queue">';   

        
    if (isset($_POST['comments'])){
      
   $studentNameId = $_POST["StudentName"];
   $courseCodeId = $_POST["courseCode"];
   $studentNotes = $_POST["comments"];
        
    $queueInput = $db->prepare('INSERT INTO queue (student_name, course_code, comments, enter_time) VALUES
    (\''.$studentNameId.'\',\''.$courseCodeId.'\',\''.$studentNotes.'\', now());');    
      
            try {
         $queueInput->execute();
        }
         catch(Exception $e){
            echo $e;
         }          
}
    echo $studentNameId;    
        
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
        
        
        
//////SECOND FORM        
        
        
    echo '<form method="POST" action="displayMain2.php?action=students">';          
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
        
        

//        
//      You close php here...    
        
          ?>
 