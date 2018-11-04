<!DOCTYPE html>
<html>
<head>    
</head>
    <body>
    
      <form method="POST" action="displayMain2.php?action=queue">
        
        <?php  
          require('dbConnect.php');
          $db = get_db();
          
          $Assistant_finish = $db->prepare('UPDATE queue SET end_time = now() WHERE queue.id = 1');
          
          
          $Assistant_finish->execute();
          
          
          ?>
        
        <input type="submit" value="Submit">
        </form>  
        
    </body>
</html>