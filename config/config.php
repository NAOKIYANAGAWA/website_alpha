<?php

ini_set('display_errors', 1);

define('SITE_URL', 'https://' . $_SERVER['HTTP_HOST']);
define('SITE_FILE_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/website_alpha');
define('IMAGES_URL', __DIR__ . '/../images');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/autoload.php');
require_once(__DIR__ . '/../../keys/pdo.php');
require_once(__DIR__ . '/../../keys/line.php');
session_start();
