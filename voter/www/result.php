<?php 
    include("include/db_voter.php");
    //include("getData.php");
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
    
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          //var jsonData = $.ajax({
          //url: "getData.php",
          //dataType: "text",
          //async: false
          //}).responseText;
          
          //var jsonData = $.get(
          //  "getData.php"
          //);
 //console.log(jsonData);
         //var strMy = Array.from(jsonData);
//console.log(strMy);
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['PHP',     9],
          ['Java',      11],
          ['C#',  2],
          ['C++', 2],
          ['JavaScript', 17]
        ]);

        var options = {
          title: 'Якою мовою програмування володієте?'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</head>
<body>
    <?php include("include/header.php"); ?>

    <main>
        <div class="container main">

            <?php include("include/leftbar.php"); ?>

            <section class="form-create-question">
                <div id="wrap-question"> 
                    
                    <div id="piechart" style="width: 600px; height: 400px; margin: 0 auto;"></div>
                    
                    
                     <?php                     
                     /*$result2 = mysqli_query($link, "SELECT count,count1,count2,count3,count4 FROM questions WHERE id='$id'");
                        if (mysqli_num_rows($result2) > 0) {   
                            $row2 = mysqli_fetch_object($result2);
                               do { 
                                   $json = json_encode($row2);
                                   echo $json;
                               }while ($row2 = mysqli_fetch_object($result2));
                        } */                
                    ?>   
                
                
                </div>
            </section>
        </div>
    </main>

    <?php include("include/footer.php"); ?>

    <script src="scripts/script.js"></script>

</body>
</html>