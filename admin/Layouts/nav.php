<div class="nav">
    <div class="nav-top">
        <img src="<?=BASE_URL.'Public/images/userimages/'.$_SESSION['user_image']?>">
        <h4><?=$_SESSION['user_name']?></h4>
        <p><?=$_SESSION['user_email']?></p>
    </div>

    <div class="navlinks">
        <div class="search-box">
            <form>
                <input type="text" class="search" placeholder="Search">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li><a href="http://www.php10amnews.com/admin/dashboard"><i class="glyphicon glyphicon-cloud"> </i> Dashboard</a></li>
                    <?php if($_SESSION['user_type']==='admin') : ?>

                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  Users</a>
                    <ul>
                        <li><a href="http://www.php10amnews.com/admin/add_user"><i class="fa fa-plus"></i> Add User</a></li>
                        <li><a href="http://www.php10amnews.com/admin/users"><i class="fa fa-user"></i> Users</a></li>
                    </ul>
                </li>

                <?php endif;  ?>

                <li class="drop-down"><a href=""><i class="fa fa-image"> </i> Gallery</a>
                    <ul>
                        <li><a href="http://www.php10amnews.com/admin/add_category"><i class="fa fa-plus"></i> Add Category</a></li>
                        <li><a href="http://www.php10amnews.com/admin/add_gallery"><i class="fa fa-user"></i> Add Images</a></li>
                    </ul>
                </li>




                <li><a href="http://www.php10amnews.com/admin/add_menu"><i class="glyphicon glyphicon-book"> </i>  Menus </a></li>
                <li><a href="http://www.php10amnews.com/admin/add_slide"><i class="glyphicon glyphicon-book"> </i>  Add Silde </a></li>


                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"> </i>  Log Out</a></li>
            </ul>
        </div>
    </div>
</div><!--end of navigation-->

