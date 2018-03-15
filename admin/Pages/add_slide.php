<?php

if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $imageExt = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $imageExt;
    $tmpName = $_FILES['upload']['tmp_name'];
    $size = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $imgExt = ['jpg', 'png', 'jpeg', 'gif'];
    $userId = $_SESSION['user_id'];

    $uploadPath = ROOT . 'Public/images/slide/';

    if ($error == 0) {

        if (!in_array($imageExt, $imgExt)) {
            echo "image format only " . implode(',', $imgExt) . " supported";
        } else {

            if (move_uploaded_file($tmpName, $uploadPath . $imageName)) {
                $image = $imageName;
                $query = "insert into tbl_slide (title,image_name,description)
                VALUES ('$title','$image','$description')";
                $result = mysqli_query($conn, $query);
                if ($result == true) {
                    $_SESSION['success'] = 'image was upload';
                    header('Location:admin.php?page=add_slide');
                    exit;
                }


            }
        }


    }


}


?>


<div class="container-fluid">

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>Add Slide Show</h1>
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

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image"> select image with same height and with</label>
                        <input type="file" name="upload" id="image" class="btn btn-default">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="6"></textarea>

                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary">Add Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

