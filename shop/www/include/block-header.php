<?php 
    include("include/db_connect.php");
    
?>

<div id="block-header">
    <div id="header-top-block">
        <!-- TOP-MENU -->
        <ul id="header-top-menu">
            <li>Ваше місто - <span>Київ</span></li>
            <li><a href="o-nas.php">Про нас</a></li>
            <li><a href="magaziny.php">Магазини</a></li>
            <li><a href="contacts.php">Контакти</a></li>
        </ul>
        <!-- /TOP-MENU -->
        
        <div class="header-right-subblock">
            <ul>
            <!-- AUTH -->
            <!--
            <li><a class="top-auth">Вхід</a>
                <div id="block-top-auth">
                <div class="corner"></div>                
                <form method="post">
                    <ul id="input-email-pass">                        
                        <h3>Вхід</h3>
                        <p id="message-auth">Невірний логін або пароль</p>
                        <li><center><input type="text" id="auth_login" placeholder="Логін або E-mail"></center></li>
                    <li><center><input type="password" id="auth_pass" placeholder="Пароль"><span id="button-pass-show-hide" class="pass-show"></span></center></li>
                        <ul id="list-auth">
                            <li><input type="checkbox" name="rememberme" id="rememberme"><label for="rememberme">Запам'ятати мене</label></li>
                            <li><a id="remindpass" href="#">Забули пароль?</a></li>  
                            <li><p align="right" id="button-auth"><a>Вхід</a></p></li>  
                        </ul> 
                            <div id="auth-loading">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            </div>
                    </ul>
                </form>
            </div>
            </li>
            -->
                <?php 
                       
                    if ($_SESSION['auth'] == 'yes_auth'){
                        echo '<p id="auth-user-info" align="right"><img src="/icons/user.png"><a>Привіт, '.$_SESSION['auth-name'].'!</a></p>'
                             .'<li><img src="/icons/hiclipart.com-id_mpucg.png"></li>'
                             .'<li><a id="text-basket" href="#">Кошик пустий</a></li>';
                    }else {
                        echo '<li><a class="top-auth">Вхід</a>'
                                .'<div id="block-top-auth">'
                                .'<div class="corner"></div>'               
                                .'<form method="post">'
                                    .'<ul id="input-email-pass">'                        
                                        .'<h3>Вхід</h3>'
                                        .'<p id="message-auth">Невірний логін або пароль</p>'
                                        .'<li><center><input type="text" id="auth_login" placeholder="Логін або E-mail"></center></li>'
                                    .'<li><center><input type="password" id="auth_pass" placeholder="Пароль"><span id="button-pass-show-hide" class="pass-show"></span></center></li>'
                                        .'<ul id="list-auth">'
                                            .'<li><input type="checkbox" name="rememberme" id="rememberme"><label for="rememberme">Запам\'ятати мене</label></li>'
                                            .'<li><a id="remindpass" href="#">Забули пароль?</a></li>'  
                                            .'<li><p align="right" id="button-auth"><a>Вхід</a></p></li>'  
                                        .'</ul>'
                                            .'<div id="auth-loading">'
                                            .'<ul>'
                                                .'<li></li>'
                                                .'<li></li>'
                                                .'<li></li>'
                                            .'</ul>'
                                            .'</div>'
                                    .'</ul>'
                                .'</form>'
                            .'</div>'
                            .'</li>'
                            .'<li><a class="top-auth-text" href="registration.php">Зареєструватися</a><li>'
                            .'<li><img src="/icons/hiclipart.com-id_mpucg.png"></li>'
                            .'<li><a id="text-basket" href="#">Кошик пустий</a></li>';                        
                    }                    
                ?>      
             
            </ul>
           
        </div>
    </div>
    <!-- TOP LINE -->
    <div id="top-line"></div>
    <!-- /TOP LINE -->
    <div id="header-middle-block">
        <ul>
        <!-- LOGO -->
        <li><img id="img-left-logo" src="/images/logo-photo.jpg" alt="Logo"></li>
        <li>
            <div>
                <h3>КАНЦЕЛЯРІЯ</h3>
                <p>+380 98 905-81-47</p>
            </div>
        </li>
        <li><img id="img-right-logo" src="/images/logo-big-photo.jpg" alt="Logo"></li>
        <!-- /LOGO -->
        </ul>
    </div>
    <!-- INFORMATION-BLOCK     
    <div id="personal-info">
        <p align="right">Зв'яжіться з нами</p>
        <h3 align="right">(098) 905-81-47</h3>
        <img src="/icons/smartphone-blue.png" align="right">
        
        <p align="right">Ми працюємо: </p>
        <p align="right">Пн-пт: з 9:00 до 18:00</p>
        <p align="right">Субота, Неділя - вихідні</p>
        <img src="/icons/clock-blue.png" align="right">
    </div>    
    /INFORMATION-BLOCK -->
    
</div>

<div id="top-menu">
    <ul>
        <li><img src="/icons/house-blue.png"><a href="index.php">Головна</a></li>
        <li><img src="/icons/news-blue.png"><a href="#">Новинки</a></li>
        <li><img src="/icons/diploma-blue.png"><a href="#">Лідери продажі</a></li>
        <li><img src="/icons/sale.png"><a href="#">Розпродаж</a></li>
    </ul>
    
    <!-- SEARCH-BLOCK -->
    <div id="block-search">
        
        <form method="GET" action="search.php?q=">
            <span></span>
            <input type="text" id="input-search" name="q" placeholder="Пошук товару">
            <input type="submit" id="button-search"  value="Знайти">
        </form>
    </div>
    <!-- /SEARCH-BLOCK -->
    
</div>
    <!-- TOP LINE -->
    <div id="top-line"></div>
    <!-- /TOP LINE -->

