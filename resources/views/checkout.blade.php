<h1>CHECKOUT</h1>

<div class="resumen">
    <form action="/procesan" method="post">
        <div id="products">

        </div>
    </form>
</div>

<script>
let carrito = JSON.parse(localStorage.getItem('carrito'))
let divProducts = document.getElementById('products')

carrito.map( product =>{
    divProducts.innerHTML += `<p>${product.cantidad} - ${product.name} - ${product.cantidad * product.price}</p>`
})  
   div
  

</script>