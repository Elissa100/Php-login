<?php

$conn = new mysqli('localhost','root','','store');

if(!$conn){
    die(mysqli_error($conn));
} 


?>