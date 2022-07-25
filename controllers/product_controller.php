<?php
require_once($_SERVER['DOCUMENT_ROOT']."/models/product_model.php");

class ProductController {
    public $productmodel;
        public function __construct()
        {
            $this->productmodel = new ProductModel();
        }
        
        public function productInvoke() {
            $products = $this->productmodel->getUserProduct();
            if(isset($_POST['submit']) && $_POST['submit'] == 'Save') {

            } else if(isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
                $this->productmodel->deleteProduct();
            }
            include "manage_product_view.php";
        }

        public function addProduct()
        {
            if(isset($_POST['add_product']) && $_POST['add_product'] == "add") {
                $this->productmodel->addProduct();
            }
        }

        public function getProductType() {
            $productTypes = $this->productmodel->getTypes();
            foreach($productTypes as $type) {
                echo '<option value="'.$type->gettype_id().'">'.$type->gettype_name().'</option>';
            }
        }

        public function getProductCategory() {
            $productCates = $this->productmodel->getCategories();
            foreach($productCates as $cate) {
                echo '<option value="'.$cate->getplace_id().'">'.$cate->getplace_name().'</option>';
            }
        }
}