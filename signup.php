<?php
    require_once 'con.php';
    require_once 'function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <center> <h1>Sign Up</h1></center>
   
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input type="text" name="username" class="form-control" placeholder="Enter username"  required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
</form>
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql2 = "SELECT `username` FROM `users` WHERE `username` = ?";
        $q2 = $dbh->prepare($sql2);
        $q2->execute([$username]);
        $usernameCheck = $q2->fetch();
        if(!$usernameCheck){
            $sql = "INSERT INTO `users` (`username`,`password`) VALUES (?,?)";
            $query = $dbh->prepare($sql)->execute([$username,$password]);
            $_SESSION['username'] = $username;
            header("Location:index.php");

        }
        else{
            echo "this username is already taken";
        }
    }


?>

</body>
</html>