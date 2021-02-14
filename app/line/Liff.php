<?php
namespace app\line;

class Liff extends \app\models\LiffSQL {

    private $_message_log;
    private $_users;

    public function startProcess($user_id) {
        //DBからメッセージログを取得してプロパティにセット
        $this->_message_log = $this->getMessageLog();
        //DBからユーザー情報を取得してプロパティにセット
        $this->_users = $this->getUsers();

        // echo "<pre>";
        // print_r($this->_message_log); 
        // echo "</pre>";
        // // exit;
        // echo "<pre>";
        // print_r($this->_users); 
        // echo "</pre>";

        //Liffにアクセスしたユーザーのメッセージ一覧を生成
        $this->getMessageListHTML($user_id);

    }

    protected function getMessageLog() {

        return $this->setSessageLogSQL(); 

    }

    protected function getUsers() {

        return $this->setUsersSQL(); 

    }

    protected function getMessageListHTML($user_id) {

        foreach ($this->_message_log as $key) {
            foreach ($this->_users as $key1) {
                if ($key['userId'] == $key1['userId']) {
                    echo '<li><a href="chat.php?event_id='.$key['event_id'].'&user_id='.$user_id.'">'.$key['event_place'].$key['event_date'].'</a></li>';
                }
            }
        }

    }
 }
