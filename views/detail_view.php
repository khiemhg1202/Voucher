<?php
    $p_id           =$product->getproduct_id();
    $p_name         =$product->getproduct_name();
    $p_price        =$product->getproduct_price();
    $p_thumbnail    =$product->getproduct_thumbnail();
  
    echo'
    <div class="product-left-div col-12 col-lg-7">

        <div id="products-preview-carousel" >
            <div class="carousel-inner">
        ';
    
            for($i = 0; $i<count($arr_preview)-1;$i++){
                if($i==0)
                {
                    echo'
                        <div class="carousel-item active">
                            <img class="product-preview-img" src="'.$arr_preview[$i].'">
                        </div>
                    ';
                }
                else{
                    echo'
                    <div class="carousel-item">
                        <img class="product-preview-img" src="'.$arr_preview[$i].'">
                    </div>
                '; 
                }
            }
            echo
    ';
?>';