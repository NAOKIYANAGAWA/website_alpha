<?php
require_once(__DIR__ . '/../../config/config.php');
$getEvent = new \app\controller\GetEvent();
$getEvent->startProcess();
$getEvent->generateHTML($_POST['type']);
