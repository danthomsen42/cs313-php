<?php
//conect to DB
require('dbConnect.php');
//$db = get_db();
//query for all movies
$stmt = $db->prepare('SELECT id, title, year FROM movie');
$stmt-> execute();

$movies = $stmt->fetchAll(PDO::FETHC_ASSOC);
// go through each movie in th eresult and display it

?>
<!DOCTYPE html>
<html>
<head>
    
    
    </head>
<body>
    <ul>
    <?php
       foreach ($movies as $movie) {
           $title = $movie['title'];
           $year = $movie['year'];
           echo "<li><p>$title ($year)</p></li>";
       }   
          ?>
    </ul>
    
    </body>


</html>