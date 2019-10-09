//$(document).ready(function (){
//додаємо варіант відповіді
    $('#add-answer').click(function (){
        
        if($('.box-answers').children().length == 0 ){
            $('.box-answers').html('<div class="input-container" id="answer-block" rebest="yes">'
                                        +'<p class="answer-help"><span class="star">*</span><span class="delete">x</span></p>'
                                        +'<input type="text" name="answer" id="_answer">'
                                    +'</div>');
        } else {
            var linksId = $('[rebest="yes"]').length;
            if(linksId < 5 ) {
            //$('.box-answers').children().last().clone().appendTo('.box-answers').attr('id', + i+1);
            $(".box-answers").children().last().clone().attr('id', 'answer-block' + linksId).appendTo(".box-answers").find('input').val('').attr('name', 'answer' + linksId);
            } else {
                
                $('.input-container').last().html('<div class="input-container" id="answer-block" rebest="yes">'
                                        +'<p class="answer-help"><span class="star">*</span><span class="delete">x</span></p>'
                                        +'<input type="text" name="answer" id="_answer">'
                                        +'<p class="help">Не можна створювати більше 5 відповідей</p>'
                                    +'</div>');
            } 
       }
       //видаляємо варіант відповіді
       $('.delete').click(function (){       
            $('#answer-block' + linksId).remove();
        });
    });
    
   // });