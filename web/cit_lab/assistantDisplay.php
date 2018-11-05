<!DOCTYPE html>
<html>
<head>    
</head>
    <body>
    
      <form method="POST">
        
          
          
          
        <?php  
          require('dbConnect.php');
          $db = get_db();
          

          
          //Display the next student in the queue that the assistant is assigned to
          
          //When the button is pressed, it UPDATES queue and sets the end_time to the current time stamp
          
          //figure out how to auto increment to next availbale individual according to courses assitant's can teach, if students are already being helped or not, and if not, being assigned to that next availble student with the course the assistant can teach
          
          
          //When Assistant is assigned, update the Start_time part in the queue.
          
          //Don't Bother with a skip button at this time
          
          $Assistant_finish = $db->prepare('UPDATE queue SET end_time = now() WHERE queue.id = 3');
          
          
          $Assistant_finish->execute();
          
          
          ?>
        
        <input type="submit" value="Submit">
        </form>  
        
    </body>
</html>