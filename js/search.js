$(function () { 
	$('#search').keyup(function() {
        $("#product_list").empty();
        var html = "";
        var search = $(this).val();
        if (search.length > 2) {
            $.ajax({
                url: '../php/search.php',
                type: 'post',
                dataType: 'json',
                data: { search:search },   
                success: function (data) {
                    data.forEach(product => {
                        $("#product_list").append('<li class="list-group-item"><b>'+product.descrizione.toUpperCase()+'</b> '+product.sesso+' <b style="color:blue">'+product.marca+'</b> Prezzo: '+product.prezzo+'euro <a style="width: 30px" href="prodotti.php?prodotto='+product.id+'"><i class="fa fa-arrow-right"></i></a></li>'); 
                    });
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    });    
});   