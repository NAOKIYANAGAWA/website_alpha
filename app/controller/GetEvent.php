<?php 
namespace app\controller;

class GetEvent extends \app\models\GetEventSQL {

    private $_event;
    private $_users;

    public function startProcess() {

        $this->_event = $this->getEvent();
        $this->_users = $this->getUsers();
        // print_r($this->_event);
    }

    protected function getEvent() {

        return $this->setEventSQL();
        
    }

    protected function getUsers() {

        return $this->setUsersSQL();
        
    }

    public function generateHTML() {

        foreach ($this->_event as $key) {
            $status = $this->getStatus($key['event_date']);
            $users = $this->getUserName($key['event_host']);
            
            echo '<tr>';
                echo '<td>'.$key['event_date'].'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td><a href="userPage.php?id='.$key['event_host'].'">'.$users.'</a></td>';
                echo '<td><a href="eventSingle.php?event_id='.$key['id'].'&id='.$key['event_host'].'">'.$key['event_place'].'</a></td>';
                echo '<td>'.$key['event_level'].'</td>';
            echo '</tr>';
        }
        
    }

    public function generateHTMLSingleEvent($event_id) {

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

        foreach ($this->_users as $key) {
            if ($key['id'] === $user_id) {
                return $key['displayName'];
            }
        }

    }

}

