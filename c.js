 const carrito = []   
 const Total=[]
let suma = 0;


function guardar() {
    for (let index = 0; index < carrito.length; index++) {
        suma += carrito[index].precio;
        console.log(carrito[index].precio)
    }

    //console.log(suma)
    
    localStorage.setItem("Carrito",JSON.stringify(carrito))
    localStorage.setItem("Total",suma)

    console.log(localStorage.getItem("Total"));

    console.log(JSON.parse(localStorage.getItem('Carrito')))
}

function DWBacon(){
    const ham = carrito.push({ 
        nombre: 'PatataDouble Western Bacon Cheeseburger',
        precio: 130,
        imagen: 'assets/images/demos/demo-4/products/product-1.jpg'})
        window.alert('Se agrego :)')
        console.log(carrito);
}


function Takis(){
    const ham = carrito.push({ 
        nombre: 'Takis Tortillas de Maíz Sabor a Fuego',
        precio: 15,
        imagen: 'assets/images/demos/demo-4/products/product-2.jpg'})
        window.alert('Se agrego :)')
        console.log(carrito);        
}

function Coca235(){
    const ham = carrito.push({ 
    nombre: 'Coca-Cola Original Refresco Lata 235 ml',
    precio: 15,
    imagen: 'assets/images/demos/demo-4/products/product-3.jpg'})
    window.alert('Se agrego :)')
    console.log(carrito);
}
function Coca500(){
    const ham = carrito.push({ 
    nombre: 'Coca Cola Normal De 500 Ml Pet',
    precio: 15,
    imagen: 'assets/images/demos/demo-4/products/product-4.jpg'})
    window.alert('Se agrego :)')
    console.log(carrito);
}

function CR(){
    const ham = carrito.push({ 
    nombre: 'Chilasquiles rojos',
    precio: 40,
    imagen: 'assets/images/demos/demo-4/products/product-5.jpg'})
    window.alert('Se agrego :)')
    console.log(carrito);
}

function CV(){
    const ham = carrito.push({
    nombre: 'Chulaquiles verdes',
    precio: 40,
    imagen: 'assets/images/demos/demo-4/products/product-6.jpg'})
    window.alert('Se agrego :)')
    console.log(carrito);
}

