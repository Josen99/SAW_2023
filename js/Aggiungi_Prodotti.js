$(function() {
    $('#add').click(function() {
        $('#errore').empty(); // Reset Error Field
        // Fetch Input Fields
        var descrizione = $('#descrizione').val();
        var marca = $('#marca').val();
        var sesso = $('#sesso').val();
        var tipologia = $('#tipologia').val();
        var prezzo = $('#prezzo').val();

        // Data Validation
        var regName = /^[a-zA-Z0-9]+$/;
        var regNum = /^[0-9]+$/;
        if (!regName.test(descrizione)) 
            $('#errore').css('color', 'red').html('Descrizione non valida , può contenere solo caratteri maiuscoli, minuscoli e numeri');
         else if(!regName.test(marca))
            $('#errore').css('color', 'red').html('Marca non valido , può contenere solo caratteri maiuscoli, minuscoli e numeri');
         else if(!regName.test(sesso))
            $('#errore').css('color', 'red').html('Sesso non valido , può contenere solo caratteri maiuscoli, minuscoli e numeri');
         else if(!regName.test(tipologia))
            $('#errore').css('color', 'red').html('Tipologia non valido , può contenere solo caratteri maiuscoli, minuscoli e numeri'); 
            else if(!regNum.test(prezzo))
            $('#errore').css('color', 'red').html('Prezzo non valido , può contenere solo  numeri');  
        else{
        $.ajax({
            url: '../php/AddProduct.php',
            type: 'post',
            dataType: 'json',
            data: {
                descrizione: descrizione,
                marca: marca,
                sesso: sesso,
                tipologia: tipologia,
                prezzo: prezzo
            },
            success: function(data) {
                if (data.message == 'Prodotto aggiunto con successo')
                    window.location.href = "../php/ProdottiShop.php";
                else
                    $('#errore').css('color', 'red').html(data.message);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
    });
});
