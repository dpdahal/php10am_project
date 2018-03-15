<?php

$query="select * from tbl_slide";
$result=mysqli_query($conn,$query);


?>

    <section  class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">

                <?php foreach ($result as $image) : ?>
                <li>
                    <img src="<?=BASE_URL.'Public/images/slide/'.$image['image_name']?>" alt="" />
                    <div class="intro">
                        <h1><?=$image['title']?></h1>
                        <p><span>Up to 50% Off</span></p>
                        <p><span><?=$image['description']?></span></p>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </section>
<section class="header_text">
    We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates.
    <br/>Don't miss to use our cheap abd best bootstrap templates.
</section>



