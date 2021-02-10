<?php 
namespace app\line;

class Callback {

  public function startProcess($code) {

    $token = $this->getAccessToken($code);

    $userInfo = $this->getUserInfo($token);

    $registerUser = new \app\line\RegisterUser();

    $registerUser->registerUser($userInfo);
    // print_r($userInfo);
  }

  private function getAccessToken($code) {
    //アクセストークンを取得
    $postData = array(
        'grant_type'    => 'authorization_code',
        'code'          => $code,
        'redirect_uri'  => 'https://naokiyanagawa.cf/website_alpha/public_html/callback.php',
        'client_id'     => '1655650638',
        'client_secret' => '5b4bf1135de9aa756c6b7d9f9ca97fd3',
    );
      
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/oauth2/v2.1/token');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response);
    return $accessToken = $json->access_token; //アクセストークンを取得
  }
  
  private function getUserInfo($token) {
    //アクセストークンを基にユーザ情報を取得
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/profile');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $json = json_decode($response);
    return $userInfo = json_decode(json_encode($json), true); //ログインユーザ情報を取得する
  }

}