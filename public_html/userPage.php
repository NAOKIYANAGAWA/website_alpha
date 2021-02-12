<?php
require_once(__DIR__ . '/../config/config.php');
$sendMessage = new \app\line\SendMessage();
$sendMessage->startProcess();
$user_page = new \app\controller\UserPage();
$user_page->startProcess();
?>

<?php require('./header.php') ?>


<?php $user_page->generateHTMLMessageForm($_GET['id']); ?>


<?php require('./footer.php') ?>