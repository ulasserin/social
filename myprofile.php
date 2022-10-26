<?php
    require_once 'con.php';
    require_once 'function.php';
    userCheck();
    $sql2 = "SELECT date,avatar FROM users WHERE `username` = ?";
    $q2 = $dbh->prepare($sql2);
    $q2->execute([$_SESSION['username']]);
    $lastUpdateDate = $q2->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'inc/header.php'; ?>
    <title>My Profile</title>
</head>
<body>
    <?php include_once 'inc/nav.php'; ?>
    
    <br> <br>
    <h5><?php   echo "Welcome Your Profile, " . $_SESSION['username'];?></h5>
    <hr>
    <form action="" method="POST">
    
    <img src="inc/avatar/1.png" class="rounded-circle" style="width: 300px; height: 300px;"
  alt="Avatar" />
  <hr>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input type="text" id="input1" class="form-control" value="<?=$_SESSION['username'];?> (*you cannot change your username)" aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>

    <div class="input-group mb-3">
        <input type="password" id="input1" name="password1" class="form-control" aria-label="password" placeholder="password" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <input type="password" id="input1" name="password2" class="form-control" aria-label="password" placeholder="password again" aria-describedby="basic-addon1">
    </div>
    Your last password update: 
    <?php foreach($lastUpdateDate as $date) { ?>
    <span class="label label-default"><?=$date?></span>
    <?php } ?>
    <br> <br>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
    <?php
        
        if (isset($_POST['submit'])){
            $passwordfirst = $_POST['password1'];
            $passwordsecond = $_POST['password2'];
            echo $passwordfirst,$passwordsecond;

            if($passwordfirst == $passwordsecond){
                $sql = "UPDATE `users` SET `password` = ? WHERE `username` =?";
                $query = $dbh->prepare($sql);
                $query->execute([$passwordfirst,$_SESSION['username']]);
                
            }
            else{
                echo "password dosen't match";
            }
        }
    ?>

</body>
</html>