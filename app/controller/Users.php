<?php 
namespace app\controller;

class Users extends \app\models\UsersSQL {

    public function getUsers() {
        return $this->setUsersSQL();
    }

}

