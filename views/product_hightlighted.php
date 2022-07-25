<!DOCTYPE html> 
<html>
    <body>
        <?php
            $num=0;
            foreach($productlist as $product){
                $num++;
                if($num>=8){
                    break;
                }
                else{
                    echo 
                                '<div class="card pt-card col-6 col-lg-3 float-left border-0">
                                    <img src="'.$product->getproduct_thumbnail().'" class="card-img-top img-product-thumbnail" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$product->getproduct_name().'</h5>
                                        <p class="card-text">'.number_format($product->getproduct_price(), 0, ",", ".").' đ</p>
                                        <a href="details.php?productid='.$product->getproduct_id().'" class="stretched-link"></a>
                                    </div>
                                </div>
                            ';
                    }
            }
        ?>
    </body> 
</html>
