<?php
namespace app\models;

class PostEventSQL extends \app\models\PDO {

    protected function transferValue($values) {
        // print_r($values);
        // exit;
        $sql = 'INSERT INTO event (event_date, event_place, event_level, event_price, event_host, registered_date) 
                VALUES (:event_date, :event_place, :event_level, :event_price, :event_host, now())';

        $values = [
            ':event_date' => $values['date'],
            ':event_place' => $values['place'],
            ':event_level' => $values['level'],
            ':event_price' => $values['price'],
            ':event_host' => $_SESSION['user']['id']
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