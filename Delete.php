<?php
include 'Connection.php';
include 'User.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `student_info` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Deleted Data with id $id successfully, see the remaining: ";
        header('location: show.php');
    } else{
        die(mysqli_error($conn));
    }
}
?>