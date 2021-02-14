<?php
require_once(__DIR__ . '/../../config/config.php');
$chat = new \app\controller\Chat();
$chat->startProcess($_GET["event_id"],$_GET["message_num"]);
$chat->custumHTMLGenerateChatbox($_GET["event_id"]);