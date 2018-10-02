<!DOCTYPE html>
<html>

<head>

</head>

<body>

<?php echo $_POST["name"]; ?><br>
    <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a><br>
<?php echo $_POST["major"]; ?><br>
<?php echo $_POST["comments"]; ?><br>
<?php 
//    $continents = $_POST["Continent"];
    if (isset($_POST['Continent']))
    {
        $continents = $_POST['Continent']
        foreach( $continents as $key){
        echo "$key <br>";
    }
    }
    
    
//    foreach( $continents as $key){
//        echo "$key <br>";
//    }
    
?>
</body>

</html>
