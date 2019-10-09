
<div id="block-parameter">
    <p class="header-title">Фільтр</p>
    
    <p class="title-filter">Ціна</p>
    
    <form method="GET" action="search_filter.php">
        
        <div id="block-input-price">            
            <ul>
                <li><p>від</p></li>
                <li><input type="text" id="start-price" name="start_price" value="0"></li>
                <li><p>до</p></li>
                <li><input type="text" id="end-price" name="end_price" value="1000"></li>
                <li><p>грн</p></li>
            </ul>            
        </div>
        
        <div id="blocktrackbar">
            <script>
                trackbar.getObject('one').init(
                    {
                            onMove : function() {
                                    document.getElementById("start-price").value = this.leftValue;
                                    document.getElementById("end-price").value = this.rightValue;
                            },
                            width : 200, // px
                            leftLimit : 0, // unit of value
                            leftValue : <?php
                            
                            if ((int)$_GET["start_price"] >=0 AND (int)$_GET["start_price"] <= 1000)
                            {
                                echo (int)$_GET["start_price"];
                            } else 
                            {
                                echo "100";
                            }
                            
                            ?>, // unit of value
                            rightLimit : 1000, // unit of value
                            rightValue : <?php
                            
                            if ((int)$_GET["end_price"] >=100 AND (int)$_GET["end_price"] <= 1000)
                            {
                                echo (int)$_GET["end_price"];
                            } else 
                            {
                                echo "255";
                            }
                            ?>, // unit of value
                            hehe : ":-)"
                    },
                    "blocktrackbar"
                    );
            </script>
        </div>
        
        <p class="title-filter">Виробник</p>
        
        <ul class="checkbox-brand">
            
            <?php 
            $subcat = $_GET["cat"];
                $result = mysqli_query($link, "SELECT * FROM brand WHERE subcategory='$subcat'");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do
                    {
                        $checked_brand = "";
                        if ($_GET["brand"]) {
                            if (in_array($row["id"],$_GET["brand"])){
                                $checked_brand = "checked";
                            }
                        }
                        
                        echo '
                        <li><input '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrand'.$row["id"].'"><label for="checkbrand'.$row["id"].'">'.$row["title_brand"].'</label></li>
                        ';
                    }
                    while ($row = mysqli_fetch_array($result));
                }
            ?>
            
        </ul>
        
        <center><input type="submit" name="submit" id="button-param-search" value="Знайти"></center>
        
    </form>
    
</div>

