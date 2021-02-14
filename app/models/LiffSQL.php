<?php
namespace app\models;

class LiffSQL extends \app\models\PDO {

    protected function setSessageLogSQL() {

        // $sql = 'select * from message_log';
        // $sql = 'SELECT message_id FROM message_log GROUP BY event_id ORDER BY posted_date ASC';
        // $sql = 'SELECT * FROM message_log ORDER BY posted_date ASC';
        //最新のメッセージのmessage_idを取得
        // $sql = 'SELECT * FROM message_log WHERE posted_date IN(SELECT MAX(posted_date) FROM message_log GROUP BY event_id)';
        // $sql = 'select
        //             *
        //         from
        //         message_log as m  
        //         inner join
        //         event as e  
        //         on m.event_id = e.id
        //         inner join
        //         line_users as l  
        //         on e.event_host = l.id WHERE posted_date IN(SELECT MAX(posted_date) FROM message_log GROUP BY event_id)';
            $sql = 'select
            *
            from
            message_log as m  
            inner join
            event as e  
            on m.event_id = e.id
            inner join
            line_users as l  
            on e.event_host = l.id WHERE posted_date IN(SELECT MAX(posted_date) FROM message_log GROUP BY event_id)';
                // echo $sql;
                // exit;
        // $sql = 'SELECT * FROM message_log as m inner join event as e on m.event_id = e.id inner join line_users as l on m.event_host = l.id';
        try {
        return $this->selectAll($sql);
        } catch (Exception $e) {
        echo $e->getMessage();
        return; 
        }
    }

    protected function setUsersSQL() {

        $sql = 'select * from line_users';
        
        try {
        return $this->selectAll($sql);
        } catch (Exception $e) {
        echo $e->getMessage();
        return; 
        }
    }


}