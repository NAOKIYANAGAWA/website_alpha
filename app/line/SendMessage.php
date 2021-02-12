<?php
namespace app\line;

class SendMessage extends \app\models\SendMessageSQL {

    public function startProcess() {

        if(isset($_POST['message-button']) ) {

            $this->validation();
            
            $message = $_POST['message'];
            $to = $_POST['user'];
        
            //メッセージを送る
            $text = [
                [
                'type' => 'text',
                'text' => $message
                ],
            ];
        
            $message = [
                'to' => $to,
                'messages' => $text,
                'client_id'     => MSG_API_CLIENT_ID,
                'client_secret' => MSG_API_CLIENT_SECRET
            ];
        
            $message = json_encode($message);
            //ccurl_init($url);
            // セッション初期化。urlも設定
            $ch = curl_init();
            //curl_setopt();
            // オプション設定
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . MSG_API_ACCESS_TOKEN, 'Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/bot/message/push');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_exec();
            // 実行
            $message = curl_exec($ch);
            //エラーチェック
            if (curl_errno($ch)) {

                $error = curl_error($ch);
          
                echo $error;
                exit;
                
             }
             
             $msg_info = [
                 'event_id' => $_GET['event_id'],
                 'sender_id' => $_SESSION['user']['userId'],
                 'msg_content' => $_POST['message']
             ];
             
             $this->setMessageLogSQL($msg_info);

             //curl_close();
            // セッション終了
            curl_close($ch);


        
        }

    }

    private function validation() {

        if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
            echo "
            <script>
            confirm('無効なトークンです');
            </script>";
            header('Location: ' . SITE_URL);
            exit;
        }

    }
}

