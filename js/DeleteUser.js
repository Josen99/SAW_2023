$(document).ready(function() {
    // Delegate the click event to dynamically generated delete buttons
    $(document).on('click', '.delete-user-btn', function(event) {
        event.preventDefault();
        var userId = $(this).closest('tr').data('userid');
        var deleteForm = $(this).closest('.delete-form');

        $.ajax({
            url: deleteForm.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: deleteForm.serialize(),
            success: function(data) {
                if (data.message === 'modificated') {
                    // Remove the deleted row from the table
                    $('[data-userid="' + userId + '"]').remove();
                } else {
                    $('#errore').css('color', 'red').html(data.message);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });
});