<?php
    class Review{
        private $product_id;
        private $review_content;
       

        public function getproduct_id(){return $this->product_id; }
        public function getreview_content(){return $this->review_content; }
      
        public function __construct($product_id, $review_content){
            $this->product_id = $product_id;
            $this->review_content=$review_content;
        }   
    }
?>