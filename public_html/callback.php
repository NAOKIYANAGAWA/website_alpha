<?php
require_once(__DIR__ . '/../config/config.php');
$callback = new \app\line\Callback();
$callback->startProcess($_GET['code']);//$_GET['code']に返されたパラメーターを渡す
?>