<?php
if(count($products)>0) {
    $items = count($products);
    $limit = 5;
    $total_pages = ceil($items/$limit);
    if (!isset ($_GET['page']) ) {  

        $page_number = 1;  

    } else {  

        $page_number = $_GET['page'];  

    }  
    $initial_page = $page_number*$limit;
    $current_item = ($page_number-1)*$limit;
    $i = 1;
    $currentpageitems = 5;
    if($initial_page>$items) {
        $currentpageitems = $items;
    } else
    {
        $currentpageitems = $initial_page;
    }
    for($page=$current_item;$page<$currentpageitems;$page++) {
        $typename = $this->productmodel->getType($products[$page]->getype_id())->gettype_name();
        $catename = $this->productmodel->getCategory($products[$page]->getplace_id())->getplace_name();
        echo    '
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox'.$i.'" name="options[]" value="'.$i.'">
                        <label for="checkbox'.$i.'"></label>
                    </span>
                </td>
                <td><img src="'.$products[$page]->getproduct_thumbnail().'"></td>
                <td>'.$products[$page]->getproduct_name().'</td>
                <td>'.$catename.'</td>
                <td>'.$typename.'</td>
                <td>'.$products[$page]->getproduct_price().'</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                            class="material-icons" data-toggle="tooltip"
                            title="Delete">&#xE872;</i></a>
                </td>
            </tr>';
            }
$first_page = "";
        if($page_number==1) {
            $first_page = "disabled";
        }
    echo '</tbody>
            </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>'.$items.'</b> entries</div>
                    <ul class="pagination">
                    <li class="page-item '.$first_page.'"><a href="manage_product.php?page='.($page_number-1).'">Previous</a></li>';
                    for($i=1;$i<=$total_pages;$i++) {
                        $current_page = "";
                        if($page_number == $i) {
                            $current_page = "active";
                        }
                        echo '<li class="page-item '.$current_page.'"><a href="manage_product.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                    }
                    $last_page = "";
                    if($page_number == $total_pages)
                    {
                        $last_page = "disabled";
                    }
                    echo '<li class="page-item '.$last_page.'"><a href="manage_product.php?page='.($page_number+1).'" class="page-link">Next</a></li>
                </ul>
            </div>
            ';
           $i++;
}