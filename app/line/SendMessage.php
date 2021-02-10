<?php
namespace app\line;

class SendMessage {

    public function startProcess() {

        if(isset($_POST['message-button']) ) {

            $this->validation();
            
            $message = $_POST['message'];
        
            //メッセージを送る
            $text = [
                [
                'type' => 'text',
                'text' => $message
                ],
            ];
        
            $message = [
                'to' => 'U7ff22c01f261abee9debade7af365259',
                'messages' => $text,
                'client_id'     => MSG_API_CLIENT_ID,
                'client_secret' => MSG_API_CLIENT_SECRET
            ];
        
            $message = json_encode($message);
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . MSG_API_ACCESS_TOKEN, 'Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/bot/message/push');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $message = curl_exec($ch);
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

