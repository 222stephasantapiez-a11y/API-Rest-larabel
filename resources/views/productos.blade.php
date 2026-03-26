<h1>Aquí van los productos listados</h1>

<h2>🛒 Vista previa del carrito</h2>
<div id="carrito"></div>

@foreach($products as $product)
<ul>
    <li>
        {{ $product->name }} - ${{ $product->price }}

        <button onclick='agregarAlCarrito(@json($product))'>
            Añadir al carrito
        </button>

        <button onclick='eliminarProducto(@json($product))'>
            Eliminar producto
        </button>
    </li>
</ul>
@endforeach

<script>
    let carrito = JSON.parse(localStorage.getItem('carrito'))
    carrito = carrito ? carrito : []

    mostrarCarrito()

    function agregarAlCarrito(product){
        let posicion = carrito.findIndex(item => item.id === product.id)

        if(posicion !== -1){
            carrito[posicion].cantidad++
        } else {
            product.cantidad = 1
            carrito.push(product)
        }

        localStorage.setItem("carrito", JSON.stringify(carrito))
        mostrarCarrito()
    }

    function eliminarProducto(product) {
        let posicion = carrito.findIndex(item => item.id === product.id)

        if (posicion !== -1) {
            carrito[posicion].cantidad--

            if (carrito[posicion].cantidad <= 0) {
                carrito.splice(posicion, 1)
            }
        }

        localStorage.setItem("carrito", JSON.stringify(carrito))
        mostrarCarrito()
    }

    function mostrarCarrito(){
        let divCarrito = document.getElementById("carrito")
        divCarrito.innerHTML = ''

        let total = 0

        carrito.forEach(item => {
            let subtotal = item.price * item.cantidad
            total += subtotal

            divCarrito.innerHTML += `
            <div style="border:1px solid #ccc; margin:10px; padding:10px;">
                <p><strong>${item.name}</strong></p>
                <p>Precio: $${item.price}</p>
                <p>Cantidad: ${item.cantidad}</p>
                <p>Subtotal: $${subtotal}</p>

                <button onclick='eliminarProducto(${JSON.stringify(item)})'>
                    Eliminar
                </button>
            </div>
            `
        })

        divCarrito.innerHTML += `
            <h3>Total a pagar: $${total}</h3>
        `   
          divCarrito.innerHTML += `
            <a href="/checkout">Continuar al Pago<a>
        `
    }
</script>