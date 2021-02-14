<?php
namespace app\controller;

class Chat extends \app\models\ChatSQL {

    private $_message_log;

    public function startProcess($event_id,$message_num) {
        //DBからメッセージログを取得
        $this->getMessageLog($event_id,$message_num);

    }

    protected function getMessageLog($event_id,$message_num) {
        //プロパティにメッセージログを入れる
        $this->_message_log = $this->setMessageLogSQL($event_id,$message_num);
        
    }

    public function custumHTMLGenerateChatbox($event_id) {
   
        $masterId = $_SESSION['user']['userId'];

        foreach (array_reverse($this->_message_log) as $key) {
                if ($key['event_id'] == $event_id) {
                    if ($key['sender_userId'] !== $masterId) {
                        echo '<div class="chat-inner-left">';
                        echo '<img src="https://profile.line-scdn.net/0hG3dhio5BGBxZETS38o9nS2VUFnEuPx5UIScDeHgYRH90JVZIMiJeL34YQHsmIg8ebHdfKnkRTytz" alt="">';
                        echo '<p class="text">'.$key['message_content'].'</p>';
                        echo '<p class="date">'.$key['posted_date'].'</p>';
                        echo '</div>';
                    } else {
                        echo '<div class="chat-inner-right">';
                        echo '<p class="date">'.$key['posted_date'].'</p>';
                        echo '<p class="text">'.$key['message_content'].'</p>';
                        echo '<img src="https://profile.line-scdn.net/0hcCQyZobvPGxsABa4muVDO1BFMgEbLjokFGMmAk0IZg5FMXo_A2d7X0pVYF9EM3o4WTUjDU8DMghC" alt="">';
                        echo '</div>';
                    }
                }
        }

    }
}
