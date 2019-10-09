<?php 

  include("include/db_connect.php"); //підключення бази даних
  include("functions/functions.php");
  session_start();
  include("include/auth_cookie.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <title>Регістрація</title>

     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.cookie-1.4.1.min.js"></script>       
    <script type="text/javascript" src="trackbar/trackbar.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.js"></script>
	
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
            <h2 class="h2-title">Регістрація</h2>
            <form method="post" id="form_reg" action="reg/handler_reg.php">
                
                <p id="reg_message"></p>
                <div id="block-form-registration">
                    <ul id="form_registration">
                        <li>
                            <label>Логін</label>
                            <span class="star">*</span>
                            <input type="text" name="reg_login" id="reg_login">
                        </li>
                        <li>
                            <label>Пароль</label>
                            <span class="star">*</span>
                            <input type="text" name="reg_pass" id="reg_pass">
                            <span id="genpass">Сгенерувати</span>
                        </li>                        
                        <li>
                            <label>Ім'я</label>
                            <span class="star">*</span>
                            <input type="text" name="reg_name" id="reg_name">
                        </li>                        
                        <li>
                            <label>E-mail</label>
                            <span class="star">*</span>
                            <input type="text" name="reg_email" id="reg_email">
                        </li>
                                                
                    </ul>
                </div>
                <p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регістрація"></p>
            </form>
            
        </div>        
        
        <?php include("include/block-footer.php"); ?>
    </div>
    
    
    <script src="js/shop-script.js"></script>
    <script src="js/check-form.js"></script>
    
</body>
</html>
