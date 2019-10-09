<?php 
  include("include/db_connect.php");
  include("functions/functions.php");
  session_start();
  include("include/auth_cookie.php");
  
  $id = clear_string($link, $_GET["id"]);
  
  //кількість переглядів товару
  if($id != $_SESSION['countid']){
      $querycount = mysqli_query($link, "SELECT count FROM table_products WHERE products_id='$id'");
        $resultcount = mysqli_fetch_array($querycount);
        
        $newcount = $resultcount["count"] + 1;
        $update = mysqli_query($link, "UPDATE table_products SET count='$newcount' WHERE products_id='$id'");
  }
  
  $_SESSION['countid'] = $id;
  
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
         
            <?php 
                $result1 = mysqli_query($link, "SELECT * FROM table_products WHERE products_id='$id' AND visible='1'");                
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_array($result1);                    
                    do {                        
                        /* функція обробник зображень*/
                        if (strlen($row1["image"]) > 0 && file_exists("./uploads_images/".$row1["image"])) {
                            $img_path = './uploads_images/'.$row1["image"];
                            $max_width = 300;
                            $max_height = 300;
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
                        } 
                        
                        echo ''
                        . '<div id="block-breadcrumbs-and-rating">'
                            . '<p id="nav-breadcrumbs"><a href="view_cat.php">Письмове приладдя</a><a href="view_writing.php"> \ '.$row1["subcategory"].'</a> \ <span>'.$row1["brand"].'</span></p>'
                        . '</div>'
                        . '<div id="block-content-info">'
                            . '<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">'
                            . '<div id="block-mini-descriprion">'
                                . '<p id="content-title">'.$row1["title"].'</p>'
                                . '<ul class="reviews-and-counts-content">'
                                    . '<li><img src="/icons/eye.png"><p>'.$row1["count"].'</p></li>'
                                    . '<li><img src="/icons/comment.png"><p>0</p></li>'                                    
                                . '</ul>'
                                . '<p id="style-price">'.$row1["price"].' грн.</p>'
                                . '<a class="add-cart" id="add-cart-view" tid="'.$row1["products_id"].'"><span>Купити</span></a>'
                                . '<p id="content-text">'.$row1["mini_description"].'</p>'
                            . '</div>'
                        . '</div>';
                        
                        
                        
                    } while ($row1 = mysqli_fetch_array($result1));
                }
            ?>
        
        <?php include("include/block-footer.php"); ?>
    </div>
        

    
    
    
    
    <script src="/js/shop-script.js"></script>
</body>
</html>