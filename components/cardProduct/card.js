$(document).ready(function () {
    $('.cart').click(function () {
        var id = $(this).data('id');
        var cart_id = $(this).data('cart_id');
        console.log('cart_id', cart_id);
        console.log('id', id);
        $.ajax({
            url: 'server/cart/add_to_cart.php',
            type: 'POST',
            data: {
                id: id,
                cart_id: cart_id
            },
            success: function (data) {
                try {
                    const jsonData = JSON.parse(data);

                    // Check if jsonData is an array of objects
                    if (Array.isArray(jsonData) && jsonData.length > 0) {
                        console.log('data is not empty');
                        const idToFind = id;
                        const product = findProductById(jsonData, idToFind);
                        if (product !== null) {
                            const productName = product['name'];
                            const subtotal = jsonData.reduce((acc, item) => acc + item.price * item.quantity, 0).toFixed(3);
                            //fetchCartData();
                            return true;
                        } else {
                            console.log('Product not found in the cart.');
                            // Resto del código para manejar el caso en que el producto no se encuentra en el carrito
                        }
                    } else if (jsonData.status === 'fail') {
                        console.log('data is empty');
                        // Resto del código para mostrar el mensaje de fallo
                    } else {
                        // Otra lógica para manejar otros escenarios
                    }
                } catch (error) {
                    console.error('Error parsing JSON: ', error);
                    // Resto del código para manejar otros escenarios en caso de error
                }
            },
            error: function (data) {
                alert('Error: ' + data);
            }
        });
    });
});

function findProductById(data, id) {
    if (Array.isArray(data)) {
        for (let i = 0; i < data.length; i++) {
            const product = data[i];
            console.log('product', product);
            console.log('id', id.toString());
            if (product['product_id'] == id.toString()) {
                console.log('product', product);
                return product;
            }
        }
    } else if (data.status === 'fail') {
        console.log('Failed to add the product to the cart.');
        return null; // Return null or any other value to indicate failure
    }

    return null; // Return null if the product is not found
}


//ver detalles del producto(navegar hacia la pagina del producto)
$(document).ready(function () {
    $('#detalles').click(function () {
        var id = $(this).data('id');
        console.log('id', id);
        window.location.href = 'http://localhost/whycux/single_product.php?id=' + id;
    });
});
