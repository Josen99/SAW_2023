$(function () { 
	$('#update_profile').click(function() {
        $('#errore').empty(); //Reset Error Field
        //FETCH INPUT FIELDS
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var DataDiNascita = $('#DataDiNascita').val();
        var Telefono = $('#Telefono').val();
        var Sesso = $('#Sesso').val();
        var Stato = $('#Stato').val();
        var Provincia = $('#Provincia').val();
        var Citta = $('#Citta').val();
        var Indirizzo = $('#Indirizzo').val();
        var Cap = $('#Cap').val();
        var Newsletter =  $("input[name='Newsletter']:checked").val();
        console.log(firstname+' '+lastname+' '+email+' '+DataDiNascita+' '+Telefono+' '+Sesso+' '+Stato+' '+Provincia+' '+Citta+' '+Indirizzo+' '+Cap+' '+Newsletter);
        //DATA VALIDATION
        var regName = /^[a-zA-Z]{2,}$/; //a to z or A to Z, string mi. 2 characters
        var regDate = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/; //date dd/mm/yyyy
        var regPhone = /^[0-9]+\/[0-9]+$/;
        var regMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!regName.test(firstname))
            $('#errore').css('color', 'red').html('Nome non valido');
        else if(!regName.test(lastname))
            $('#errore').css('color', 'red').html('Cognome non valido');
        else if(!regMail.test(email))
            $('#errore').css('color', 'red').html('Email non valida');            
        /*else if(!regDate.test(DataDiNascita))
            $('#errore').css('color', 'red').html('Data di nascita non valida'); 
        else if(!regPhone.test(Telefono))
            $('#errore').css('color', 'red').html('Telefono non valido');  
        else if(!regName.test(Stato))
            $('#errore').css('color', 'red').html('Stato non valido'); 
        else if(!regName.test(Provincia))
            $('#errore').css('color', 'red').html('Provincia non valida'); 
        else if(!regName.test(Citta))
            $('#errore').css('color', 'red').html('Citta non valida'); 
        else if(!regName.test(Indirizzo))
            $('#errore').css('color', 'red').html('Indirizzo non valido'); 
        else if(!regPhone.test(Cap))
            $('#errore').css('color', 'red').html('Cap non valido'); */  
        //AUTH
        else {
            $.ajax({
                url: '../php/update_profile.php',
                type: 'post',
                dataType: 'json',
                data: { firstname:firstname, lastname:lastname, email:email, Sesso:Sesso, DataDiNascita:DataDiNascita, Telefono:Telefono, Stato:Stato, Provincia:Provincia, Citta:Citta, Indirizzo:Indirizzo, Cap:Cap, Newsletter:Newsletter },   
                success: function (data) {
                    if (data.message == 'updated'){
                       $('#errore').css('color', 'green').html("--ACCOUNT-- Profilo aggiornato correttamente");
}
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