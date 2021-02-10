<?php
namespace app\controller; 

Class Index extends \app\controller\Controller {

  public function launch() {
    
      header('Location: ' . SITE_URL . '/website_alpha/public_html/home.php'); 
      exit;
    
  }

}
