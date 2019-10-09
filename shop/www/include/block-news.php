<?php include("include/db_connect.php"); ?>
<div id="block-news">
    <p class="header-title">Новини</p>
    <center><img src="/icons/up-arrow.png" id="news-prev"></center>
    <div id="newsticker">
        
        <ul>
            <?php
            $result = mysqli_query($link, "SELECT * FROM news ORDER BY id DESC");                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do
                    {
                        echo ' <li>
                                  <span>'.$row["date"].'</span>
                                  <a href="#">'.$row["title"].'</a>
                                  <p>'.$row["mini_text"].'</p>
                               </li>
                        ';
                    }
                        while ($row = mysqli_fetch_array($result));
                    }
            ?>
           
           
        </ul>
        
    </div>
    <center><img src="/icons/down-arrow.png" id="news-next"></center>
</div>