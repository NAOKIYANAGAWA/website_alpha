<?php
namespace app\models;

class SendMessageSQL extends \app\models\PDO {

    protected function setMessageLogSQL($values) {

        $sql = 'INSERT INTO message_log (event_id, message_content, sender_userId, posted_date) 
                VALUES (:event_id, :message_content, :sender_userId, now())';

        $values = [
            ':event_id' => $values['event_id'],
            ':message_content' => $values['msg_content'],
            ':sender_userId' => $values['sender_id']
        ];
        
        try {
        return $this->insert($sql,$values);
        } catch (Exception $e) {
        echo $e->getMessage();
        return; 
        }
    }

}