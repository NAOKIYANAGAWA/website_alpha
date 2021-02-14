<?php
require_once(__DIR__ . '/../config/config.php');
$getEvent = new \app\controller\GetEvent();
$getEvent->startProcess();
// print_r($event);
?>

<?php require('./header.php') ?>
  
<section class='event-list-section'> 

  <div class='event-list-wrapper'>
    <table>
      <tr>
        <th>日付
          <button　type='button' onclick="getEvent('ASC')">昇順/</button>
          <button　type='button' onclick="getEvent('DESC')">降順</button>
        </th>
        <th>ステータス</th>
        <th>主催者</th>
        <th>場所</th>
        <th>Lv.</th>
      </tr>
    </table>
  </div>
  <div class='event-content-wrapper'>
    <table id='event-list-content-table'>
     
    </table>
  </div>
</section>

<?php require('./footer.php') ?>

<style>
.event-list-section {
  width: 90%;
  /* background: #fff; */
  background: rgba(0,0,0,0.3);
  /* box-shadow: 0 10px 25px 0 rgba(0, 0, 0, .5); */
  margin: 50px auto;
}
.event-list-wrapper,
.event-content-wrapper {
  width: 90%;
  margin: 0px auto;
}
.event-list-wrapper button {
  cursor: pointer;
}
.event-list-wrapper a,
.event-content-wrapper a {
  text-decoration: none;
  color: #000;
}
.event-list-section table,
.event-content-wrapper table {
  width:100%;
  padding: 20px 0px;
}
.title {
  height: 100px;
  padding: 5px;
  border: 1;
}
.event-list-section tr,
.event-content-wrapper tr {
  
}
.event-list-section th,
.event-content-wrapper th  {
  padding: 0px;
  padding-bottom: 10px;
  text-align: left;
  border-bottom: 1px solid #fff;
}
.event-list-section td,
.event-content-wrapper td {
  display: table-cell;
  vertical-align: middle;
  height: 50px;
  
}

</style>

<script>
//ページが読み込み完了したら実行
window.onload = function() {
    //イベント一覧を取得
    getEvent(null);

}
function getEvent(ASC) {
    var post = 'type='+ASC;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'https://naokiyanagawa.cf/website_alpha/public_html/ajax_request/event.php');
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
    xhr.send(post);
    
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('event-list-content-table').innerHTML = xhr.responseText;
        }
    }
}
</script>