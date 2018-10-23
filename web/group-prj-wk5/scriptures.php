<html>

<head>



</head>

<body>
    <?php require 'resources.php'?>

    <?php 
    foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
{
  echo '<b>' . $row['book']. '&nbsp' . $row['chapter'] . ':' . $row['verse'] . '</b> - \"' . $row['content'] . '\"';
//  echo ' password: ' . $row['password'];
  echo '<br/>';
}
    ?>

    <form>
        <label>Type Book</label>
        <input type="text" value="" name="book"> <button type="submit" value="Search"></button>

    </form>

    <form action="scripturesResult.php" method="post">

        Book: <input type="text" name="book" id="book"> <br>
        Chapter: <input type="text" name="chapter" id="chapter"> <br>
        Verse: <input type="text" name="verse" id="verse"><br>
        Content:<br><textarea name="content" rows="5" cols="50"></textarea> <br>
        
        <?php 
        $stmt = $db->prepare('SELECT name FROM Topic');
        $stmt-> execute();
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
               foreach ($topics as $index=>$topic) {
           $TopicName = $topic['name'];
            
//           $course_code = $ast['courseCode'];
           echo "<input type=\"checkbox\" name=\"topic[]\" value=\"" . $index .  "\">" . $TopicName . "<br>";
       }   
        
        
        
        
        
        
        ?>
        
        
        <input type="submit" >



    </form>





</body>



</html>
