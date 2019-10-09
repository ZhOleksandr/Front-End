<?php 

  include("include/db_connect.php"); //підключення бази даних
  include("functions/functions.php");
  session_start();
  include("include/auth_cookie.php");
  
  $cat = clear_string($link, $_GET["cat"]);  // functions/functions.php
  $type = clear_string($link, $_GET["type"]);  // functions/functions.php
  //echo $cat;
  //$cat_name = mysqli_query($link, "SELECT * FROM table_products INNER JOIN subcategory ON table_products.subcategory_id = subcategory.id");
  //$my_id_array=mysqli_fetch_assoc($cat_name);
  //$my_id=$my_id_array['title'];
  //echo $my_id;
  
  $sorting = $_GET["sort"];
  
  switch ($sorting) {
      case 'price-asc';
          $sorting = 'price ASC';
          $sort_name = 'Від дешевих до дорогих';
          break;
      case 'price-desc';
          $sorting = 'price DESC';
          $sort_name = 'Від дорогих до дешевих';
          break;
      case 'popular';
          $sorting = 'count DESC';
          $sort_name = 'Популярні';
          break;
      case 'news';
          $sorting = 'datatime DESC';
          $sort_name = 'Новинки';
          break;
      case 'brand';
          $sorting = 'brand';
          $sort_name = 'Від А до Я';
          break;
      
      default :
          $sorting = 'products_id DESC';
          $sort_name = 'Без сортування';
          break;
  }
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <title>Канцелярія</title>

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
                if (!empty($cat) && !empty($type))
                {
                    $querycat = "AND subcategory='$cat' AND category='$type'";
                    $catlink = "cat=$cat&";
                }else 
                {
                    if (!empty($type)){
                        $querycat = "AND category='$type'";
                    }else
                    {
                        $querycat = "";
                    }                    
                        if (!empty($cat))
                    {
                        $catlink = "cat=$cat&";
                    }else {
                        $catlink = "";
                    }
                };
                
                // вивіт певної кількості товару на сторінці
                 $num = 9; //тут вказуєм скільки хочемо виводити товарів
                $page = (int)$_GET["page"];
                
                $count = mysqli_query($link, "SELECT COUNT(*) FROM table_products WHERE visible = '1' $querycat");
                $temp = mysqli_fetch_array($count);
                
                if ($temp[0] > 0)
                {
                    $tempcount = $temp[0];
                    
                    //знаходимо загальне число сторінок
                    $total = (($tempcount - 1)/$num) +1;
                    $total = intval($total);
                    
                    $page = intval($page);
                    
                    if (empty($page) or $page < 0) $page = 1;
                    if($page > $total) $page = $total;
                    //вираховуємо з якого номера потрібно виводити товари
                    $start = $page * $num - $num;
                    
                    $query_start_num = " LIMIT $start, $num";                   
                }
                
                
                $result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting $query_start_num");                
                
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
                                        <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=price-asc">Від дешевих до дорогих</a></li>
                                        <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=price-desc">Від дорогих до дешевих</a></li>
                                        <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=popular">Популярні</a></li>
                                        <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=news">Новинки</a></li>
                                        <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=brand">Від А до Я</a></li>
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
                $result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting $query_start_num");                
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
                
                 echo '</ul>';
                //вивід посторінкової навігації
                if ($page != 1) $pstr_prev = '<li><a class="pstr_prev" href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">&lt;</a></li>';
                if ($page != $total) $pstr_next = '<li><a class="pstr_next" href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">&gt;</a></li>';
                //формуємо посилання на сторінки
                if ($page - 5 > 0) $page5left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
                if ($page - 4 > 0) $page4left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
                if ($page - 3 > 0) $page3left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
                if ($page - 2 > 0) $page2left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
                if ($page - 1 > 0) $page1left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">'.($page - 1).'</a></li>';
                
                if ($page + 5 <= $total) $page5right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
                if ($page + 4 <= $total) $page4right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
                if ($page + 3 <= $total) $page3right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
                if ($page + 2 <= $total) $page2right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
                if ($page + 1 <= $total) $page1right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">'.($page + 1).'</a></li>';
                
                if ($page+5 < $total)
                {
                    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
                }
                if ($total > 1)
                {
                    echo '
                        <div class="pstrnav">
                        <ul>
                    ';
                    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='view_cat.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$pstr_next;
                    echo '
                        </ul>
                        </div>
                    ';
                }
                
            ?>
            
            </div>
        </div>        
        
        <?php include("include/block-footer.php"); ?>
    </div>
        

    
    
    
    
    <script src="/js/shop-script.js"></script>
</body>
</html>