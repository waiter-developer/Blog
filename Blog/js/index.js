'use strict';

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

//Carousel
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    nav: true,
    responsiveClass: true,
    responsive:{
        0:{
            items:1
        },
        768:{

            items:4,
        },
        1024:{
            items:6
        }
    }
});

//Button up
$("#pageUp").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});


//Editpicker
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );

//Button download
$(".upload_input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".btn_down").addClass("selected").html(fileName);
});

//Tags
$(function() {
    $('#tag').selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });
});

//PopUp
$(document).ready(function (){
    $('a.jsMyLinkModal').click( function(event){
        event.preventDefault();
        $('#myOverlay').fadeIn(297, function(){
            $('#myModal')
                .css('display', 'block')
                .animate({opacity: 1}, 198);
        });
    });
    $('#myModal_close, #myOverlay').click( function(){
        $('#myModal').animate({opacity: 0}, 198,
            function(){
                $(this).css('display', 'none');
                $('#myOverlay').fadeOut(297);
                $('.jsValidInput').val('').removeClass('valid_response');
            });
    });
});

//Sidebar

$(function(){
    $('.jsButtonSideBar').on('click', function() {
        $('.wrapper_sidebar_position').slideToggle(650, function(){
            if( $(this).css('display') === "none"){
                $(this).removeAttr('style');
            }
        });
        $('.jsButtonSideBar').hide();
    });
});

$(function(){
    $('.jsButtonSideBarClose').on('click', function() {
        $(this).parent().hide();
        $('.jsButtonSideBar').show();
    });
});

//Burger menu
$(function(){
    $('.jsHamburgerMenu').on('click', function() {
        $('.jsHeaderTop').slideToggle(450, function(){
            if( $(this).css('display') === "none"){
                $(this).removeAttr('style');
            }
        });
    });
});

//Validate form

(function ($) {

    var input = $('.jsValidFormGroup .jsValidInput');

    $('.jsValidForm').on('submit',function(){

        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){

                showValidate(input[i]);
                check=false;
            }
        }
        return check;
    });

    $('.jsValidForm .jsValidInput').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }else if($(input).attr('type') == 'password' || $(input).attr('name') == 'password'){
                if($(input).val() < '4'){
                    return false
                }
        } else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input);

        $(thisAlert).addClass('valid_response');
    }

    function hideValidate(input) {
        var thisAlert = $(input);


        $(thisAlert).val('').removeClass('valid_response');
    }
})(jQuery);

