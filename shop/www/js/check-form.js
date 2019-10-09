$(document).ready(function() {
            $('#form_reg').validate (
                    {
                        //правила перевірки
                        rules: {
                            "reg_login":{
                                required:true,
                                minlength:5,
                                maxlength:15,
                                remote: {
                                type: "post",
                                url: "../reg/check_login.php"
                                        }
                            },
                            "reg_pass":{
                                required:true,
                                minlength:7,
                                maxlength:15
                            },                            
                            "reg_name":{
                                required:true,
                                minlength:3,
                                maxlength:15
                            },                            
                            "reg_email":{
                                required:true,
                                email:true                                
                                        }                              
                            },
                        
                        //повідомлення що виводяться при порушені правил введеня
                        messages: {
                            "reg_login":{
                                required:"Вкажіть логін!",
                                minlength:"Від 5 до 15 символів",
                                maxlength:"Від 5 до 15 символів",
                                remote:"Логін зайнятий!"
                            },
                            "reg_pass":{
                                required:"Вкажіть пароль!",
                                minlength:"Від 7 до 15 символів",
                                maxlength:"Від 7 до 15 символів"
                            },                            
                            "reg_name":{
                                required:"Вкажіть ваше ім'я!",
                                minlength:"Від 3 до 15 символів",
                                maxlength:"Від 3 до 15 символів"
                            },                            
                            "reg_email":{
                                required:"Вкажіть свій E-mail!",
                                email:"Не коректний E-mail!"                                
                            }
                        },
                submitHandler: function(form) {

            $(form).ajaxSubmit({
                method: 'post',
                success: function(data) {
                    if (data == 'true')
                            {
                                $("#block-form-registration").fadeOut(300,function(){
                                    $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Ви успішно зареєструвались");
                                    $("#form_submit").hide();
                                });
                            }
                            else
                            {
                                $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
                            }
                        }
                    });
                }
            });
        });


