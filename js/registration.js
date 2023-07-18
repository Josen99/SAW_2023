$(function () { 
    $('#register').click(function() {
        $('#errore').empty(); //Reset Error Field
        //FETCH INPUT FIELDS
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var pass = $('#pass').val();
        var confirm = $('#confirm').val();
        //DATA VALIDATION
        var regName = /^[a-zA-Z]{2,}$/; //a to z or A to Z, string mi. 2 characters
        var regMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var regPass=  /^[A-Za-z0-9_.,\-+*!#@?]{7,14}$/; //Password: 7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter 
        if(!regName.test(firstname))
            $('#errore').css('color', 'red').html('Nome non valido');
        else if(!regName.test(lastname))
            $('#errore').css('color', 'red').html('Cognome non valido');
        else if(!regMail.test(email))
            $('#errore').css('color', 'red').html('Email non valida');   
        else if(!regPass.test(pass) )
            $('#errore').css('color', 'red').html('Password non valida');            
        else if(pass != confirm)
            $('#errore').css('color', 'red').html('Le password non corrispondono'); 
        //AUTH
        else {
            $.ajax({
                url: '../php/registration.php',
                type: 'post',
                dataType: 'json',
                data: { firstname:firstname, lastname:lastname, email:email, pass:pass, confirm:confirm },   
                success: function (data) {
                    if (data.message == 'registered')
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