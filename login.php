<?php 
    require_once "con.php";
    require_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center><h1>Sign In</h1></center>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input type="text" name="username" class="form-control" placeholder="Enter username" 
    value ="<?php 
                if(@$remember==1){
                    echo $_SESSION["username"];
                }
                else{
                    echo "";
                }
    ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php

    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //echo $username, $password;
        $sql = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ?";
        $query = $dbh->prepare($sql);
        $query->execute([$username,$password]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if(@$user){
            //print_r($user);
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["userCheck"] = 1;
            header("Location:index.php");

        }
        else{
            echo "try again";
        }

        if(isset($_POST['remember'])){
            $remember = 1;

            echo $remember;
        }

        else{
            $remember = 0;
        }



    }
?>
</body>
</html>