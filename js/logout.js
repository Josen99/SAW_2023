$(function () { 
    $('#logout').click(function() {
        $.ajax({
            url: '../php/logout.php',
            type: 'post',       
            success: function (data) {
                window.location.href = "../php/index.php";
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        window.localStorage.clear();
    });        
}); 