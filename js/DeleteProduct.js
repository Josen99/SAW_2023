$(document).ready(function() {
    // Delegate the click event to dynamically generated delete buttons
    $(document).on('submit', '.delete-form', function(event) {
        event.preventDefault();

        var Productid = $(this).closest('tr').data('Productid');
        var deleteForm = $(this);

        $.ajax({
            url: deleteForm.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: deleteForm.serialize(),
            success: function(data) {
                if (data.message === 'deleted') {
                    // Remove the deleted row from the table
                    $('[data-Productid="' + Productid + '"]').remove();
                    console.log('Row deleted successfully!');
                } else {
                    console.log('Deletion error:', data.message);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
            
        });
    });
});
