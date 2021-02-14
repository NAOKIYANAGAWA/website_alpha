<?php
require_once(__DIR__ . '/../config/config.php');
$sendMessage = new \app\line\SendMessage();
$sendMessage->startProcess();
// $chat = new \app\controller\Chat();
// $chat->startProcess();
// echo $_GET['user_id'];
?>
<script>
//
function getMessage(countA) {
    var xhr = new XMLHttpRequest();
    const message_num = countA;
    xhr.open('GET', 'https://naokiyanagawa.cf/website_alpha/public_html/ajax_request/chat.php?event_id=<?=$_GET["event_id"]?>&message_num='+message_num);
    xhr.send();
    
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('chat-wrapper').innerHTML = xhr.responseText;
        }
    }
}

</script>

<section id='chat' class='chat'>

    <div id='chat-wrapper' class='chat-wrapper'>
        
    </div>
    <div id='test' class='message-form-wrapper'>
        <form>
            <input id='chat_message' type="text" name='message' placeholder='Aa' value=''>
            <input type="hidden" name="user" value="<?= isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?>">
            <input type="hidden" name="token" value="<?= h($_SESSION['token']) ?>">
            <button id="submit-message-button" type='button' onclick="sendMessage()"><p id="text"><i class="fas fa-arrow-circle-right"></i></p></button>
        </form>
    </div>
</section>

<?php require('./footer.php') ?>

<style>
body {
    width: 100%;
    margin: 0px;
    background: #55efc4;
}
.chat {
    position:relative;
    height: 100%;
    overflow:scroll;
    background: #fff;
}
.chat-wrapper {
    /* position: relative; */
    display: block;
    padding-top: 20px;
    background: #fff;
}
.chat-inner-left,
.chat-inner-right {
    position: relative;
    margin-bottom: 40px;
}
.chat-inner-left {
    display: flex;
    justify-content: flex-start;
}
.chat-inner-right {
    display: flex;
    justify-content: flex-end;
}
.chat-inner-left img,
.chat-inner-right img {
    width:30px;
    height:30px;
    margin-right: 10px; 
    border-radius: 50%;
}
.chat-inner-left img {
    position: absolute;
    top: -10px;
    left: -35px;
}
.chat-inner-right img {
    position: absolute;
    top: -20px;
    right: -40px;
}
.chat-inner-left p,
.chat-inner-right p {
    margin: 0px;
}
.text {
    display: flex;
    align-items: flex-end;
    min-height:15px;
    min-width: 200px;
    max-width: 300px;
    padding: 8px 16px;
    border-radius: 20px;
    /* background: #fff; */
    background: rgba(0,0,0,0.3);
    font-size: 15px;
}
.date {
    display: flex;
    align-items: flex-end;
    color: #000;
    font-size: 5px;
}
.message-form-wrapper {
    position:absolute;
    bottom:0px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0,0,0,0.7);
    width: 100%;
    height: 50px;
    z-index: 1;
}
.message-form-wrapper form {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: 0px 20px;
}
.message-form-wrapper input {
    width: 100%;
    height: 29px;
    padding: 5px 20px;
    border-radius: 20px;
    outline: none;
    border: 0px;
    font-size: 20px;
}
.message-form-wrapper button {
    background: rgba(0,0,0,0);
    border: 0px;
}
.message-form-wrapper i {
    margin-left: 20px;
    background: none;
    border: 0px;
    font-size: 40px;
    color: #74b9ff;
    outline: none;
}
.message-form-wrapper p {
    margin: 0px;
}
.message-form-wrapper i:hover {
    opacity: .8;
}
@media screen and (min-width: 480px) {
    .chat {
        min-width: 350px;
        max-width: 500px;
        margin: 0px auto;
    }
}
@media screen and (max-width: 479px) { 
    body {
        min-width: 320px;
        max-width: 479px;
        margin: 0px;
        background: #55efc4;
    }
    .chat {
        margin: 0px;
    }
    .chat-wrapper {
        margin: 0px 50px;
    }   
    .chat-inner-left,
    .chat-inner-right {
        width: 100%;
        margin: 40px 0px;
    }
    .text {
        max-width: 200px;
    }
 }
</style>


<script>
//ページが読み込み完了したら実行
window.onload = function() {
    //チャットのメッセージを取得
    getMessage(10);

}
//チャットをロード
function getMessage(countA) {
    // document.getElementById("text-button").onclick = function() {
        var xhr = new XMLHttpRequest();
        const message_num = countA;
        xhr.open('GET', 'https://naokiyanagawa.cf/website_alpha/public_html/ajax_request/requestGetChatMessage.php?event_id=<?=$_GET["event_id"]?>&message_num='+message_num);
        xhr.send();
        
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('chat-wrapper').innerHTML = xhr.responseText;
            }
        }
    // };
}

//
window.addEventListener('DOMContentLoaded', function(){

// テキストエリアのHTML要素を取得
var chat_content = document.getElementById("chat_message");

// イベント「change」を登録
chat_content.addEventListener("change",function(){
    chat_content.defaultValue = this.value;
    console.log(this.value);
});

// イベント「input」を登録
chat_content.addEventListener("input",function(){
    chat_content.defaultValue = "this";
    console.log(this.value);
});

});

//メッセージ送信
function sendMessage() {
    var event_id = <?=$_GET['event_id']?>;
    var target = document.getElementById("chat_message");
    var message = target.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'https://naokiyanagawa.cf/website_alpha/public_html/ajax_request/requestSendChatMessage.php');
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
    xhr.send('event_id='+event_id+'&message='+message);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('test').innerHTML = xhr.responseText;
        }
    }
}

</script>