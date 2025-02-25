function decreaseQuantity() {
    var quantityInput = document.getElementById('product_stock');
    var currentValue = parseInt(quantityInput.value);

    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
}

function increaseQuantity(maxStock) {
    var quantityInput = document.getElementById('product_stock');
    var currentValue = parseInt(quantityInput.value);

    if (currentValue < maxStock) {
        quantityInput.value = currentValue + 1;
    }
}
