<?php
require_once(__DIR__ . '/../config/config.php');
$sendMessage = new \app\line\SendMessage();
$sendMessage->startProcess();
$getEvent = new \app\controller\GetEvent();
$getEvent->startProcess();
// print_r($event);
?>

<?php require('./header.php') ?>
  
<section class='event-list-section'> 

  <div class='event-list-wrapper'>
    <table>
      <tr>
        <th>日付</th>
        <th>ステータス</th>
        <th>主催者</th>
        <th>場所</th>
        <th>Lv.</th>
      </tr>
      <?php $getEvent->generateHTML(); ?>
    </table>
  </div>

</section>


<!-- <form class="" method="post">
  <div class=''>
    <textarea name="message" cols="50" rows="5"></textarea>
  </div>
  <input type="hidden" name="token" value="<?= h($_SESSION['token'] )?>">
  <button type="submit" class="button" name="message-button">メッセージを送信</button>
</form> -->

<?php require('./footer.php') ?>

<style>
.event-list-section {
  width: 90%;
  /* background: #fff; */
  background: rgba(0,0,0,0.3);
  /* box-shadow: 0 10px 25px 0 rgba(0, 0, 0, .5); */
  margin: 50px auto;
}
.event-list-wrapper {
  width: 90%;
  margin: 0px auto;
}
.event-list-wrapper a {
  text-decoration: none;
  color: #000;
}
.event-list-section table {
  width:100%;
  padding: 20px 0px;
}
.title {
  height: 100px;
  padding: 5px;
  border: 1;
}
.event-list-section tr {
  
}
.event-list-section th {
  padding: 0px;
  padding-bottom: 10px;
  text-align: left;
  border-bottom: 1px solid #fff;
}
.event-list-section td {
  display: table-cell;
  vertical-align: middle;
  height: 50px;
  
}

</style>