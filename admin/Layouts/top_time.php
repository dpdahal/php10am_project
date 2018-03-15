<div class="top-time">
    <div class="container-fluid">
        <h1><?=date('Y')?></h1>


        <div class="user-setting">
            <div class="dropdown">
                <button id="dLabel" type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <?=$_SESSION['user_name']?>

                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a href="#!"><i class="glyphicon glyphicon-user"></i> View Profile</a></li>
                    <li><a href="#!"><i class="glyphicon glyphicon-fire"></i> Setting</a></li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
            </div>
        </div>

    </div>

</div><!--end of top-time-->