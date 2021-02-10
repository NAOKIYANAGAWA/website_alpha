<?php
require_once(__DIR__ . '/../config/config.php');
$sendMessage = new \app\line\SendMessage();
$sendMessage->startProcess();
?>

<?php require('./header.php') ?>

<section class='serch-section'>

    <div class='search-wrapper-right'>
      <form action="" method='post'>
        <input type="text" name='search' placeholder='キーワードを入力'>
        <button type='submit'><i class="fas fa-search"></i></button>
      </form>
    </div>

</section>
  
<section class='event-list-section'> 

<table>
  <tr class='title'>
    <th>日付</th>
    <th>ステータス</th>
    <th>主催者</th>
    <th>場所</th>
    <th>Lv.</th>
  </tr>
  <tr>
    <td>2020/01/18 20:00</td>
    <td>募集中</td>
    <td>NAOKI</td>
    <td>府中市 郷土の森公園</td>
    <td>15Lv.</td>
  </tr>
  <tr>
    <td>2020/01/18 20:00</td>
    <td>募集中</td>
    <td>NAOKI</td>
    <td>府中市 郷土の森公園</td>
    <td>15Lv.</td>
  </tr>
</table>

</section>


<form class="" method="post">
  <div class=''>
    <textarea name="message" cols="50" rows="5"></textarea>
  </div>
  <input type="hidden" name="token" value="<?= h($_SESSION['token'] )?>">
  <button type="submit" class="button" name="message-button">メッセージを送信</button>
</form>

<?php require('./footer.php') ?>

<style>
.serch-section {
  display: flex;
  justify-content: space-around;
  align-items: center;
  height: 100px;
  background: #fff;
  box-shadow: 0 10px 25px 0 rgba(0, 0, 0, .5);
  margin: 20px;
}
.search-wrapper {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}
.search-wrapper-right {
  text-content: right;
}
.search-wrapper-right form {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 500px;
  height: 30px;
  border: 1px solid #81878B;
  border-radius: 20px;
  z-index: 10;
}
.search-wrapper-right form:hover {
  box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .1);
}
.search-wrapper-right input {
  width: 400px;
  height: 25px;
  margin-left: 20px;
  border: 0px;
  border-radius: 20px;
  outline: none;
  font-size: 20px;
}
.search-wrapper-right button {
  width: 40px;
  height: 30px;
  margin-right: 5px;
  padding: 0px;
  border: 0px;
  background: #fff;
  border-left: 1px solid #81878B;
  outline: none;
}
.search-wrapper-right i {
  font-size: 15px;
  color: #0984e3;
}
.search-wrapper-right button:hover {
  opacity: .5;
}
/* //////////// */
.event-list-section {
  background: #fff;
  box-shadow: 0 10px 25px 0 rgba(0, 0, 0, .5);
  margin: 20px;
}
.event-list-section table {
  width:100%;
  
}
.title {
  height: 100px;
  padding: 5px;
  border: 1;
}
.event-list-section tr {

}
.event-list-section th {
  
  text-align: left;
}
.event-list-section td {
  display: table-cell;
  vertical-align: middle;
  height: 50px;
}

</style>