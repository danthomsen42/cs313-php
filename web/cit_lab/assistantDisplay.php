<!DOCTYPE html>
<html>
<head>    
</head>
    <body>
    
      <form action='method="POST" action="displayMain2.php?action=queue'>
        
        <?php  
          require('dbConnect.php');
          
          
          $Assistant_finish = $db->prepare('UPDATE queue SET end_time = now() WHERE queue.id = 1;');
          
          
          $assistant_finish->execute();
          
          
          ?>
        
        <input type="submit" value="Skip next person">
        </form>  
        
    </body>
</html>