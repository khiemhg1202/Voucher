<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/models/index_model.php");
    class IndexController{
        public $model;
        public function __construct()
        {
            $this->model = new IndexModel();
        }
        public function product_invoke(){

            $productlist=$this->model->getProductList();
            include "product_hightlighted.php";   
        }

        
    }
?>
