<?php
// required configuration file here

require_once('../Configuration/configuration.php');

$urlPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$title = $urlPage;

$urlPage = $urlPage . '.php';

if (!isset($_SESSION['user_name']) || $_SESSION['is_log_in'] != TRUE) {
    header('Location:login.php');
    exit;
}


?>

<?php
// require header file
require_once(ROOT . 'admin/Layouts/header.php');
require_once(ROOT . 'database/connection.php');

?>

<?php
$pagePath = ROOT . 'admin/Pages/' . $urlPage;

if (file_exists($pagePath) && is_file($pagePath)) {
    require_once(ROOT . 'admin/Layouts/top_time.php');
    require_once(ROOT . 'admin/Layouts/nav.php');

    require_once $pagePath;
} else {
    require_once(ROOT . 'Helper/404/404.php');

}

?>

<?php
// require header file
require_once(ROOT . 'admin/Layouts/footer.php')

?>

