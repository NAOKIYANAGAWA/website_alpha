<?php
namespace app\controller; 

Class Index extends \app\controller\Controller {

  public function launch() {

    if ($this->isLoggedIn()) {
        header('Location: ' . SITE_URL . '/website_alpha/public_html/home.php'); 
        exit;
      } else {
        header('Location: ' . SITE_URL . '/website_alpha/public_html/login.php'); 
        exit;
      }
        
    
  }

}
