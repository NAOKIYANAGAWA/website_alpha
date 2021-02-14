<?php 
namespace app\controller;

class GetEvent extends \app\models\GetEventSQL {

    private $_event;
    private $_users;

    public function startProcess() {
        //イベント情報をプロパティに格納
        $this->_event = $this->getEvent();
        //ユーザー情報をプロパティに格納
        $this->_users = $this->getUsers();
    }

    protected function getEvent() {
        //SQLをセット
        return $this->setEventSQL();
        
    }

    protected function getUsers() {
        //SQLをセット
        return $this->setUsersSQL();
        
    }

    public function getEventASC() {

        //SQLをセット
        return $this->setEventASCSQL();
        
    }

    public function generateHTML($type) {
        // echo $type;
        // exit;
        if ($type == 'null') {
            $event = $this->_event;
        } elseif ($type == 'ASC') {
            $event = $this->getEventASC();
        } elseif ($type == 'DESC') {
            $event = array_reverse($this->getEventASC());
        } 
        // echo '<pre>';
        // print_r($event);
        // echo '</pre>';
        // exit;
        //イベント一覧を生成
        //home.php
        foreach ($event as $key) {
            $status = $this->getStatus($key['event_date']);
            $users = $this->getUserName($key['event_host']);
            
            echo '<tr>';
                echo '<td>'.$key['event_date'].'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td><a href="userPage.php?id='.$key['event_host'].'">'.$users.'</a></td>';
                echo '<td><a href="eventSingle.php?event_id='.$key['id'].'&user_id='.$key['event_host'].'">'.$key['event_place'].'</a></td>';
                echo '<td>'.$key['event_level'].'</td>';
            echo '</tr>';
        }
        
    }

    public function generateHTMLSingleEvent($event_id) {
        //イベント詳細
        //eventSingle.php
        
        foreach ($this->_event as $key) {
            if ($key['id'] === $event_id) {
                $users = $this->getUserName($key['event_host']);
                echo '<tr>';
                echo '<th>日時</th>';
                echo '<td>'.$key['event_date'].'</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>主催者</th>';
                echo '<td>'.$users.'</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>場所</th>';
                echo '<td>'.$key['event_place'].'</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>金額</th>';
                echo '<td>'.$key['event_price'].'</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>レベル</th>';
                echo '<td>'.$key['event_level'].'</th>';
                echo '</tr>';
            }
        }
        
        
    }

    protected function getStatus($date) {
        //日付を変換
        $today = date("Y-m-d");
        $target_day = $date;
        if(strtotime($today) === strtotime($target_day)){
        return "本日終了";
        }else if(strtotime($today) > strtotime($target_day)){
        return "募集終了";
        }else{
        return "募集中";
        }

    }

    protected function getUserName($user_id) {
        //ユーザーIDからユーザー名を取得
        foreach ($this->_users as $key) {
            if ($key['id'] === $user_id) {
                return $key['displayName'];
            }
        }

    }

}

