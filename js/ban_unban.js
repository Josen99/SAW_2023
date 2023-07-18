$(function() {
    $('.delete-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission
        var form = $(this);
        var userid = form.find('input[name="userId"]').val();
        var action = form.attr('action');
        var button = form.find('button[type="submit"]');
        
        $.ajax({
            url: action,
            type: 'post',
            dataType: 'json',
            data: { userId: userid },
            beforeSend: function() {
                button.prop('disabled', true).addClass('disabled');
            },
            success: function(data) {
                if (data.message == 'banned') {
                    $('#errore').css('color', 'green').html('User banned successfully.');
                } else if (data.message == 'Unbanned') {
                    $('#errore').css('color', 'green').html('User unbanned successfully.');
                } else {
                    $('#errore').css('color', 'red').html(data.message);
                }
                window.location.href = "../php/UtentiRgistrati.php";
            },
            error: function(request, status, error) {
                alert(request.responseText);
            },
            complete: function() {
                button.prop('disabled', false).removeClass('disabled');
            }
        });
    });
});
