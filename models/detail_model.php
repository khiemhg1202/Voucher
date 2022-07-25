<?php
    require_once("specs.php");
    require_once("review.php");
    require_once("product.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

    class DetailModel{
        public function getProduct($id){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where product_id=$id");
            while($rows = mysqli_fetch_assoc($result)){
                $product = new Product($rows["product_id"], $rows["product_name"], 
                $rows["product_price"], $rows["place_id"], $rows["type_id"],
                $rows["product_thumbnail"], $rows["user_id"] , $rows["product_details"] , $rows["product_instruction"]); 
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $product;
        }
    } 
?>