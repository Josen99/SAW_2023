$(function () { 
    list_products();
    function list_products() {
        var products = JSON.parse(localStorage.getItem("products") || "[]");
        var html = "";
        if (products.length > 0) {
            var i = 0;
            var totale = 0;
            products.forEach (product => {
                html += '<tr><th scope="row"><img src="../img/products/'+product.id+'.jpg" width="40"></th>'+
                '<th scope="row">'+product.name+'</th>'+
                '<th scope="row" class="th_mobile">'+product.sex+'</th>'+
                '<th scope="row" class="th_mobile">'+product.brand+'</th>'+
                '<th scope="row" class="th_mobile">'+product.type+'</th>'+
                '<th scope="row">'+product.price+'</th>'+
                '<th scope="row">'+product.num+'</th>'+
                '<th scope="row"><button class="remove_item btn btn-danger" data-count="'+i+'"><i class="fa-solid fa-remove" style="color:white"></i></button></th></tr>';
                totale += product.price*product.num;
                i++;
            });
            $('#list_cart').html(html);
            $('#totale').html('<hr>Totale: '+totale+' Euro');
            $('.remove_item').click(function() {
                var count = $(this).attr('data-count');
                console.log(count);
                var products = JSON.parse(localStorage.getItem("products") || "[]");
                if (products.length)
                   $('#totale').html('');
                products.splice(count, 1); 
                localStorage.setItem("products", JSON.stringify(products));
                $('#list_cart').empty();
                $(".notifications").html(products.length);
                list_products();
            });    
        }
        else 
             $('#list_cart').append('<tr><th colspan="8">Non ci sono prodotti nel carrello</th></tr>');
             
    }
    $('#acquista').click(function() {
        var products = JSON.parse(localStorage.getItem("products"));
        if (products.length > 0) {
            $.ajax({
                url: '../php/acquista.php',
                type: 'post',
                dataType: 'json',
                data: { products: products },   
                success: function (data) {
                    if (data.message === 'success') {
                        $('.errore').css('color', 'green').html('Acquisto effettuato con successo');
                        localStorage.removeItem("products");
                        list_products(); // Update the cart view
                        $(".notifications").html(0); // Set notification count to 0
                    } else if (data.message === 'not_registered') {
                        $('.errore').css('color', 'red').html('Non sei registrato! Per procedere con l\'acquisto registrati <a href="Form_registration.php">qui</a>');
                    } else {
                        $('.errore').css('color', 'red').html('Il tuo acquisto non è andato a buon fine');
                    }
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        } 
    });
     
});   

