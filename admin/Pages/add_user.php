<?php

if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $userType = $_POST['user_type'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmation = md5($_POST['password_confirmation']);

    if ($password === $confirmation) {
        $query = "insert into tbl_users 
          (name,username,email,user_type,password)
          VALUES ('$name','$username','$email','$userType','$password')";
        $result = mysqli_query($conn, $query);

        $usrId=mysqli_insert_id($conn);

        if ($result == true) {
            $_SESSION['success'] = 'user was inserted';
            $_SESSION['user_id']=$usrId;
            header('Location:admin.php?page=view_info');
        } else {
            $_SESSION['error'] = 'there was a problems';
        }


    }else{
        $_SESSION['error'] = 'password not match';
    }



}


?>


<div class="container-fluid">

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>Add User</h1>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_type"> User Type</label>
                            <select name="user_type" id="user_type" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-primary">Add Record</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>