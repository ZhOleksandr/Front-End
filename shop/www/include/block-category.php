<?php  
    include("include/db_connect.php");
?>
<div id="block-category">
    
    <p class="header-title">Категорії товарів</p>
    
    <ul>
        <li><a id="index1"><img src="/icons/pencil-blue.png" id="pencil-image" class="img-category">Письмове приладдя</a>
            <ul class="category-section">
                <li><a href="view_cat.php?type=Письмове приладдя"><strong>Все</strong></a></li>
                
                <?php 
                $result = mysqli_query($link, "SELECT * FROM subcategory WHERE category='Письмове приладдя'");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);                    
                    do {                        
                        echo '<li><a href="view_cat.php?cat='.strtolower($row["title"]).'&type='.$row["category"].'">'.$row["title"].'</a></li>';
                    } 
                     while ($row = mysqli_fetch_array($result));
                    }
                ?>
                
            </ul>
        </li>
        <li><a id="index2"><img src="/icons/paper-blue.png" id="paper-image" class="img-category">Паперова продукція</a>
            <ul class="category-section">
                <li><a href="view_cat.php?type=Паперова продукція"><strong>Все</strong></a></li>
                <?php 
                $result = mysqli_query($link, "SELECT * FROM subcategory WHERE category='Паперова продукція'");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);                    
                    do {                        
                        echo '<li><a href="view_cat.php?cat='.strtolower($row["title"]).'&type='.$row["category"].'">'.$row["title"].'</a></li>';
                    } 
                     while ($row = mysqli_fetch_array($result));
                    }
                ?>
                
            </ul>
        </li>
        <li><a id="index3"><img src="/icons/paper-clip-blue.png" id="clip-image" class="img-category">Канцелярські товари</a>
            <ul class="category-section">
                <li><a href="view_cat.php?type=Канцелярські товари"><strong>Все</strong></a></li>
                <?php 
                $result = mysqli_query($link, "SELECT * FROM subcategory WHERE category='Канцелярські товари'");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);                    
                    do {                        
                        echo '<li><a href="view_cat.php?cat='.strtolower($row["title"]).'&type='.$row["category"].'">'.$row["title"].'</a></li>';
                    } 
                     while ($row = mysqli_fetch_array($result));
                    }
                ?>
                
            </ul>
        </li>
        <li><a id="index4"><img src="/icons/printer-blue.png" id="printer-image" class="img-category">Офісна техніка</a>
            <ul class="category-section">
                <li><a href="view_cat.php?type=Офісна техніка"><strong>Все</strong></a></li>
                <?php 
                $result = mysqli_query($link, "SELECT * FROM subcategory WHERE category='Офісна техніка'");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);                    
                    do {                        
                        echo '<li><a href="view_cat.php?cat='.strtolower($row["title"]).'&type='.$row["category"].'">'.$row["title"].'</a></li>';
                    } 
                     while ($row = mysqli_fetch_array($result));
                    }
                ?>
                
            </ul>
        </li>
    </ul>
    
</div>

