function fetchCartData() {
    $.ajax({
        url: 'server/cart/fetch_cart_items.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            
          
            const priceElement = document.querySelector('.total');
        

            
            priceElement.textContent = `Total: CRC ${data.reduce((acc, item) => acc + item.price * item.quantity, 0).toFixed(3)}`;

        },
        error: function (error) {
            console.log(error);
        }
    });
}

fetchCartData();