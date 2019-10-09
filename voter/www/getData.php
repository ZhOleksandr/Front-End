<?php 
include("include/db_voter.php");
    $resId = mysqli_query($link, "SELECT * FROM questions");
    if (mysqli_num_rows($resId) > 0) {
        $rowId = mysqli_fetch_array($resId);
            for ($i=0; $i < 10; $i++){
            if($resId == i){
                $id = $resId;
                echo $id;
            }
        }
    }
    $result1 = mysqli_query($link, "SELECT count,count1,count2,count3,count4 FROM questions WHERE id='$id'");
    

    if (mysqli_num_rows($result1) > 0) {
        
            
            $row1 = mysqli_fetch_object($result1); 
            do {
                $json = json_encode($row1);
                //, JSON_HEX_TAG
                echo $json;
            }while ($row1 = mysqli_fetch_array($result1));
          }
 