<?php

include 'Connection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php crud</title>
    <link rel="stylesheet" href="show.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <button type="submit" class="btn">
        <a href="/User.php" class="text-light">Add Member</a>
    </button>
</div>

<table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Password</th>
      <th scope="col">Action(Operation)</th>
    </tr>
  </thead>
  <tbody>


  
<?php   

error_reporting(E_ALL);
ini_set('display_errors', 1);


$sql = "SELECT * FROM student_info";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>";
        echo "<button class='btn btn-primary'><a class='text-light' href='/delete.php?
        deleteid=" . $row["id"] . "'><span class='icon'><i class='fas fa-trash-alt'></i></span></a></button>";
        echo "<button class='btn ntn-danger'><a class='text-light' href='/edit.php?
        updateid=" . $row["id"] . "'><span class='icon'><i class='fas fa-edit'></i></span></a></button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

  </tbody>
</table>
    
</body>
</html>