<?php

if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $catName = $_POST['cat_name'];

        $query = "insert into tbl_image_categories 
          (cat_name)
          VALUES ('$catName')";
        $result = mysqli_query($conn, $query);

        $usrId=mysqli_insert_id($conn);

        if ($result == true) {
            $_SESSION['success'] = 'category was inserted';
            header('Location:admin.php?page=add_category');
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
                <h1>Add Image Category</h1>
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
                            <label for="name">Category Name</label>
                            <input type="text" name="cat_name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Add Category</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>