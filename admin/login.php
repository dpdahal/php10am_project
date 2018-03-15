<?php
require_once ('../Configuration/configuration.php');
require_once ('../database/connection.php');


if(!empty($_POST) && $_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_POST['username'];
    $password=md5($_POST['password']);

    $sql = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
    LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.users_id  WHERE tbl_users.username='$userName'";
    $result=mysqli_query($conn,$sql);
    $userData=mysqli_fetch_assoc($result);
    if($userData>0){
       $userPassword=$userData['password'];
       if($userPassword===$password){
           $_SESSION['user_name']=$userData['username'];
           $_SESSION['user_email']=$userData['email'];
           $_SESSION['user_image']=$userData['image_name'];
           $_SESSION['user_type']=$userData['user_type'];
           $_SESSION['user_id']=$userData['uid'];
           $_SESSION['is_log_in']=TRUE;
           header('Location:index.php');
           exit;

       }else{
           $_SESSION['error']='username amd password not match';
           header('Location:login.php');
           exit;
       }


    }else{
        $_SESSION['error']='invalid criteria';
        header('Location:login.php');
        exit;
    }




}





?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?=BASE_URL.'Public/admin/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/admin/css/font-awesome.css'?>">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h1><i class="glyphicon glyphicon-lock"></i> Login Page</h1>
            <hr>
            <?php
            if (isset($_SESSION['error'])) :?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);

                    ?>
                </div>

            <?php endif; ?>

            <form action="" method="post">
            <div class="form-group">
                <label for="usernmae"> User name</label>
                <input type="text" name="username" class="form-control" id="usernmae" placeholder="enter username">
            </div>
            <div class="form-group">
                <label for="pass"> Password</label>
                <input type="password" name="password" class="form-control" id="usernmae" placeholder="enter password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary ">Log In</button>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>