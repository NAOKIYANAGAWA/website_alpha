<?php
namespace app\models;

class UsersSQL extends \app\models\PDO {

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