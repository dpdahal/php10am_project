<?php
$query = "SELECT tbl_gallery.*,tbl_users.username,tbl_image_categories.cat_name FROM tbl_gallery
JOIN tbl_users ON tbl_gallery.user_id=tbl_users.uid
JOIN tbl_image_categories ON tbl_gallery.cat_id=tbl_image_categories.id ORDER BY tbl_gallery.id DESC";
$result = mysqli_query($conn, $query);

?>

<style>
    .imageBox {
        width: 380px;
        height: 250px;
        background: #e3e3e3;
        float: left;
        margin: 5px;
    }

    /*.imageBox img{*/
    /*width: 350px;*/
    /*height: 220px;*/
    /*}*/
</style>


<h1><i class="fa fa-image"></i> <?= ucfirst($title) ?></h1>

<hr>

<?php foreach ($result as $gallery) : ?>
    <div class="col-md-3">
        <img src="<?= BASE_URL . 'Public/images/gallery/' . $gallery['image_name'] ?>" data-action="zoom" alt="image not found">
        <hr>
        <a href="" class="btn btn-info btn-xs">Category <?= $gallery['cat_name'] ?></a>
        <a href="" class="btn btn-success btn-xs">Posted By <?= $gallery['username'] ?></a>

    </div>

<?php endforeach; ?>

<hr>



