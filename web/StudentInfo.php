<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <?php echo $_POST["name"]; ?><br>
    <a href="mailto:<?php echo $_POST[" email "]; ?>">
        <?php echo $_POST["email"]; ?>
    </a><br>
    <?php echo $_POST["major"]; ?><br>
    <?php echo $_POST["comments"]; ?><br>
    <?php 
if(!empty($_POST['Continent'])){
    foreach($_POST['Continent'] as $value){
        echo $value.'<br>';
    }
}
    
    
    
?>
</body>

</html>
