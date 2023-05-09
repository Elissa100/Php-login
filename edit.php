<?php

include 'Connection.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `student_info` WHERE id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

   $firstname = $row['firstname'];
    $other_names = $row['lastname'];
    $email = $row['email'];
    $gender = $row['gender'];
    $password = $row['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $other_names = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "UPDATE `student_info` SET Firstname='$firstname',Lastname='$other_names',email='$email',gender='$gender',password='$password'";

     $result = mysqli_query($conn,$sql);
     if($result){
        header('location: show.php');
     } else {
        die(mysqli_error($conn));
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    
<h1>Hello, Welcome to update your data</h1>

<div class="container">

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Your First name: </label>
    <input type="text" class="form-control" id="exampleInputfirstname1" aria-describedby="firstnamelHelp" name="firstname" placeholder="Input here your Christian name" value=<?php echo $firstname;?> >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Other names: </label>
    <input type="text" class="form-control" name="lastname" id="exampleInputOthername1" placeholder="Enter your other names" value=<?php echo $other_names;?> >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email: </label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your @email" name="email" value=<?php echo $email;?> >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Gender: </label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="gender" value=<?php echo $gender;?> >
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password: </label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value=<?php echo $password;?> >
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
</div>

</body>
</html>