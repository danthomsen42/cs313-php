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
    
    </body>



</html>    