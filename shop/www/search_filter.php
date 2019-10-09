<?php 

  include("include/db_connect.php"); //підключення бази даних
  include("functions/functions.php");
  session_start();
  include("include/auth_cookie.php");
  
  $cat = clear_string($link, $_GET["cat"]);  // functions/functions.php
  $type = clear_string($link, $_GET["type"]);  // functions/functions.php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Пошук по параметрам</title>

     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.cookie-1.4.1.min.js"></script>       
    <script type="text/javascript" src="trackbar/trackbar.js"></script>
	
</head>
<body>  
        
    <div id="block-body">
        
            <?php include("include/block-header.php"); ?>   
        
            <div id="block-left">
                <?php include("include/block-category.php"); ?> 
                <?php include("include/block-parameter.php"); ?>
                <?php include("include/block-news.php"); ?>
            </div>
            
        <div id="block-content">
            
            <div id="tovar">
                            
            <?php                 
                
                if ($_GET["brand"])
                {
                    $check_brand = implode(",",$_GET["brand"]);// розбирає масив
                }
                $start_price = (int)$_GET["start_price"];
                $end_price = (int)$_GET["end_price"];
                $subcategory = $_GET["subcategory"];
                
                if (!empty($check_brand) || !empty($end_price))
                {
                    if (!empty($check_brand)) $query_brand = " AND brand_id IN($check_brand)";
                    if (!empty($end_price)) $query_price = " AND price BETWEEN $start_price AND $end_price";
                }
                
                
                
                $result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' $subcategory $query_brand $query_price ORDER BY products_id DESC");                
                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result); 
                    
                    echo '<div id="block-sorting">                
                            <p id="nav-breadcrumbs"><a href="index.php">Головна сторінка</a> \ <span>Всі товари</span></p>                
                            <ul id="options-list">
                                <li>Вид: </li>
                                <li><img src="/icons/grid.png" id="style-grid"></li>
                                <li><img src="/icons/list.png" id="style-list"></li>                    
                                <li id="head-sort-list">Сортувати: </li>
                                <li><a id="select-sort">'.$sort_name.'</a>                    
                                    <ul id="sorting-list">                            
                                        <li><a href="search_filter.php?'.$catlink.'type='.$type.'&sort=price-asc">Від дешевих до дорогих</a></li>
                                        <li><a href="search_filter.php?'.$catlink.'type='.$type.'&sort=price-desc">Від дорогих до дешевих</a></li>
                                        <li><a href="search_filter.php?'.$catlink.'type='.$type.'&sort=popular">Популярні</a></li>
                                        <li><a href="search_filter.php?'.$catlink.'type='.$type.'&sort=news">Новинкі</a></li>
                                        <li><a href="search_filter.php?'.$catlink.'type='.$type.'&sort=brand">Від А до Я</a></li>
                                    </ul>                        
                                </li>
                            </ul>                
                        </div>
                        <ul id="block-tovar-grid">';
                    
                    do {                        
                        /* функція обробник зображень*/
                        if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"])) {
                            $img_path = './uploads_images/'.$row["image"];
                            $max_width = 200;
                            $max_height = 200;
                            list($width, $height) = getimagesize($img_path);
                            $ratioh = $max_height/$height;
                            $ratiow = $max_width/$width;
                            $ratio = min($ratioh, $ratiow);
                            $width = intval($ratio*$width);
                            $height = intval($ratio*$height);
                        } else {
                            $img_path = "/icons/no-image.jpg";
                            $width = 120;
                            $height = 120;
                        } echo '<li>'
                                . '<div class="block-images-grid">'
                                    . '<center><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></center>'
                                . '</div>'
                                . '<p class="style-title-grid"><a href="#">'.$row["title"].'</a></p>'
                                . '<ul class="reviews-and-counts-grid">'
                                    . '<li><img src="/icons/eye.png"><p>0</p></li>'
                                    . '<li><img src="/icons/comment.png"><p>0</p></li>'
                                    . '<li><p class="style-price-grid">'.$row["price"].' грн.</p></li>'
                                . '</ul>'
                                . '<div class="block-btn-grid">'
                                . '<center><img id="img-grid" src="/icons/hiclipart.com-id_mpucg.png"><a href="#" class="add-cart-style-grid">Додати в кошик</a></center>'
                                . '</div>'
                            . '</li>'; 
                    } while ($row = mysqli_fetch_array($result));
                
            ?>
            </ul>
            
            <ul id="block-tovar-list">            
            <?php 
                $result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' $subcategory $query_brand $query_price ORDER BY products_id DESC");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);                    
                    do {                        
                        /* функція обробник зображень*/
                        if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"])) {
                            $img_path = './uploads_images/'.$row["image"];
                            $max_width = 150;
                            $max_height = 150;
                            list($width, $height) = getimagesize($img_path);
                            $ratioh = $max_height/$height;
                            $ratiow = $max_width/$width;
                            $ratio = min($ratioh, $ratiow);
                            $width = intval($ratio*$width);
                            $height = intval($ratio*$height);
                        } else {
                            $img_path = "/icons/no-image.jpg";
                            $width = 150;
                            $height = 150;
                        } echo '<li>'
                                . '<div class="block-images-list">'
                                    . '<center><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></center>'
                                . '</div>'
                                . '<div class="block-header-list">'
                                    . '<p class="style-title-list"><a href="#">'.$row["title"].'</a></p>'

                                    . '<ul class="reviews-and-counts-list">'
                                        . '<li><img src="/icons/eye.png"><p>0</p></li>'
                                        . '<li><img src="/icons/comment.png"><p>0</p></li>'                                    
                                    . '</ul>'
                                . '</div>'
                                
                                . '<div class="style-text-list">'
                                .$row["mini_description"]
                                . '</div>'
                                . '<div class="block-footer-list">'
                                    . '<p class="style-price-list">'.$row["price"].' грн.</p>'
                                    . '<div class="block-btn-list">'
                                        . '<center><img id="img-list" src="/icons/hiclipart.com-id_mpucg.png">'
                                        . '<a href="#" class="add-cart-style-list">Додати в кошик</a></center>'
                                    . '</div>'
                                . '</div>'
                            . '</li>'; 
                    } while ($row = mysqli_fetch_array($result));
                }
                }else {
                    echo '<h3>В даній категорії поки ще товарів немає!</h3>';
                }
            ?>
            </ul>
            </div>
        </div>        
        
        <?php include("include/block-footer.php"); ?>
    </div>
        

    
    
    
    
    <script src="/js/shop-script.js"></script>
</body>
</html>