<?php

define('HOST','127.0.0.1');
define('USER','root');
define('PASSWORD','');
define('DB','php10amproject');


$conn=mysqli_connect(HOST,USER,PASSWORD,DB);

if(!$conn){
    die(mysqli_error($conn));
}