<?php


$catQuery="select * from tbl_image_categories";
$catResult=mysqli_query($conn,$catQuery);


if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == 'POST') {

    $catName=$_POST['cat_name'];
   $userId=$_SESSION['user_id'];
    $imageExt = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $imageExt;
    $tmpName = $_FILES['upload']['tmp_name'];
    $size = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $imgExt = ['jpg', 'png', 'jpeg', 'gif'];
    $userId = $_SESSION['user_id'];

    $uploadPath = ROOT . 'Public/images/gallery/';

    if ($error == 0) {

        if (!in_array($imageExt, $imgExt)) {
            echo "image format only " . implode(',', $imgExt) . " supported";
        } else {

            if (move_uploaded_file($tmpName, $uploadPath . $imageName)) {
                $image = $imageName;
                $query = "insert into tbl_gallery (image_name,cat_id,user_id)
                VALUES ('$image','$catName','$userId')";
                $result = mysqli_query($conn, $query);
                if ($result == true) {
                    $_SESSION['success'] = 'image was upload';
                    header('Location:admin.php?page=add_gallery');
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
                <h1>Add Gallery Image</h1>
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
                        <label for="cat">Select Category</label>
                        <select name="cat_name" id="cat" class="form-control">
                            <?php foreach ($catResult as $cat) : ?>
                            <option value="<?=$cat['id']?>"><?=$cat['cat_name']?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image"> select image</label>
                        <input type="file" name="upload" id="image" class="btn btn-default">
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary">Add Gallery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>