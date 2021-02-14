<?php
require_once(__DIR__ . '/../../config/config.php');
$sendChatMessage = new app\line\SendChatMessage();
$sendChatMessage->startProcess($_POST['event_id'],$_POST['message']);
// echo $_POST['event_id'];
// echo $_POST['message'];
