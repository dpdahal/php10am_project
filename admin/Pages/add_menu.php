<?php

if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $menuName = $_POST['menu_name'];

        $query = "insert into tbl_menus 
          (menu_name)
          VALUES ('$menuName')";
        $result = mysqli_query($conn, $query);

        $usrId=mysqli_insert_id($conn);

        if ($result == true) {
            $_SESSION['success'] = 'user was inserted';
            header('Location:admin.php?page=add_menu');
            exit;
        } else {
            $_SESSION['error'] = 'there was a problems';
        }



}


?>


<div class="container-fluid">

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>Add Menu</h1>
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

                <?php
                if (isset($_SESSION['success'])) :?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);

                        ?>
                    </div>

                <?php endif; ?>



                <form action="" method="post">

                        <div class="form-group">
                            <label for="name">Menu Name</label>
                            <input type="text" name="menu_name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Add Menu</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>