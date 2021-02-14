<?php
require_once(__DIR__ . '/../config/config.php');
$getEvent = new \app\controller\GetEvent();
$getEvent->startProcess();
$user_page = new \app\controller\UserPage();
$user_page->startProcess();
?>

<?php require('./header.php') ?>

<section class='event-single'> 

    <div class='event-single-wrapper'>
        <div class='event-single-inner'>
            <table>
                <?php $getEvent->generateHTMLSingleEvent($_GET['event_id']); ?>            
            </table>
        </div>
    </div>

</section>

<div id='drag-and-drop' class='drag-and-drop'>
    <?php require('./chat.php') ?>
</div>

<?php require('./footer.php') ?>

<style>
.body {
    position: relative; 
}
.event-single {
    width: 50%;
    height: 100%;
    min-width: 300px;
    margin: 50px auto;
    background: rgba(0,0,0,0.3);
}
.event-single-wrapper th {
    width: 100px;
    text-align: left;
}
.drag-and-drop {
    position: absolute; 
    bottom: 0px;
    right: 0px;
    min-height: 400px;
    width: 400px;
    height: 500px;
    border-radius: 5px;
}
    


</style>

<script>

// ===============チャットボックの移動===============
(function(){

//要素の取得
var elements = document.getElementsByClassName("drag-and-drop");

//要素内のクリックされた位置を取得するグローバル（のような）変数
var x;
var y;

//マウスが要素内で押されたとき、又はタッチされたとき発火
for(var i = 0; i < elements.length; i++) {
    elements[i].addEventListener("mousedown", mdown, false);
    elements[i].addEventListener("touchstart", mdown, false);
}

//マウスが押された際の関数
function mdown(e) {

    //クラス名に .drag を追加
    this.classList.add("drag");

    //タッチデイベントとマウスのイベントの差異を吸収
    if(e.type === "mousedown") {
        var event = e;
    } else {
        var event = e.changedTouches[0];
    }

    //要素内の相対座標を取得
    x = event.pageX - this.offsetLeft;
    y = event.pageY - this.offsetTop;

    //ムーブイベントにコールバック
    document.body.addEventListener("mousemove", mmove, false);
    document.body.addEventListener("touchmove", mmove, false);
}

//マウスカーソルが動いたときに発火
function mmove(e) {

    //ドラッグしている要素を取得
    var drag = document.getElementsByClassName("drag")[0];

    //同様にマウスとタッチの差異を吸収
    if(e.type === "mousemove") {
        var event = e;
    } else {
        var event = e.changedTouches[0];
    }

    //フリックしたときに画面を動かさないようにデフォルト動作を抑制
    e.preventDefault();

    //マウスが動いた場所に要素を動かす
    drag.style.top = event.pageY - y + "px";
    drag.style.left = event.pageX - x + "px";

    //マウスボタンが離されたとき、またはカーソルが外れたとき発火
    drag.addEventListener("mouseup", mup, false);
    document.body.addEventListener("mouseleave", mup, false);
    drag.addEventListener("touchend", mup, false);
    document.body.addEventListener("touchleave", mup, false);

}

//マウスボタンが上がったら発火
function mup(e) {
    var drag = document.getElementsByClassName("drag")[0];

    //ムーブベントハンドラの消去
    document.body.removeEventListener("mousemove", mmove, false);
    drag.removeEventListener("mouseup", mup, false);
    document.body.removeEventListener("touchmove", mmove, false);
    drag.removeEventListener("touchend", mup, false);

    //クラス名 .drag も消す
    drag.classList.remove("drag");
}

})()

// ===============チャットボックスのスクロール時に送信するセクションを固定===============
var element = document.getElementById( "chat" ) ;
element.addEventListener('scroll', function(){
    var x = element.scrollLeft ;
    var y = element.scrollTop ;
    document.querySelector('.message-form-wrapper').style.bottom = -y+'px'
    console.log("横スクロール：" + x);
    console.log("縦スクロール：" + y);
});

</script>