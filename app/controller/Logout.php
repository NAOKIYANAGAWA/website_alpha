<?php
namespace app\controller; 

class Logout extends \app\controller\Controller {
    
    public function startPrecess() {
      if (isset($_POST['logout-button'])) { 
          $this->logout();
      }
    }
    
    protected function logout() {
        session_unset();
        header('Location: ' . SITE_URL);
        exit;
    }
}