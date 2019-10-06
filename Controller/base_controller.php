<?php
  class baseController{
    private $model;
    public function __construct($model){
      $this->model = $model;

      if(isset($_GET['uinput']) && !empty($_GET['uinput'])){
        $this->updateModel($_GET['uinput']);
      }
    }

    public function updateModel($model){
      $this->model->setData($model);
    }
  }
?>