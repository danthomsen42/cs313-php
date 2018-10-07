<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="shopping.css">


</head>

<body>
<header id="header-top"></header>

    <?php 
    
        
    $value1 = $_POST['number1'];
    $value2 = $_POST['number2'];
    $value3 = $_POST['number3'];
    $value4 = $_POST['number4'];
    $Merchandise = $_POST['Merchandise'];
    
    
    $_SESSION['number1'] = $value1;
    $_SESSION['number2'] = $value2;
    $_SESSION['number3'] = $value3;
    $_SESSION['number4'] = $value4;
    $_SESSION['Merchandise'] = $Merchandise;
    
    
if(!empty($_POST['Merchandise'])){
    foreach($_POST['Merchandise'] as $value){
        echo $value.'<br>';
    }
}
    
if(!empty($_POST['cost'])){
    foreach($_POST['Merchandise'] as $value){
        echo $value.'<br>';
    }
}
    
    

    
    
?>


    <footer id="footer-bottom"></footer>
    <script src="modules.js"></script>
</body>


</html>
