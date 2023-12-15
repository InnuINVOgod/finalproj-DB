<?php
include 'database.php';
$id=$_GET['updateid'];
$sql="Select * from `users` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$fullname=$row['full_name'];
$username=$row['username'];
$password=$row['password'];


if(isset($_POST['submit'])){
  $fullname = $_POST["fullname"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  $sql="update `users` set id=$id, full_name='$fullname', username='$username', password='$passwordHash' where id=$id";
  $result = mysqli_query($conn,$sql);
  if($result){
    // echo "data inserted successfully";
    header('location:crud.php');
  }else {
    die(mysqli_error($conn));
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label>Full Name</label>
        <input type="text" class="form-control" placeholder="Enter your Full name" name="fullname" autocomplete="off" value=<?php echo $fullname;?>>
      </div>
      <div class="mb-3">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Enter your Username" name="username" autocomplete="off" value=<?php echo $username;?>>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Enter your Password" name="password" autocomplete="off" value=<?php echo $password;?>>
      </div>
 
      <div class="mb-1 form-check">
        <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
        <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    </div>
  </body>
</html>