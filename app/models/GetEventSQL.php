<?php
namespace app\models;

class GetEventSQL extends \app\models\PDO {

    protected function setEventSQL() {

        $sql = 'select * from event';
        
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