$(document).ready(function () {
    $('.list-group-item').click(function () {
        var category_id = $(this).data('category-id');
        var url = 'products.php?category_id=' + category_id;

        $.ajax({
            //url: url,
            type: 'GET',
            success: function (response) {
                // Replace the product list with the new content returned by the server
                windows.location.href = 'http://localhost/tienda/' + url;
                console.log('success');
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.log(error);
            }
        });
    });
});