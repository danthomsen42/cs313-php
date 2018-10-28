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
             
             
//           $course_code = $ast['courseCode'];
           echo "<li><p>$finished_ast - $finished_cls</p></li>";
       }   
        
//        foreach ($astCls as $)
        
//        print_r ($astCls);
        
        echo "<div> ------------- </div>";
        
        $arraySize = count($astCls);
        
        echo $arraySize; 
        
            echo "<div> ------------- </div>";
        print_r '<p> Hello </p>'.($astCls[2][1]);
        
        print_r ($astCls);
                
//        print_r(array_values($astCls));
        
        echo "<div> ------------- </div>";

        for ($row = 0; $row < $arraySize; $row++){
            echo '<p><b>Lab Assistant '.$row.'</b><p><br>';
            for ($col = 0; $col < 2; $col++){
//                if ($astCls[$row][0] === $astCls[$row+=1][0]){
//                    $astCls[$row+=1][0] = '-';
//                }
//                else{
                echo '<div>' .$astCls[$row][$col].'</div>';
//                }
            }
            
            
        }
        
        
        
          ?>
    </ul>
    
    </body>


</html>