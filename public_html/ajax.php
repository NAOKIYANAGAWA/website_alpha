<?php
require_once(__DIR__ . '/../config/config.php');
if (isset($_POST['user_id'])) {
    // header('Location: ' . SITE_URL . '/website_alpha/public_html/home.php');
    // exit;
    // echo $_POST['name1'];
    // echo $_POST['user_id'];
    // exit;
    $liff = new \app\line\Liff();
    echo $liff->startProcess($_POST['user_id']);
}
// $liff = new \app\line\Liff();
// $liff->startProcess($_POST['user_id']);

