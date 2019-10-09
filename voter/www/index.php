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

            <section>

                <div class="filters">
                    <div id="sort-title">
                        <label>Sort:</label>                    
                        <div class="sort-btn">
                            <a href="">by creation date</a>
                        </div>
                    </div>
                    
                    <div id="search-title">
                        <label>Search:</label>                    
                        <div>
                            <input type="text" id="search" placeholder="enter the keyword">
                        </div>
                    </div>
                </div>

                <div class="container-questions">
                   
                            <?php 
                                $result = mysqli_query($link, "SELECT * FROM questions WHERE visible = '1'");                
                                if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);   
                                    echo '<div class="group-question">'
                                        .'<h2>'.$row["title_group"].'</h2>'
                                        .'<ul>';
                                    do {
                                        echo '<li><a href="question.php?id='.$row["id"].'">'.$row["title"].'</a></li>';                                      

                                }  while ($row = mysqli_fetch_array($result));
                                echo '</ul>'
                                    .'</div>';
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