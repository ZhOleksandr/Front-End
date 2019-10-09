<?php 
    include("include/db_voter.php");
    $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voter</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    
    <script src="scripts/jquery-3.4.1.min.js"></script>
</head>
<body>
    <?php include("include/header.php"); ?>

    <main>
        <div class="container main">

            <?php include("include/leftbar.php"); ?>

            <section class="form-create-question">
                <div id="wrap-question">                    
                    
                     <?php 
                        $result1 = mysqli_query($link, "SELECT * FROM questions WHERE id='$id' AND visible = '1'");

                        if (mysqli_num_rows($result1) > 0) {
                        $row1 = mysqli_fetch_array($result1);   
                        
                            do {            
                                
                                echo '<div class="container-question">'
                                        .'<h2>'.$row1["title"].'</h2>'
                                        .'<h5>'.$row1["description"].'</h5>'
                                        .'<div id="answers">'
                                            .'<ul>'
                                            .'<li><span class="num-answer">1</span>'.$row1["answer"].'</li>';
                                    for($i=1; $i <= 5; $i++){
                                        
                                        if (!empty($row1["answer".$i])) {
                                        echo '<li><span class="num-answer">'.(1+$i).'</span>'.$row1["answer".$i].'</li>';
                                        }
                                    }
                                    echo    '</ul>'
                                        .'</div>'
                                     .'</div>';
                                    echo '<div class="box-btn btn-question">'
                                            .'<a href="#" class="my-btn a-question">Stop</a>'
                                            .'<a href="result.php?id='.$row1["id"].'" class="my-btn a-question">Show result</a>'
                                            .'<a href="#" class="my-btn a-question">Reset result</a>'
                                        .'</div>';
                        }  while ($row1 = mysqli_fetch_array($result1));
                        

                        }
                    ?>                    
                    
                    
                </div>
                
                
            </section>
        </div>
    </main>

    <?php include("include/footer.php"); ?>

    <script src="scripts/script.js"></script>

</body>
</html>