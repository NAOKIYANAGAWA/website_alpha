<?php
namespace app\models;

class ChatSQL extends \app\models\PDO {

    protected function setMessageLogSQL() {

        $sql = 'select * from message_log';
        
        try {
        return $this->selectAll($sql);
        } catch (Exception $e) {
        echo $e->getMessage();
        return; 
        }
    }

}