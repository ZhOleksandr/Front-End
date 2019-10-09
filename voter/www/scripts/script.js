
$(document).ready(function (){
    //ховаємо верхнє меню при розмрі екрану меньше 930px
    $('#menu').click(function (){
        if ($('#myTopnav').attr('class') === 'topnav'){
            $('#myTopnav').addClass('responsive');
            $('#header-container').css({"display": "flex", "flex-wrap": "wrap"});
        } else {
            $('#myTopnav').removeClass('responsive');
            $('#header-container').css({"display": "", "flex-wrap": ""});
        }
    });
    
    //показати / сховати кабінет користувача
    $('#btn-user-cabinet').click(function (){
        $("#user-cabinet").fadeToggle(200);
        $(this).attr('class', ($(this).attr('class') === 'cabinet' ? '' : 'cabinet'))
        
    });
    
    
    
});