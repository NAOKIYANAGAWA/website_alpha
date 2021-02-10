<?php
namespace app\models;

class PostEventSQL extends \app\models\PDO {

    protected function transferValue($values) {

        $sql = 'INSERT INTO event (event_date, event_place, event_level, registered_date) 
                VALUES (:event_date, :event_place, :event_level, now())';
                
        $values = [
            ':event_date' => $values['event_date'],
            ':event_place' => $values['event_place'],
            ':event_level' => $values['event_level']
        ];
        
        try {
            $PDO = new \app\models\PDO();
            $PDO->insert($sql,$values);
            } catch (Exception $e) {
            echo $e->getMessage();
            return; 
            }
    }

}