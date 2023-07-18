$(function () { 
	$('.add_market').click(function() {
        var id = $(this).attr("data-product");
        var name = $(this).parent().parent().children().eq(1).children().html();
        var sex = $(this).parent().parent().children().eq(2).html();
        var brand = $(this).parent().parent().children().eq(3).html();
        var type = $(this).parent().parent().children().eq(4).html();
        var price = $(this).parent().parent().children().eq(5).html();
        var num = $(this).attr("data-num");
        console.log(num);
        //Read data from localStorage
        var products = JSON.parse(localStorage.getItem("products") || "[]");
        //Push data to products
        products.push({id:id, name: name, sex: sex, brand: brand, type: type, price: price, num:num});
        console.log(products);
        //Store 
        localStorage.setItem("products", JSON.stringify(products));
        $(".notifications").html(products.length);
    });    
    $('.fa-plus').click(function() {
        var num = $(this).prev().text();
        $(this).prev().html(++num);
        $(this).parent().next().children().attr('data-num', num);
    });
    $('.fa-minus').click(function() {
        var num = $(this).next().text();
        if (num > '1') {
            $(this).next().html(--num);
            $(this).parent().next().children().attr('data-num', num);
        }    
        else {
            $('#totale').empty();
        }
    });
});   