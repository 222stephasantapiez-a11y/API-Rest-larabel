<h1>aqui van los productos listados</h1>

<div id="carrito">

</div>

@foreach( $products as $product)

<ul>
    <li>
        {{ $product->name }}
        <button onclick="agregarAlCarrito({{$product}})" >añadir al carrito</button>
    </li>
</ul>

@endforeach 

<script> 
let carrito = []
function agregarAlCarrito(product){
//verificar si un producto ya existe    
    let posicion= carrito.findIndex(item=> item.id === product.id)
    if(posicion !== -1){
        //Si existe el producto,aumenta la cantidad
        carrito[posicion].cantidad++
    }else{
        //no existe el producto,solo se agrega
        product.cantidad = 1
        carrito.push(product)
    }
   
    console.log (carrito)
    mostrarCarrito();
    
    }
    function mostrarCarrito(){
        let divCarrito = document.getElementById("carrito")
        divCarrito.innerHTML = ''
        
        carrito.map(item =>{
            divCarrito.innerHTML += `<p>${item.name} : ${item.cantidad}</p>`
        });
    }
</script>