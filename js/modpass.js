$(function () { 
    $('#modifPass').click(function() {
        $('#errore').empty(); //Reset Error Field
        //FETCH INPUT FIELDS
        var VecPass = $('#VecPass').val();
        var pass = $('#pass').val();
	  var ConfPass= $('#ConfPass').val();

        //DATA VALIDATION
        var regPass=  /^[A-Za-z0-9_.,\-+*!#@?]{7,14}$/; //Password: 7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter 
	  if(!regPass.test(VecPass))
		$('#errore').css('color', 'red').html('Vecchia Password non valida')   
        else if(!regPass.test(pass) )
            $('#errore').css('color', 'red').html('Nuova Password non valida');            
        else if(pass != ConfPass)
            $('#errore').css('color', 'red').html('Le password non corrispondono'); 

        //AUTH
        else {
            $.ajax({
                url: '../php/ModPass.php',
                type: 'post',
                dataType: 'json',
                data: { VecPass:VecPass, pass:pass, ConfPass:ConfPass },   
                success: function (data) {
                    if (data.message == 'modificated')
                       window.location.href = "../php/show_profile.php";
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