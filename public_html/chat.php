<?php
require_once(__DIR__ . '/../config/config.php');
$chat = new \app\controller\Chat();
$chat->startProcess();
?>

<?php //require('./header.php') ?>

<section class='chat'>

    <div class='chat-wrapper'>
        <?php $chat->custumHTMLGenerateChatbox(); ?>
  
    </div>

</section>


<?php require('./footer.php') ?>

<style>
body {
    width: 100%;
    margin: 0px;
    background: #55efc4;
}
.chat {
    min-width: 350px;
    max-width: 500px;
    margin: 0px auto;
    /* background: rgba(0,0,0,0.3); */
}
.chat-wrapper {
    display: block;
}
.chat-inner-left,
.chat-inner-right {
    position: relative;
    margin: 40px 0px;
}
.chat-inner-left {
    display: flex;
    justify-content: flex-start;
}
.chat-inner-right {
    display: flex;
    justify-content: flex-end;
}
.chat-inner-left img,
.chat-inner-right img {
    width:30px;
    height:30px;
    margin-right: 10px; 
    border-radius: 50%;
}
.chat-inner-left img {
    position: absolute;
    top: -10px;
    left: -35px;
}
.chat-inner-right img {
    position: absolute;
    top: -20px;
    right: -40px;
}
.chat-inner-left p,
.chat-inner-right p {
    margin: 0px;
}
.text {
    display: flex;
    align-items: center;
    min-height:15px;
    min-width: 200px;
    max-width: 300px;
    padding: 8px 16px;
    border-radius: 20px;
    background: #fff;
    font-size: 15px;
}
.date {
    color: #fff;
    font-size: 5px;
}

</style>