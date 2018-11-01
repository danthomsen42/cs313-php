<?php
//conect to DB
require('dbConnect.php');
//$db = get_db();
//query for all movies
$stmt = $db->prepare('SELECT id, ast_name FROM assistants');
$courses = $db->prepare('SELECT id, course_code FROM classes');
$joined = $db->prepare('SELECT assistants.ast_name, classes.course_code FROM assistants, classes, assistant_classes WHERE assistant_classes.ast_name = assistants.id and assistant_classes.course_Code = classes.id');

$StudentList = $db->prepare('SELECT id, student_first_name, student_last_name FROM students');


$stmt-> execute();
$courses-> execute();
$joined-> execute();
$StudentList-> execute();

$ast = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cls = $courses->fetchAll(PDO::FETCH_ASSOC);
$jnd = $joined->fetchAll(PDO::FETCH_ASSOC);
$StLst = $StudentList->fetchAll(PDO::FETCH_ASSOC);
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



        <ul>
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
  
        echo '<select name="StudentName">';  
   
                   foreach ($StLst as $ListOfStudents) {
           $FirstName = $ListOfStudents['student_first_name'];
           $LastName = $ListOfStudents['student_last_name']; 
           $id = $ListOfStudents['id'];
//           $course_code = $ast['courseCode'];
           echo '<option value='.$id.'>'.$FirstName.' '.$LastName. '</option>';
//           var_dump($class);
                  
       } 
              echo '</br>'; 
              echo '</br>'; 
             echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '<p>Notes:</p></br>'
            echo '</br><textarea cols=40 rows=3 placeholder="Notes"></textarea>';
              echo '</br>';
            
       echo '</select>';  
            
    echo '</br>';
         
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
        
        
        
        
        $i = 0;
        echo "<div> ------------- </div>";
       foreach ($ast as $assist) {
           $assistant_name = $assist['ast_name'];
//           $course_code = $ast['courseCode'];
           echo "<li><p>$assistant_name</p></li>";
       }   
        
        echo "<div> ------------- </div>";
        $assistants = array();
        $classes = array();    
        //$astCls = array();
         foreach ($jnd as $join) {
           $finished_ast = $join['ast_name'];
             $finished_cls = $join['course_code'];
             
             $i++;
             //$assistants[] = $finished_ast;
            //$assistants[] = array_unique($finished_ast);
//             $astCls[$i] = array(
//                 array('id'=>$i, 'assistant'=>$finished_ast, 'class'=>$finished_cls)
//             );
             
//               $astCls[$i] = array('id'=>$i, 'assistant'=>$finished_ast, 'class'=>$finished_cls);
             $astCls[$i] = array('assistant'=>$finished_ast, 'class'=>$finished_cls);
             $arrayToo[$i] = array($finished_ast, $finished_cls);
             
             
             
//           $course_code = $ast['courseCode'];
           echo "<li><p>$finished_ast - $finished_cls</p></li>";
       }   
        
//        foreach ($astCls as $)
        
//        print_r ($astCls);
        
        echo "<div> ------------- </div>";
        
        $arraySize = count($astCls);
        
        echo $arraySize; 
        
            echo "<div> ------------- </div>";
//        print_r ($arrayToo[1][1]);
        echo $arrayToo[1][0].' -1<br> ';
        echo $arrayToo[1][1].' -2<br> ';
        echo $arrayToo[2][0].' -3<br> ';
        echo $arrayToo[2][1].' -4<br> ';
        echo $arrayToo[3][0].' -5<br> ';
        echo $arrayToo[3][1].' -6<br>';
        echo $arrayToo[4][0].' -7<br>';
        echo $arrayToo[4][1].' -8<br>';
        echo $arrayToo[5][0].' -9<br>';
        echo $arrayToo[5][1].' -10<br>';
        echo $arrayToo[6][0].' -11<br>';
        echo $arrayToo[6][1].' -12<br>';
        echo $arrayToo[7][0].' -13<br>';
        echo $arrayToo[7][1].' -14<br>';
        
        
        
        
        
       // print_r ($astCls);
                
//        print_r(array_values($astCls));
        
        echo "<div> ------------- </div>";

        for ($row = 1; $row <= $arraySize; $row++){
            echo '<p><b>Lab Assistant '.$row.'</b><p><br>';
            for ($col = 0; $col < 2; $col++){
                if ($arrayToo[$row][0] == $astCls[$row+1][0]){
                    $arrayToo[$row+1][0] = ' ';
                }
                else{
                echo '<div>' .$arrayToo[$row][$col].'</div>';
//                 print_r '<div>' .$astCls[$row][$col].'</div>';
                }
            }
            
            
        }
        
       
        
        
        
          ?>
        </ul>

        <form>

            <?php 
        //http://www.postgresqltutorial.com/postgresql-php/insert/
    //    public function insertData($student_name, $classCode){
      //      $sql = 'INSERT INTO students(studentName, courseCode) VALUES(:studentName, :courseCode)';
        //    $stmt = $this->pdo->prepare($sql);
            
          //  $stmt->
     //   }
        
        ?>

        </form>




    </body>


    </html>