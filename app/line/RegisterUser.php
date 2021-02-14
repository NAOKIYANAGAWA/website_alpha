<?php
namespace app\line;

class RegisterUser extends \app\models\PDO {

    public function registerUser($userInfo) {
            
        // 新規ユーザーか確認
        if ($result = $this->isUser($userInfo)) { //既存ユーザーならhomeへ
            $_SESSION['user'] = $userInfo;
            $_SESSION['user']['id'] = $result[0]['id'];
            header('Location: ' . SITE_URL);
            exit;
        } else { //新規ユーザーならDBへ登録
            $sql = 'insert into line_users (userId, displayName, pictureUrl) values (:userId, :displayName, :pictureUrl)';
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
            ':userId' => $userInfo['userId'],
            ':displayName' => $userInfo['displayName'],
            ':pictureUrl' => $userInfo['pictureUrl']
            ]);
            $_SESSION['user'] = $userInfo;
            header('Location: ' . SITE_URL);
            exit;
        }
        
    }

    public function getUser($userInfo) {

        $stmt = $this->db->prepare("select * from line_users");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
    
    private function isUser($userInfo) {

        $stmt = $this->db->prepare("select * from line_users where userId = :userId");
        $stmt->execute([
            ':userId' => $userInfo['userId']
            ]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        if (count($result) > 0) {
            return $result;
        } 

    }

}