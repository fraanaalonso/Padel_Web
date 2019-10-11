$(document).ready(function(){
    
    var chusquinhadas = 0;
    
    $('.chusquinhadas').on('click', function(){
        
        if(chusquinhadas == 1){
            $('.content-menu').addClass("content-menu2");
            chusquinhadas = 0;
        }else{
            $('.content-menu').removeClass("content-menu2");
            chusquinhadas = 1;
        }
        
        
    })
    
})