<?php 
namespace app\controller;

class UserPage extends \app\controller\Users {

    protected $_users;

    public function startProcess() {
        $this->_users = $this->getUsers();
    }
    
    public function generateHTMLMessageForm($user_id) {
        // print_r($this->_users);
        // exit;
        foreach ($this->_users as $key) {
            if ($key['id'] === $user_id) {
                echo '<form class="" method="post">';
                echo '<div class="">';
                echo '<textarea name="message" cols="50" rows="5"></textarea>';
                echo '</div>';
                echo '<input type="hidden" name="user" value="'.$key['userId'].'">';
                echo '<input type="hidden" name="token" value="'.h($_SESSION['token']).'">';
                echo '<button type="submit" class="button" name="message-button">メッセージを送信</button>';
                echo '</form>';
            }
        }
        
    }

}