<?php 
namespace app\controller;

class PostEvent extends \app\models\PostEventSQL {

    public function startProcess() {

        if (isset($_POST['match'])) {
            $this->addEvent();
        }

    }

    protected function addEvent() {

        $this->transferValue($_POST['match']);

    }

}