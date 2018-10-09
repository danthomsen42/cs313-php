<?php

session_start();

?>

<?php

$items = $_SESSION["cart"];

$products = $_POST["products"];

foreach ($products as $product){
    echo "$product<br>";
}

?>