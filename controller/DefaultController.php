<?php
include_once 'model/DefaultModel.php';

class DefaultController {

    private $model;

    public function __construct() {
        $this->model = new DefaultModel();
    }

    public function invoke() {
        
        //include 'view/indexView.php';
    }
}