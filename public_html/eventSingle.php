<?php
require_once(__DIR__ . '/../config/config.php');
$getEvent = new \app\controller\GetEvent();
$getEvent->startProcess();
$sendMessage = new \app\line\SendMessage();
$sendMessage->startProcess();
$user_page = new \app\controller\UserPage();
$user_page->startProcess();
?>

<?php require('./header.php') ?>

<section class='event-single'> 

    <div class='event-single-wrapper'>
        <div class='event-single-inner'>
            <table>
                <?php $getEvent->generateHTMLSingleEvent($_GET['event_id']); ?>            
            </table>
        </div>
    </div>
    <?php $user_page->generateHTMLMessageForm($_GET['id']); ?>
</section>

<?php require('./footer.php') ?>

<style>
.event-single {
    width: 50%;
    height: 100%;
    min-width: 300px;
    margin: 50px auto;
    background: rgba(0,0,0,0.3);
}
.event-single-wrapper th {
    width: 100px;
    text-align: left;
}


</style>