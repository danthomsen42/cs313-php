<?php
//conect to DB
require('dbConnect.php');
//$db = get_db();
//query for all movies
$stmt = $db->prepare('SELECT id, ast_name FROM assistants');
$meh = $db->prepare('SELECT id, course_code FROM classes');
$joined = $db->prepare('SELECT assistants.ast_name, classes.course_code FROM assistants, classes, assistant_classes WHERE assistant_classes.ast_name = assistants.id and assistant_classes.course_Code = classes.id');
$stmt-> execute();
$meh-> execute();
$joined-> execute();

$ast = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cls = $meh->fetchAll(PDO::FETCH_ASSOC);
$jnd = $joined->fetchAll(PDO::FETCH_ASSOC);
// go through each movie in th eresult and display it

?>
<!DOCTYPE html>
<html>
<head>
    
    
    </head>
<body>
    <header><h2>Assistants and Classes</h2></header>
    
    <ul>
    <?php
       foreach ($cls as $class) {
           $classcode = $class['course_code'];
           $id = $class['id'];
//           $course_code = $ast['courseCode'];
           echo "<li><p>$id () $classcode</p></li>";
//           var_dump($class);
       } 
        
        
       foreach ($ast as $assist) {
           $assistant_name = $assist['ast_name'];
//           $course_code = $ast['courseCode'];
           echo "<li><p>$assistant_name</p></li>";
       }   
        
         foreach ($jnd as $join) {
           $finished = $join['ast_name', 'course_code'];
//           $course_code = $ast['courseCode'];
           echo "<li><p>$finished</p></li>";
       }   
        
          ?>
    </ul>
    
    </body>


</html>