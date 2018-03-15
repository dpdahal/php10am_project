<?php
$sql='select * from tbl_menus';
$result=mysqli_query($conn,$sql);



?>



<section class="navbar main-menu">
    <div class="navbar-inner main-menu">
        <a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
        <nav id="menu" class="pull-right">
            <ul>
                <li><a href="http://www.php10amnews.com/">Home</a></li>

                <?php foreach ($result as $menu) : ?>
                <li><a href="http://www.php10amnews.com/<?=strtolower($menu['menu_name'])?>"><?=$menu['menu_name']?></a></li>

                <?php  endforeach; ?>

            </ul>

            
        </nav>
    </div>
</section>