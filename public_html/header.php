<?php
require_once(__DIR__ . '/../config/config.php');
$logout = new \app\controller\Logout();
$logout->startProcess();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="../css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://kit.fontawesome.com/ffbdaece09.js"></script>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<header>
    <div class='menu-wrapper-left'>
        <div>
            <ul>
                <li><a href="home.php">ホーム</a></li>
                <li><a href="addEvent.php">イベント作成</a></li>
                <?= isset($_SESSION['user']) ? '<li><form method="post"><input type="submit" name="logout-button" value="LOGOUT"></form></li>' : ''?>
            </ul>
        </div>
        <div class='search-wrapper'>
            <form action="" method='post'>
                <input type="text" name='search' placeholder='検索'>
                <button type='submit'><i class="fas fa-search"></i></button>
            </form>
        </div>   
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
    min-width: 600px;
    margin: 0px;
    background: #55efc4;
}
header {
    display: flex;
    justify-content: center;
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
    /* width: 200px; */
    margin: 0px;
    /* display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px; */
}
.menu-wrapper-left a {
    color: #fff;
    text-decoration: none;
    white-space: nowrap
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
    margin: 0px 20px;
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
    margin: 0px 20px;
}

/* /////////// */
.search-wrapper {
  text-content: right;
}
.search-wrapper form {
  display: flex;
  justify-content: space-around;
  align-items: center;
  min-width: 200px;
  max-width: 400px;
  height: 30px;
  background: #fff;
  /* border: 1px solid #81878B; */
  border-radius: 20px;
  z-index: 10;
}
.search-wrapper form:hover {
  box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .1);
}
.search-wrapper input {
  width: 100%;
  height: 25px;
  padding: 0px;
  padding-left: 20px;
  background: #fff;
  color: #000;
  border: 0px;
  border-radius: 20px;
  outline: none;
  font-size: 20px;
}
.search-wrapper button {
  width: 40px;
  height: 30px;
  margin-right: 5px;
  padding: 0px;
  border: 0px;
  background: #fff;
  outline: none;
  border-radius: 50%;
}
.search-wrapper i {
  font-size: 15px;
  color: #0984e3;
  
}
.search-wrapper button:hover {
  opacity: .5;
}
</style>