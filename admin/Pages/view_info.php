<?php

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $query = 'select * from tbl_users where uid=' . $userId;
    $result = mysqli_query($conn, $query);
    $userData = mysqli_fetch_assoc($result);

}

if (isset($_POST['yes_update'])) {
    $updateUser=$_POST['yes_update'];


}

if (isset($_POST['no_update'])) {
    header('Location:admin.php?page=users');
    exit;
}

if(isset($_POST['imageUpload']) && !empty($_FILES)){
    $imageExt = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $imageExt;
    $tmpName = $_FILES['upload']['tmp_name'];
    $size = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $imgExt = ['jpg', 'png', 'jpeg', 'gif'];
    $userId= $_SESSION['user_id'];

    $uploadPath=ROOT.'Public/images/userimages/';

    if ($error == 0) {

        if (!in_array($imageExt, $imgExt)) {
            echo "image format only " . implode(',', $imgExt) . " supported";
        } else {

            if (move_uploaded_file($tmpName, $uploadPath.$imageName)) {
                $image = $imageName;

                $query="insert into tbl_images (image_name,users_id)VALUES ('$image','$userId')";
                $result=mysqli_query($conn,$query);
                if($result==true){
                    $_SESSION['success']='image was upload';
                    header('Location:admin.php?page=users');
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
            <?php if(isset($updateUser)) : ?>
            <h1>Update User</h1>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="upload" class="btn btn-default">
                    </div>
                    <div class="form-group">
                        <button name="imageUpload" type="submit" class="btn btn-primary">Upload Image</button>
                    </div>


                </form>




            <?php else: ?>
                <div class="col-md-12">
                    <h1>View Info</h1>
                    <hr>

                    <?php
                    if (isset($_SESSION['success'])) :?>
                        <div class="alert alert-success">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);

                            ?>
                        </div>

                    <?php endif; ?>

                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td><?= $userData['name'] ?></td>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td><?= $userData['username'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $userData['email'] ?></td>
                        </tr>

                    </table>

                    <hr>

                    <h5>Do you want update profile picture</h5>
                    <hr>
                    <form action="" method="post">
                        <button name="yes_update" class="btn btn-primary">Yes</button>
                        <button name="no_update" class="btn btn-success">No</button>
                    </form>


                </div>

            <?php endif; ?>


        </div>
    </div>
</div>