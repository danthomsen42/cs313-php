<!DOCTYPE html>
<html>
<head>
    <?php
// Always start this first
session_start();
require('dbConnect.php');
$db = get_db();
    
    
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        //$con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $db->prepare('SELECT * FROM lablogin WHERE username = Donatello47');
        //$stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
    		$_SESSION['user_id'] = $user->ID;
    	}
    }
}
?>
    </head>
<body>
    <form action="https://radiant-gorge-54637.herokuapp.com/cit_lab/assistantDisplay.php" method="post">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="submit" value="Submit">
</form>
    
    
    
    
    
    
    
    </body>



</html>