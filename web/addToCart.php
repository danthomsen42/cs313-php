<?php

session_start();

$products = $_POST["products"];
    
if (!isset($_SESSION["cart"])){
    
    S_SESSION["cart"] = 
}

foreach ($products as $product){
        S_SESSION["cart"]
        
    }

?>


<html>

<body>
    <p>You have added the floolwing to the cart</p>
    <?php

$products = $_POST["products"];

foreach($products as $product){
    echo "$product<br>";
}
?>
</body>

</html>
