$(function () {

    $('#contact-form').submit(function(e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url: '../assets/php/contact.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {

                if(json.isSuccess) {
                    $('#contact-form').append("<p class='thank-you' style='color:#047df0'>Su mensaje ha sido enviado correctamente. Gracias por contactarme :)</p>");
                    $('#contact-form')[0].reset();
                } else {
                    $('#name + .comments').html(json.nameError);
                    $('#email + .comments').html(json.emailError);
                    $('#phone + .comments').html(json.phoneError);
                    $('#message + .comments').html(json.messageError);
                }
            }
        });
    });

})