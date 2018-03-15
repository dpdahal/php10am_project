<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News : : <?=ucfirst($title)?></title>
    <link rel="stylesheet" href="<?=BASE_URL.'Public/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/admin/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/bootstrap/css/font-awesome.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/bootstrap/css/bootstrap-responsive.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/themes/css/bootstrappage.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/themes/css/flexslider.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/themes/css/main.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'Public/image_zoom/css/zoom.css'?>">
    <script src="<?=BASE_URL.'Public/themes/js/jquery-1.7.2.min.js'?>"></script>
    <script src="<?=BASE_URL.'Public/bootstrap/js/bootstrap.min.js'?>"></script>
    <script src="<?=BASE_URL.'Public/themes/js/superfish.js'?>"></script>
    <script src="<?=BASE_URL.'Public/image_zoom/js/zoom.js'?>"></script>
    <script src="<?=BASE_URL.'Public/image_zoom/js/transition.min.js'?>"></script>
    <script src="<?=BASE_URL.'Public/themes/js/jquery.scrolltotop.js'?>"></script>

</head>
<body>

<div id="top-bar" class="container">
    <div class="row">
        <div class="span4">
            <form method="POST" class="search_form">
                <input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
            </form>
        </div>
        <div class="span8">
            <div class="account pull-right">
                <ul class="user-menu">
                    <li><a href="#">My Account</a></li>
                    <li><a href="cart.html">Your Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="register.html">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="wrapper" class="container">