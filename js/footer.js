$(function () { 
	$('.FButtom').click(function() {
        var fInput = $('.fInput').val();
        $.ajax({
            url: '../php/NewLetter.php',
            type: 'post',
            dataType: 'json',
            data: { fInput:fInput },   
            success: function (data) {
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });
});   