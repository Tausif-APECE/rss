var public_path = $('#PublicPath').val();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $('#email').change(function () {

        var email = $('#email').val();

        $.ajax({

            url: public_path + '/check-email',

            type: 'get',

            data: 'email=' + email,

            success: function (res) {
                if(res.exists){
                    $('#registerBtn').prop('disabled', true);
                    alert('Sorry! This mail is already taken.');
                }else {
                    $('#registerBtn').prop('disabled', false);
                }
            }
        });
    });
});

