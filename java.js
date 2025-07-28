//Definición de objeto producto usando constructor
function Producto(id, nombre, categoria, precio) {
  this.id = id;
  this.nombre = nombre;
  this.categoria = categoria;
  this.precio = precio;


//Método para mostrar información del producto
  this.info = function () {
    return `${this.nombre} - ${this.categoria} - $${this.precio}`;
  };
}

//Lista de productos
const productos = [
  new Producto(1, "Notebook HP Victus", "tecnología", 590990),
  new Producto(2, "Celular Samsung A16 128GB", "tecnología", 169990),
  new Producto(3, "Audífonos JBL Wave Flex", "tecnología", 59990),
  new Producto(4, "Parlante JBL Charge 5", "tecnología", 178990),
  new Producto(5, "Mouse Logitech G203", "tecnología", 24990)
];

let carrito = [];

//Función para buscar productos
function buscarProductos() {
  const termino = document.getElementById("product-search").value.toLowerCase();
  const resultados = productos.filter(p =>
    p.nombre.toLowerCase().includes(termino)
  );
  mostrarResultados(resultados);
}

//Mostrar resultados de búsqueda
function mostrarResultados(lista) {
  const contenedor = document.getElementById("results-container");
  contenedor.innerHTML = "";

  if (lista.length === 0) {
    contenedor.innerHTML = "<p>No se encontraron productos.</p>";
    return;
  }

  lista.forEach(p => {
    const div = document.createElement("div");
    div.className = "product-card";

    const form = document.createElement("form");
    form.method = "post";
    form.action = "agregar_carrito.php";

   // Crear título
    const h3 = document.createElement("h3");
    h3.textContent = p.nombre;
    form.appendChild(h3);

    // Categoría
    const pCategoria = document.createElement("p");
    pCategoria.textContent = `Categoría: ${p.categoria}`;
    form.appendChild(pCategoria);

    // Precio
    const pPrecio = document.createElement("p");
    pPrecio.textContent = `Precio: $${p.precio}`;
    form.appendChild(pPrecio);

    // Inputs ocultos
    const inputId = document.createElement("input");
    inputId.type = "hidden";
    inputId.name = "id";
    inputId.value = p.id;
    form.appendChild(inputId);

    const inputNombre = document.createElement("input");
    inputNombre.type = "hidden";
    inputNombre.name = "nombre";
    inputNombre.value = p.nombre;
    form.appendChild(inputNombre);

    const inputPrecio = document.createElement("input");
    inputPrecio.type = "hidden";
    inputPrecio.name = "precio";
    inputPrecio.value = p.precio;
    form.appendChild(inputPrecio);

    // Botón submit
    const submit = document.createElement("input");
    submit.type = "submit";
    submit.value = "Agregar al carrito";
    form.appendChild(submit);

    div.appendChild(form);
    contenedor.appendChild(div);
  });
}


//Mostrar notificaciones
function mostrarNotificacion(mensaje) {
  const noti = document.getElementById("notifications");
  const alerta = document.createElement("div");
  alerta.textContent = mensaje;
  alerta.className = "alerta";

  noti.appendChild(alerta);

  //Eliminar notificación después de 3 segundos
  setTimeout(() => {
    alerta.remove();
  }, 5000);
}

//Evento del botón de búsqueda
document.getElementById("search-button").addEventListener("click", buscarProductos);

//Simular promociones cada 10 segundos
setInterval(() => {
  const promos = [
    "20% de descuento en todo JBL",
    "Envío gratis por compras sobre $70.000",
    "3x2 en Pila Alcalina Duracell AA"
  ];
  const promo = promos[Math.floor(Math.random() * promos.length)];
  mostrarNotificacion(`🎉 ${promo}`);
}, 10000);

