<?php 
    include("include/db_voter.php");
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
                <div class="box-question">
                    <div class="input-container">	
                        <input type="text" name="group" id="_group" placeholder="Select a group">
                    </div>
                </div>

                <form action="include/handler.php" name="create" method="POST">

                    <div class="box-question">

                        <div class="input-container">
                            <p>Your question? <span class="star">*</span></p>
                            <input type="text" name="question" id="_question">
                        </div>

                        <div class="input-container">
                            <p>Description</p>
                            <input type="text" name="description" id="_description">
                        </div>
                    </div>
<!-- ANSWERS -->
                    <div class="box-answers">

                    </div>
<!-- /ANSWERS -->

                    <div class="box-btn" id="add-answer">
                            <a href="#" class="my-btn">+ Add answer option</a>
                    </div>
                    
                        <button type="submit" class="my-btn-form" id="save">Save</button>
                        <button type="reset" class="my-btn-form" id="clear">Clear</button>
                        
                </form>

            </section>
        </div>
    </main>

    <?php include("include/footer.php"); ?>

    <script src="scripts/script.js"></script>
    
    <script>
        $(document).ready(function(){          
            $.getScript("scripts/add-answer.js");          
        });
    </script>
    
</body>
</html>