var public_path = $('#PublicPath').val();

$("#email").change(function() {
  alert('Balh blah');
var email = $('#email').val();
$.ajax({
           url: public_path + '/check-email',
           type: 'get',
           data: 'email=' + email,
           success: function (result) {

               }
       });
   });
