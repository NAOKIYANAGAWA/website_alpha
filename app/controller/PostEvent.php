<?php 
namespace app\controller;

class PostEvent extends \app\models\PostEventSQL {

    public function startProccess() {

        if (isset($_POST['match'])) {
            // print_r($_POST['match']);
            // exit;
            $this->addEvent();
        }

        // $this->validation();


    }

    protected function addEvent() {

        $this->transferValue([
            'event_date' => $_POST['match']['date'],
            'event_place' => $_POST['match']['place'],
            'event_level' => $_POST['match']['level']
        ]);

    }

}