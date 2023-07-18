const toggleMenu = () => {
    document.body.classList.toggle("open");
};

//Gestione search bar
var search = document.getElementById("search-icon");
var searchbarForm = document.getElementById("searchbar-form");

//Numero di oggetti sul carrello
$(function () { 
    var products = JSON.parse(localStorage.getItem("products") || "[]");
    $(".notifications").html(products.length);
});
