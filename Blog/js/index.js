'use strict';

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

//Carousel
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3333,
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

//Tags
$(function() {
    $('#tag').selectize({
        plugins: ['restore_on_backspace'],
        delimiter: ',',
        persist: false,
        maxItems: null,
        highlight: false,
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
                $('.jsValidResponseEmail').html('');
                $('.jsValidResponsePassword').html('');
                $('.jsLogResponse').html('');
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
                if($(input).val().length == 0){
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
        var responseValid = $(thisAlert).addClass('valid_response');

        if(thisAlert.attr('type') == 'email' || thisAlert.attr('name') == 'email') {
            $('.jsValidResponseEmail').html('The email is invalid.Please type like this: example@something.other').fadeIn(999);
        responseValid;
        }else if(thisAlert.attr('type') == 'password' || thisAlert.attr('name') == 'password') {
            $('.jsValidResponsePassword').html('The field is empty').fadeIn(999);
            responseValid
        }

    }

    $('#jsLoginForm').submit(function (e){
        e.preventDefault();

        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){

                showValidate(input[i]);
                check=false;
            }
        }

        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            processData: false,
            contentType: "application/x-www-form-urlencoded",
            data: $(this).serialize(),
            success: function (result){
                var jsonData = result;
                if(jsonData['ok']){
                    $('.jsLogResponse').html(jsonData['ok']).css('color', 'green');
                        location.reload();
                }else {
                    $('.jsLogResponse').html(jsonData['no']).css('color', 'red');
                }
            }
        })

        return check;
    });
    function hideValidate(input) {
        var thisAlert = $(input);
        $('.jsValidResponseEmail').html('').fadeOut(777);
        $('.jsValidResponsePassword').html('').fadeOut(777);
        $(thisAlert).val('').removeClass('valid_response');
    }
})(jQuery);

//Button Down
$(function(){
    $('.jsBtnDown').on('click', function() {
        $('.wrapper_nav-bar .container').slideToggle(650, function(){
            if( $(this).css('display') === "none"){
                $(this).removeAttr('style');
            }
        });
    });
});

//Sharing button
var Share = {
    me : function(el){
        Share.popup(el.href);
        return false;
    },
    popup: function(url) {
        window.open(url,'','toolbar=0,status=0,width=626,height=436');
    }
};

//Valid Register form
(function ($) {

    var input = $('.jsRegisterFormGroup .jsRegisterInput');


    $('.jsRegisterForm .jsRegisterInput').each(function(){
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
            if($(input).val().length < 4){
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
        var responseValid = $(thisAlert).addClass('valid_response');

        if(thisAlert.attr('type') == 'email' || thisAlert.attr('name') == 'email') {
            $('.jsRegisterEmail').html('The email is invalid.Please type like this: example@something.other').fadeIn(999);
            responseValid;
        }else if(thisAlert.attr('type') == 'password' || thisAlert.attr('name') == 'password') {
            $('.jsRegisterPassword').html('The password must be not less 4 symbols').fadeIn(999);
            responseValid;
        }else if(thisAlert.val().trim() == ''){
            $('.jsRegisterResponse').html('The field is empty').fadeIn(999);
            responseValid;
        }

    }

    $('#jsRegisterForm').submit(function (e){
        e.preventDefault();

        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){

                showValidate(input[i]);
                check=false;
            }
        }

        $.ajax({
            type: 'POST',
            url: 'Login.php',
            processData: false,
            contentType: "application/x-www-form-urlencoded",
            data: $(this).serialize(),
            success: function (result){
                var jsonData = result;
                if(jsonData['ok']){
                    $('.jsRegisterResult').html(jsonData['ok']).css('color', 'green');
                    location.href = 'index.php';
                }else {
                    $('.jsRegisterResult').html(jsonData['no']).css('color', 'red');
                }
            }
        })

        return check;
    });
    function hideValidate(input) {
        var thisAlert = $(input);
        $('.jsRegisterPassword').html('');
        $('.jsRegisterEmail').html('');
        $('.jsRegisterResponse').html('');
        $(thisAlert).val('').removeClass('valid_response');
    }
})(jQuery);