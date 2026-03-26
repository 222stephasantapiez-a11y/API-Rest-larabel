<h1>CHECKOUT</h1>

<form action="/checkout" method="POST">
    @csrf

    <div id="products"></div>

    <button type="submit">Finalizar compra</button>
</form>

<script>
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    let divProducts = document.getElementById('products');

    carrito.forEach(item => {

        divProducts.innerHTML += `
            <p>
                ${item.name} - Cantidad: ${item.cantidad} - Precio: $${item.price}
            </p>
            <input type="hidden" name="product_id[]" value="${item.id}">
            <input type="hidden" name="price[]" value="${item.price}">
            <input type="hidden" name="cantidad[]" value="${item.cantidad}">
        `;
    });
</script>