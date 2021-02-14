<?php
namespace app\models;

class ChatSQL extends \app\models\PDO {

    protected function setMessageLogSQL($event_id,$message_num) {
        $sql = 'select * from message_log WHERE event_id = '.$event_id.' ORDER BY posted_date DESC LIMIT '.$message_num;
        
        try {
        return $this->selectAll($sql);
        } catch (Exception $e) {
        echo $e->getMessage();
        return; 
        }
    }

}