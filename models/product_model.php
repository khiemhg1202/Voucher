<?php
require_once("product_place.php");
require_once("product_type.php");
require_once("product.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/db_module.php");

class ProductModel
{
    public function getUserProduct()
    {
        $user_id = $_SESSION['user_id'];
        $data = array();
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraveDL($link, "SELECT * FROM `tbl_product` WHERE user_id = '$user_id'");
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new Product($row['product_id'], $row['product_name'], $row['product_price'], $row['place_id'], $row['type_id'], $row['product_thumbnail'], $row['user_id'], $row['product_details'], $row['product_instruction'],);
            array_push($data, $product);
        }
        giaiPhongBoNho($link, $result);
        return $data;
    } 
    public function addProduct()
    {
        $product_id = null;
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $place_id = $_POST['place_id'];
        $type_id = $_POST['type_id'];
        $product_thumbnail = $_POST['product_thumbnail'];
        $user_id = $_SESSION['user_id'];
        $product_details = $_POST['product_details'];
        $product_instruction = $_POST['product_instruction'];

        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraveDL($link, "INSERT INTO tbl_product VALUES ('$product_id', '$product_name','$product_price','$place_id','$type_id','$product_thumbnail','$user_id','$product_details','$product_instruction')");
    }

    public function getTypes()
    {
        $data = array();
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraveDL($link, "SELECT * FROM tbl_product_type");
        while ($row = mysqli_fetch_assoc($result)) {
            $productType = new Product_type($row['type_id'], $row['type_name'], $row['type_ename']);
            array_push($data, $productType);
        }
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategories()
    {
        $data = array();
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraveDL($link, "SELECT * FROM tbl_product_place");
        while ($row = mysqli_fetch_assoc($result)) {
            $productCate = new Product_place($row['category_id'], $row['category_name'], $row['category_ename']);
            array_push($data, $productCate);
        }
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getType($type_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraveDL($link, "SELECT * FROM tbl_product_type WHERE type_id = '.$type_id.' LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        $productType = new Product_type($row['type_id'], $row['type_name'], $row['type_ename']);
        giaiPhongBoNho($link, $result);
        return $productType;
    }

    public function getCategory($category_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraveDL($link, "SELECT * FROM tbl_product_place WHERE category_id = '.$category_id.' LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        $productCate = new Product_place($row['category_id'], $row['category_name'], $row['category_ename']);
        giaiPhongBoNho($link, $result);
        return $productCate;
    }

    public function deleteProduct($product_id) {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraveDL($link, "DELETE FROM tbl_product WHERE product_id = '.$product_id.'");
        giaiPhongBoNho($link, $result);
    }
}