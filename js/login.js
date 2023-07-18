$(function () { 
    count = 0;
	$('#login').click(function() {
        var email = $('#email').val();
        var pass = $('#pass').val();
        //DATA VALIDATION
        var regMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var regPass=  /^[A-Za-z0-9_.,\-+*!#@?]{7,14}$/; //Password: 7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter 
        if(!regMail.test(email) || !regPass.test(pass) )
            $('#errore').css('color', 'red').html('Credenziali non valide');        
        else { 
            //AUTH
            $.ajax({
                url: '../php/login.php',
                type: 'post',
                dataType: 'json',
                data: { email:email, pass:pass },   
                success: function (data) {
                    if (data.message == 'logged')
                       window.location.href = "../php/index.php";
                    else
				$('#errore').css('color', 'red').html(data.message);
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }    
    });    
});   