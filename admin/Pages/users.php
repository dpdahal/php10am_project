<?php
$query = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.users_id ORDER BY uid DESC LIMIT 5";
$result = mysqli_query($conn, $query);

$numberOfRows = mysqli_num_rows($result);


if (isset($_POST['user'])) {
    $userId = $_POST['user_id'];
    $user_typ = 'admin';
    $query = "update tbl_users set user_type='$user_typ'  where uid='$userId' ";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'user was admin';
        header('Location:admin.php?page=users');
        exit;
    }


}

if (isset($_POST['admin'])) {
    $userId = $_POST['user_id'];
    $user_typ = 'user';
    $query = "update tbl_users set user_type='$user_typ'  where uid='$userId' ";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'user was user';
        header('Location:admin.php?page=users');
        exit;


    }

}


if (isset($_POST['deleteUser'])) {
    $userId = $_POST['de_user_id'];
    $sql = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
    LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.users_id  WHERE tbl_users.uid =" . $userId;
    $delete_result = mysqli_query($conn, $sql);
    $deleteUserData = mysqli_fetch_assoc($delete_result);
    $userImage = $deleteUserData['image_name'];
    $deletePath = ROOT . 'Public/images/userimages/' . $userImage;
    if (file_exists($deletePath) && is_file($deletePath)) {
        unlink($deletePath);
    }

    $queries = "delete from tbl_users where uid=" . $userId;

    $res = mysqli_query($conn, $queries);

    if ($res == true) {
        $_SESSION['success'] = 'user was deleted';
        header('Location:admin.php?page=users');
        exit;
    } else {
        $_SESSION['errors'] = 'user was not deleted';
        header('Location:admin.php?page=users');
        exit;

    }

}

if (isset($_POST['editUser'])) {
    $editUsers = $_POST['editUser'];
    $userId = $_POST['de_user_id'];
    $sql = "SELECT tbl_users.*,tbl_images.image_name FROM tbl_users
    LEFT JOIN tbl_images ON tbl_users.uid=tbl_images.users_id  WHERE tbl_users.uid =" . $userId;
    $edit_result = mysqli_query($conn, $sql);
    $editUserData = mysqli_fetch_assoc($edit_result);


}


if (isset($_POST['updateUser'])) {
    $userId = $_POST['update_user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $query="update tbl_users set name='$name',username='$username',email='$email' where uid=".$userId;
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'user was updated';
        header('Location:admin.php?page=users');
        exit;
    } else {
        $_SESSION['error'] = 'there was a problems';
    }


}


?>


<div class="container-fluid">

    <div class="content">
        <div class="row">
            <?php if (isset($_POST['editUser'])) : ?>
            <h1><i class="glyphicon glyphicon-edit"></i>Edit Users</h1>
        <hr>
            <div class="col-md-8">
                <form action="" method="post">
                    <input type="hidden" name="update_user_id" value="<?= $editUserData['uid'] ?>">


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= $editUserData['name'] ?>"
                               class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" value="<?= $editUserData['username'] ?>"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?= $editUserData['email'] ?>"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <button name="updateUser" class="btn btn-primary">Edit Record</button>
                    </div>

                </form>

            </div>
            <div class="col-md-4">
                <img src="<?= BASE_URL.'Public/images/userimages/'.$editUserData['image_name'] ?>" alt="image not found"
                     class="img-responsive thumbnail" style="margin-top: 20px">
            </div>


            <?php else: ?>
            <div class="col-md-12">
                <h1>View Users</h1>
                <hr>
                <?php
                if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);

                    ?>
                </div>
                <?php endif; ?>

                <table class="table table-hover">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php if ($numberOfRows > 0) : ?>
                            <?php foreach ($result as $key => $user) : ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['uid'] ?>">
                                <?php if ($user['user_type'] === 'admin'): ?>
                                    <button name="admin" onclick="return confirm('are you sure update')"
                                            class="btn btn-primary btn-xs">Admin
                                    </button>
                                <?php else: ?>
                                    <button name="user" onclick="return confirm('are you sure update')"
                                            class="btn btn-danger btn-xs">User
                                    </button>

                                <?php endif ?>
                            </form>
                        </td>
                        <td>
                            <img src="<?= BASE_URL . 'Public/images/userimages/' . $user['image_name'] ?>"
                                 alt="image not found " width="30">
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="de_user_id" value="<?= $user['uid'] ?>">
                                <button name="editUser" class="btn btn-primary btn-xs">Edit</button>
                                <button name="deleteUser" class="btn btn-danger btn-xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="7" align="center"><a
                                        href="http://www.php10amnews.com/admin/admin.php?page=add_user"
                                        class="btn btn-warning btn btn-xs">Data not found</a></td>
                        </tr>

                    <?php endif; ?>
                </table>


            </div>
            <?php endif; ?>

        </div>

    </div>
</div>