$(document).ready(function(){
    // КАРУСЕЛЬ
    function slider(height_li, margin_bottom, col_view) {
        var step = height_li+margin_bottom,
                slider_box = col_view*step-margin_bottom,
                $col_article=$("#newsticker>ul>li").length,
                col_main_top=0,
                max_col_main_top=$col_article*step;
        $("#newsticker").height(slider_box);
        
        $("#newsticker>ul>li").height(height_li).css("margin-bottom",margin_bottom);
        
        $("#news-prev").click(function (){
            if(-col_main_top == max_col_main_top-col_view*step){
                col_main_top = 0;
            } else {
                col_main_top = col_main_top - step;
            }
            $("#newsticker>ul").css("margin-top",col_main_top+"px");
        });
        
        $("#news-next").click(function (){
            if(col_main_top == 0){
                col_main_top = -max_col_main_top+col_view*step;
            } else {
                col_main_top = col_main_top + step;
            }
            $("#newsticker>ul").css("margin-top",col_main_top+"px");
        });
                
    }
    $(slider(150, 7, 3));
    
    // плагін КАРУСЕЛЬ
    /*$("#newsticker").jCarouselLite({       
       vertical: true, 
       hoverPause:true,
       btnPrev: "#news-prev",
       btnNext: "#news-next",
       visible: 3,
       auto:3000,
       speed:500
    });*/
    
    //зміна виду відобращень товарів GRID / LIST
    $("#style-grid").click(function(){ // переключає Grid / List
        $("#block-tovar-grid").show();
        $("#block-tovar-list").hide();
        
        $("#style-grid").attr("src","/icons/grid-red.png"); // змінює картинку в залежності від вибору
        $("#style-list").attr("src","/icons/list.png");
        
        $.cookie('select_style', 'grid');
    });
    
     $("#style-list").click(function(){ // переключає Grid / List
        $("#block-tovar-grid").hide();
        $("#block-tovar-list").show();
        
        $("#style-list").attr("src","/icons/list-red.png"); // змінює картинку в залежності від вибору
        $("#style-grid").attr("src","/icons/grid.png");
        
       $.cookie('select_style', 'list');
    });
    
    // 
    if ($.cookie('select_style') == 'grid') {
        $("#block-tovar-grid").show();
        $("#block-tovar-list").hide();
        
        $("#style-grid").attr("src","/icons/grid-red.png");
        $("#style-list").attr("src","/icons/list.png");
    } else {
        $("#block-tovar-grid").hide();
        $("#block-tovar-list").show();
        
        $("#style-list").attr("src","/icons/list-red.png");
        $("#style-grid").attr("src","/icons/grid.png");
    }
    
    $("#select-sort").click(function(){ // показує список сортування по кліку
        $("#sorting-list").slideToggle(150);
    });
    
    $('#block-category > ul > li > a').click(function (){       // акордеон категорій
        if ($(this).attr('class') != 'active') {
            $('#block-category > ul > li > ul').slideUp(400);   //закриває
            $(this).next().slideToggle(400);                    // відкриває
            
                $('#block-category > ul > li > a').removeClass('active');
                $(this).addClass('active');
                $.cookie('select_cat', $(this).attr('id'));
        } else {
            $('#block-category > ul > li > a').removeClass('active');
            $('#block-category > ul > li > ul').slideUp(400);
            $.cookie('select_cat', '');
        }
    });
    
    if ($.cookie('select_cat') != '') {
        $('#block-category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
    };
    
    
    $('#genpass').click(function() {
        $.ajax({
            type: "POST",
            url: "/functions/genpass.php",
            dataType: "html",
            cache: false,
            success: function(data){
                $('#reg_pass').val(data);
            }
        });
    });
    
    
//$('#reloadcaptcha').click(function(){
//    $('#block-captcha > img').attr("src","/reg/reg_captcha.php?r="+ Math.random());
//});
//$(".top-auth").click(function(){
//    $("#block-top-auth").toggle(400);
//});
$('.top-auth').click(function(){
        $("#block-top-auth").fadeToggle(200);
        $(this).attr('id', ($(this).attr('id') === 'active-button' ? '' : 'active-button'));
    });
/*
$(".top-auth").click(function(){
$("#togl").toggle(
    function() {
       $('.top-auth').attr('id','active-button');
       $("#block-top-auth").fadeIn(1000);        
    },
    function() {
       $('.top-auth').attr('id','');
       $("#block-top-auth").fadeOut(1000);        
    }
    );
  });
  */
  
  
// відображеня паролю
$('#button-pass-show-hide').click(function() {
    var statuspass = $('#button-pass-show-hide').attr("class");
    if (statuspass == "pass-show") {
        $('#button-pass-show-hide').attr("class","pass-hide");
        
            var $input = $("#auth_pass");
            var change = "text";
            var rep = $("<input placeholder='Пароль' type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr("class", $input.attr("class"))
                    .val($input.val())
                    .insertBefore($input);
                $input.remove();
                $input = rep;                
    } else {
            $('#button-pass-show-hide').attr("class","pass-show");
        
            var $input = $("#auth_pass");
            var change = "password";
            var rep = $("<input placeholder='Пароль' type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr("class", $input.attr("class"))
                    .val($input.val())
                    .insertBefore($input);
                $input.remove();
                $input = rep;
    }
});
  
  /**
     * При клике на кнопку Вход
     * проверяем поле Логин, по ошибке отображаем красную границу
     * проверяем поле Пароль, по ошибке отображаем красную границу
     * если отмечен чекбокс Запомнить - сохраняем ее
     * если нет ошибок, делаем ajax-запрос в обработчик auth.php
     * по результату, либо перегружаем страницу, либо опять отображаем кнопку входа
     */
    $('#button-auth').click(function() {
        var auth_login = $('#auth_login').val();
        var auth_pass = $('#auth_pass').val();
            //send_login, send_pass, auth_rememberme;

        if (auth_login == "" || auth_login.length > 30) 
        {
            $('#auth_login').css("borderColor", "#FDB6B6");
            send_login = 'no';
        } else {
            $('#auth_login').css("borderColor", '#DBDBDB');
            send_login = 'yes';
        }

        if (auth_pass === "" || auth_pass.length > 15) {
            $('#auth_pass').css("borderColor", '#FDB6B6');
            send_pass = 'no';
        } else {
            $('#auth_pass').css('borderColor', '#DBDBDB');
            send_pass = 'yes';
        }

         if ($('#rememberme').prop('checked')) { //перевіряємо стан чекбокса
             auth_rememberme = 'yes';
         } else {
             auth_rememberme = 'no';
         }

        if (send_login === 'yes' && send_pass === 'yes') {
            $('#button-auth').hide();
            //$('#auth-loading').show();
            $('#auth-loading').fadeIn(2000);

            $.ajax({
                type: 'POST',
                url: 'include/auth.php',
                data:  'login='+auth_login+'&pass='+auth_pass+'&rememberme='+auth_rememberme,
                dataType: 'html',
                cache: false,
                success: function(data) {
                    if (data === 'yes_auth') {
                        location.reload();
                    } else {
                        $('#message-auth').slideDown(400);
                        $('#auth-loading').hide();
                        $('#button-auth').show();
                    }
                }
            });
        }

    });
  
  
});
/*
// Валідація форми
$(document).ready(function() {

	$('#form_submit').on( "click", function() {

	//validate name
	var name = $('#reg_login');
	if (name.val().length > 3) {
		name.removeClass('error-name').addClass('ok-name');
	}else {
		$('#reg_login').attr('placeholder','логін має бути довше трьох символів');
		name.addClass('error-name');
	}

	//validate email
	var mail = $('#reg_email');
	var emailReg = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
	 
	 	if(mail.val().search(emailReg) == 0 && mail.val() != '')
	 	{
	 	mail.removeClass('error').addClass('ok');
	 	}
	 	else
	 	{
	 $('#reg_email').attr('placeholder','enter your email');
	 mail.addClass('error');
		}
                
        //validate phone
	var phone = $('#reg_phone');
	var phoneReg = /^\+[0-9]{2,6}$/i;
	 
	 	if(phone.val().search(phoneReg) == 0 && phone.val() != '')
	 	{
	 	phone.removeClass('error').addClass('ok');
	 	}
	 	else
	 	{
	 $('#reg_phone').attr('placeholder','enter your phone');
	 phone.addClass('error');
		}
	});
});
*/
