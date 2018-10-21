<?php
//conect to DB
require('dbConnect.php');
//$db = get_db();
//query for all movies
$stmt = $db->prepare('SELECT id, ast_name FROM assistants');
$meh = $db->prepare('SELECT id, courseCode FROM classes');
$stmt-> execute();
$meh-> execute();

$ast = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cls = $meh->fetchAll(PDO::FETCH_ASSOC);
// go through each movie in th eresult and display it

?>
<!DOCTYPE html>
<html>
<head>
    
    
    </head>
<body>
    <ul>
    <?php
       foreach ($cls as $cls) {
           $classcode = $cls['courseCode'];
//           $course_code = $ast['courseCode'];
           echo "<li><p>($classcode)</p></li>";
       } 
        
        
       foreach ($ast as $ast) {
           $assistant_name = $ast['ast_name'];
//           $course_code = $ast['courseCode'];
           echo "<li><p>$assistant_name</p></li>";
       }   
          ?>
    </ul>
    
    </body>


</html>