<?php
namespace app\controller;

class Chat extends \app\models\ChatSQL {

    private $_message_log;

    public function startProcess() {

        $this->getMessageLog();

    }

    protected function getMessageLog() {

        $this->_message_log = $this->setMessageLogSQL();
        
    }

    public function custumHTMLGenerateChatbox() {

        $masterId = 'Ud257481aa0617fed0e34605efa7ac9b0';
        $event_id = '17';

        foreach ($this->_message_log as $key) {
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
        // print_r($this->_message_log);
        // exit;
        

    }
}
