function fetchCartData() {
    $.ajax({
        url: 'server/cart/fetch_cart_items.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Update the quantity and price elements
            const totalElement = document.querySelector('.total-price'); // Select the element with the class "total-price"
            const totalHiddenInput = document.getElementById('totalHidden'); // Select the hidden input element

            const totalPrice = data.reduce((acc, item) => acc + parseFloat(item.PRICE) * parseInt(item.QUANTITY), 0);

            if (!isNaN(totalPrice)) {
                totalElement.textContent = `$ ${totalPrice.toFixed(2)}`; // Update the total price in the "total-price" element
                totalHiddenInput.value = totalPrice.toFixed(2); // Update the value of the hidden input
            } else {
                console.log("Error: Invalid data format");
            }


        },
        error: function (error) {
            console.log(error);
        }
    });
}

fetchCartData();



  