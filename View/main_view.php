<?php
  class mainView{
    private $model;
    public function __construct($model){
      $this->model = $model;
      $model->getData();
    }

    public function output(){
      $html = $this->model->getData(). '</br><a href="index.php?uinput=This is new data">Update</a>';

              return $html;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    
</body>
</html>