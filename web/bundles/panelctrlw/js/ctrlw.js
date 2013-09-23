
function hotkeys()
{
    $(document).bind('keydown', 'f2',          function (evt){ $('#b').focus(); return false; });
    $(document).bind('keydown', 'Esc',         function (evt){ $('#suggestions').fadeOut(); $('#b').blur(); jQuery('#ctrlw_filters').fadeOut(); return false; });
    $(document).bind('keydown', 'Ctrl+s',      function (evt){ $('input[value=Guardar]').click(); return false; });
    $(document).bind('keydown', 'Alt+a',       function (evt){ activeMenu('archivos'); return false; });
    $(document).bind('keydown', 'Alt+c',       function (evt){ $('#RS-submenu-configuraciones').toggle(); return false; });
    $(document).bind('keydown', 'Alt+g',       function (evt){ $('#RS-submenu-seguridad').toggle(); return false; });
    $(document).bind('keydown', 'Ctrl+f',      function (evt){ $('#ctrlw_filters').css('display','block'); return false; });
    //jQuery(document).bind('keydown', 'down',        function (evt){ jQuery('#suggestions #tabs div fieldset table tbody tr').css('backgroundColor','#FFFFFF'); return false; });
    //jQuery(document).bind('keydown', 'right',       function (evt){ jQuery('#suggestions #tabs ul li.ui-tabs-selected').next().click(); return false; });
    $('#b').focus();
}
$(document).ready(ajustarContendor);
$(document).ready(hotkeys);
$(window).resize(ajustarContendor);

function ajustarContendor()
{
   var avaliable_width = $(this).width() - 220;
   var avaliable_height = $(this).height() - 150;
   
   $('#RS-main-content-wrapper').css('width', avaliable_width);
   $('#RS-main-content-wrapper').css('height', avaliable_height);
   
}

$(document).ready(function(){
//    $('.fancybox').fancybox({'padding': 0, 'width': 800, 'height': 480, 'autoSize': false, 'fitToView': false});
    
    /*********************************************************************
            ACCION PARA EL BOTON GUARDAR
    *********************************************************************/
   
    $('.RS-form-save').click(function(){
        $($(this).attr('data-form-id')).submit();
    })
    
    
    $(".sf_admin_batch_checkbox").click(function() { 
        if ($(this).attr("checked") == "checked"){
            $(this).parent().parent().addClass("highlight");  
        }else{   
            $(this).parent().parent().removeClass("highlight");
        }
    });
    
    
    /*********************************************************************
            DIV DESPLIEGUE DE MAS ACCIONES EN LOS LISTADOS
    *********************************************************************/
    
    $('div.mas-acciones span').click(function(){
        if($(this).next().css('display')=="block") 
            var status = 'hide' 
        else 
            var status = 'show';
        $('div.mas-acciones span').next().slideUp('fast');
        $('div.mas-acciones span').css('color','#333333');
        if(status=='hide'){
            $(this).next().slideUp('fast');
            $(this).css('color','#333333');
        }else{
            $(this).next().slideDown('fast');
            $(this).css('color','#DC4B39');
        }
    });
    
    $('#b').keyup(function() {
        if($('#b').val().length > 1){
            clearTimeout($.data(this, 'timer'));
            var wait = setTimeout(search, 250);
            $(this).data('timer', wait);
        }else{
            $('#suggestions').fadeOut();
        }
    });
    $('#b').keypress(function(event){
        if ( event.which == 13 ) {
            if($('#RS-results-tabs').find('tr').length == 2)
                window.location.href = $('#RS-results-tabs').children('div').children().children().children('tbody').children('tr').children('td:last-child').children().attr('href');
            else
                window.location.href = $('#b').data('result-url') + '&b=' + $('#b').val();
        }
    })
    $('#b').focus(function(){
        if($('#b').val().length > 1){
            setTimeout(search, 1000);
        }
    })
    
});

/* DETECT CLICKOUTSIDE AND CLOSE POP-UP */
$(function(){
    $('html').click(function(){
        
        /* TOP MENU */
        $('.active-menu-item').removeClass('active-menu-item');
        $('.RS-submenu').hide();
        
        /* MAS ACCIONES CLOSE */
        $('div.mas-acciones span').next().slideUp('fast');
        $('div.mas-acciones span').css('color','#333333');
        
    })
    $('#RS-main-menu ul li').click(function(event){
        event.stopPropagation();
    })
    $('#toggle_filters').click(function(event){
        event.stopPropagation();
    })
    $('div.mas-acciones span').click(function(event){
        event.stopPropagation();
    })
});


function activeMenu(menu)
{
    $('.active-menu-item').removeClass('active-menu-item');
    if($('#RS-submenu-'+menu).css('display')=='block'){
        $('#RS-submenu-'+menu).css('display','none');
        $('#RS-submenu-'+menu).parent().removeClass('active-menu-item');
    }else{
        $('.RS-submenu').css('display','none');
        $('#RS-submenu-'+menu).css('display','block');
        $('#RS-submenu-'+menu).parent().addClass('active-menu-item');
    }    
}

function popUp(element)
{

    /* CREAMOS EL DIV CONTENEDOR POPUP */ 
    var div = document.createElement("div");
    div.id = $(element).html();
    div.title = $(element).html();
    div.className = 'pop-up';
    
    /* CREAMOS EL DIV DE LA BARRA DE DESPLAZAMIENTO */
    var div_bar = document.createElement("div");
    div_bar.id = 'pop-up-bar';
    $(div_bar).html($(element).html());

    /* CREAMOS EL BOTON CLOSE */
    var div_close = document.createElement("div");
    div_close.id = 'pop-up-close';
    div_close.title = 'Cerrar';
    $(div_close).html("x");
    
    
    /* CREAMOS CONTENEDOR DEL FORMULARIO */
    var div_form = document.createElement("iframe");
    div_form.id = 'pop-up-form';
    div_form.src = $(element).attr('href');
//    $.ajax({
//        url: $(element).attr('href'),
//        success: function(data) {
//            $(div_form).append(data);
//        }
//        });

    /* agregamos la barra de desplazamiento al div contenedor */ 
    $(div_bar).append(div_close);
    $(div).append(div_bar);
    $(div).append(div_form);
    
    
    $('body:not(:has(div.pop-up))').append(div);
    $('#'+div.id).fadeIn('fast');
    $(div).draggable();
    $('#'+div_close.id).click(function(){$(div).fadeOut('fast');})
    //$('#'+$(element).html()).dialog();
}


/*********************************************************************
        JS DEL BUSCADOR DEL SISTEMA
*********************************************************************/


function search() {
  $.get($('#b').data('search-url'), { b: "" + $('#b').val() + ""}, function(data){
    if(data.length > 0) {
      $('#suggestions').fadeIn();
      $('#suggestions').html(data);
    }else{
      $('#suggestions').fadeOut();
    }
  });
}

function link_to(url)
{
    location.href=url;
}
