/*
************************************************************
Long name   : Internet programming classes - Offline package
Short name  : IPC - Offline package
Online view : http://ipc.alexeyabramov.info/
Author      : Alexey Abramov
E-mail      : abramov.developer@gmail.com
LinkedIn    : https://www.linkedin.com/in/alexey-abramov-kz/
City        : Christchurch / NewZealand 
Year        : 2020
************************************************************
*/

$(document).ready(function() {

    $(document).on('click', '.show_message', function() {

        if (grecaptcha.getResponse() == '') {
            $("#message").switchClass("d-none", "d-block");
            $('#message').html("Robot verification failed, please try again");
            return false;
        }

        $("#message").switchClass("d-block", "d-none");

        Swal.fire({
            title: 'Sweet!',
            text: 'You have just verified your captcha',
            imageUrl: 'https://lh5.googleusercontent.com/p/AF1QipPOAc3M1ITnASPy0BzHGAIloM5t8OXnuK_vhtHn=w540-h289-p-k-no',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
        })

    });

});

