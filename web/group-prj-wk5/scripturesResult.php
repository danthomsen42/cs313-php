<?php 
 require 'resources.php';
$fix = $_POST['topic'];
$arr = unserialize(base64_decode($fix));
echo $arr[];
?>
