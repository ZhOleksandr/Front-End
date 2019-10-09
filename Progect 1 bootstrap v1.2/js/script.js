$(document).ready(function(){
  $('.dropdown-submenu a.dropdown-submenu-level-two').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

