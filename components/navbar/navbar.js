function fetchCartData() {
    $.ajax({
        url: 'server/cart/fetch_cart_items.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Update the quantity and price elements
            const qtyElement = document.querySelector('.qty');
            const priceElement = document.querySelector('.fw-bold');
            const totalElement = document.querySelector('.price');

            const totalPrice = data.reduce((acc, item) => acc + parseFloat(item.PRICE) * parseInt(item.QUANTITY), 0);

            if (!isNaN(totalPrice)) {
                qtyElement.textContent = `${data.length} Producto`;
                priceElement.textContent = `$ ${totalPrice.toFixed(2)}`;
            } else {
                console.log("Error: Invalid data format");
            }

        },
        error: function (error) {
            console.log(error);
        }
    });
}



$(document).ready(function () {
    // Listen for changes in the product name input
    $('#product-name-input').on('input', function () {
        // Retrieve the product name from the input field
        var productName = $(this).val();
        console.log(productName);
        // Send an AJAX request to filter the products by name
        $.ajax({
            type: 'POST',
            url: 'controllers/search.controller.php',
            data: { productName: productName },
            success: function (data) {
                // Update the product list with the filtered products
                const product_id = findProductByName(data, productName)['product_id'];
                console.log(data);
                window.location.href = 'http://localhost/whycux/single_product.php?id=' + product_id;
                // $('#product-list').html('');
                // $.each(data, function (index, product) {
                //     $('#product-list').append('<li>' + product.name + '</li>');
                // });
            }
        });
    });
});

function findProductByName(data, name) {
    let product;
    for (let i = 0; i < data.length; i++) {
        product = JSON.parse(data);
        console.log('product', product);
        console.log('name', name);
        if (product[i]['name'] == name) {
            console.log('product', product[i]);
            return product[i];
        }
    }

    // return null; // Return null if the product is not found
}

// Fetch the cart data every 500 mili seconds
setInterval(fetchCartData, 500);

