<?php
require_once(__DIR__ . '/../config/config.php');
$logout = new \app\controller\Logout();
$logout->startPrecess();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="../css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://kit.fontawesome.com/ffbdaece09.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<header>
    <div class='menu-wrapper-left'>
        <ul>
            <li><a href="home.php">ホーム</a></li>
            <li><a href="">相手を探す</a></li>
            <?= isset($_SESSION['user']) ? '<li><form method="post"><input type="submit" name="logout-button" value="LOGOUT"></form></li>' : ''?>
        </ul>   
    </div>
    <div class='menu-wrapper-right'>
        <?php
            if (isset($_SESSION['user'])) {
                echo '<a href="mypage.php"><img src="'.$_SESSION['user']['pictureUrl'].'" alt="'.$_SESSION['user']['displayName'].'"></a>';
            } else {
                echo '<form action="login.php" method="post"><input type="submit" name="login-button" value="LOGIN"></form>';
            }
        
        ?>
    </div>
</header>

<style>
body {
    margin: 0px;
    background: #55efc4;
}
header {
    display: flex;
    flex-wrap: nowrap;
    height: 50px;
    margin: 0px;
    padding: 10px;
    background: #2d3436;
}
header ul {
    display: flex;

}
header li {
    margin-right: 20px;
    list-style: none;
}
.menu-wrapper-left {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-grow: 2;
    width: 200px;
    margin: 0px;
    /* display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px; */
}
.menu-wrapper-left a {
    color: #fff;
    text-decoration: none;
}
.menu-wrapper-left input {
    padding: 5px;
    background: #2d3436;
    border: 1px solid #fff;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
.menu-wrapper-left input:hover {
    opacity: .5;
}
.menu-wrapper-right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-grow: 1;
}
.menu-wrapper-right img {
    width: 50px;
	border-radius: 50%;
}
.menu-wrapper-left p {

}
.menu-wrapper-right form {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
.menu-wrapper-right input {
    outline: none;
    margin-right: 20px;
    padding: 5px;
    background: #2d3436;
    border: 1px solid #fff;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
.menu-wrapper-right input:hover {
    opacity: 0.5;
}
.menu-wrapper-right a {
    margin-right: 20px;
}
}
</style>