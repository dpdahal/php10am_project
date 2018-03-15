<?php
// required configuration file here

require_once ('Configuration/configuration.php');
require_once ('database/connection.php');

$urlPage=isset($_GET['page']) ? $_GET['page'] : 'home';
$title=$urlPage;

$urlPage=$urlPage.'.php';
?>

<?php
// require header file
require_once (ROOT.'View/Layouts/header.php')

?>

<?php
$pagePath=ROOT.'View/Pages/'.$urlPage;

if(file_exists($pagePath) && is_file($pagePath)){
    require_once (ROOT.'View/Layouts/main_menu.php');
    require_once $pagePath;
    require_once (ROOT.'View/Layouts/aside.php');
    require_once (ROOT.'View/Layouts/main_footer.php');
}else{
    require_once (ROOT.'Helper/404/404.php');

}

?>

<?php
// require header file
require_once (ROOT.'View/Layouts/footer.php')

?>

