  
<!DOCTYPE html>
<html>
<head>
        <?php

    require 'resources.php';
    $pas = $_POST["password"];
    $usr = $_POST["username"];    
        $passwordHash = password_hash($pas, PASSWORD_DEFAULT);
        
    $statement = $db->prepare("INSERT INTO loginUserTeamWeekSeven (username, password) VALUES (:usr, :passwordHash);");
    $statement->execute();
    
        ?>  
    
    
    </head>
<body>
 
    
    
    </body>





</html>
