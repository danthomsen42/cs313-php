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
    $_SESSION['number1'] = $value1;
    $_SESSION['number2'] = $value2;
    $_SESSION['number3'] = $value3;
    $_SESSION['number4'] = $value4;
    
    
    echo $value4;
    echo $value3;
    
    
?>



</body>


</html>
