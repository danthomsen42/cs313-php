<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>



</head>

<body>


    <?php 
if(!empty($_POST['Merchandise'])){
    foreach($_POST['Merchandise'] as $value){
        echo $value.'<br>';
    }
}
    
    
    
?>



</body>


</html>
