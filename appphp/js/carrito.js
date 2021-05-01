// var articulos = [];

//  Función  recuperada de https://jsfiddle.net/emkey08/zgvtjc51 se 
// encarga de restringir la inserción de letras en el
// elemento de entrada destinado a colocar el valor del impuesto. 
function setInputFilter(textbox, inputFilter) {
    //   Recorre la matriz con todos los valores 
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        //  la variable evento contiene valor de todos los eventos de en la matriz antes 
        // declarada  y obtiene todos los eventos gracias al recorrido del foreach
        textbox.addEventListener(event, function() {
            // dado que  inputFilter es una función residida por 
            // parámetro analizara si es valido el valor 
            // si es devolverá el carácter  de lo contrario  sera falso y  se evalúa el else if
            if (inputFilter(this.value)) {

                //  Establecerá  en antiguo valor usando el valor actual
                this.oldValue = this.value;
                //  Dado que es una secuencia de números ahora la ultima selección sera la primera 
                this.oldSelectionStart = this.selectionStart;
                //  La ultima sera ultima selección sera la actual 
                this.oldSelectionEnd = this.selectionEnd;

                // Por lo que el antiguo valor se mantendrá actualizado  
                // y la selección abarca desde la primera 
                // selección hasta la ultima selección de los números ingresados. 

                //  Evalúa  si el valor tiene una propiedad 
            } else if (this.hasOwnProperty("oldValue")) {
                //  Si el valor no entro en la condición anterior no es un numero  y  
                // el nuevo valor es el antiguo valor del imput

                this.value = this.oldValue;
                //  ESpesifica sede donde hasta donde esta seleccionado el contenido, Dado el uso de 
                // this los paraderos hacen referencia a a todos los dígitos actuales 
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                // this.value = this.value.toFixed(2);
            } else {
                //  Si ninguna se cumple el valor sera cadena vacía 
                this.value = "";
            }
        });
    });
}

setInputFilter(document.getElementById("taxes"), function(value) {
    return /^-?\d*[.,]?\d*$/.test(value);
});
// =======================================================================================

//  función para borrar todos los nodos 
function borra_nodos(argument) {
    //  si tiene primer hijo 
    while (argument.firstChild) {
        //  remueve el ultimo hijo
        argument.removeChild(argument.lastChild);

    }
}

function selecionatr(argument) {
    //  Se seleccionan todos los tr de la tabla 
    let displaydatos =
        document.querySelectorAll("#displaydatos tr");

    for (var i = 0; i < displaydatos.length; i++) {
        //  todos los tr de la tabla tendrán evento click
        displaydatos[i].addEventListener("click", function(argument) {

            //  llamada a función  para cambiar color del tr seleccionado
            cambiacolor(this);

        });

    }

    // Agregar evento al botón numérico para calcular cantidad  de acuerdo a el valor de la cantidad multiplicada por el precio
}

function cambiacolor(fila) {
    //  Función recibe un elemento tr y especifica su color
    if (!(fila.style.backgroundColor == "green")) {

        fila.style.backgroundColor = "green";

    } else if (fila.style.backgroundColor == "green") {

        fila.style.backgroundColor = "#343A40";
    }
    //  Variable matriz para guardar todos los tr  de color verde
    let seleccion = [];
    //----
    //  selecciona el contenedor  donde se generan las tarjetas visuales a de la derecha del programa y borramos sus nodos  pues serán nuevamente generados  para evitar duplicidad de selección de artículos 
    let cartWrap = document.getElementById('cartWrap');
    borra_nodos(cartWrap);
    //----
    // =========================================================================
    // Seleccionamos nuevamente todos los tr existentes  y agregamos a la matriz 
    // selección solo los que están de color verde
    let displaydatos = document.querySelectorAll("#displaydatos tr");

    for (var i = 0; i < displaydatos.length; i++) {
        if (displaydatos[i].style.backgroundColor == "green") {
            seleccion.push(displaydatos[i]);
        }
    }
    // =========================================================================

    //  Variable matriz  donde se guardaran todas las tarjetas generadas 
    let lista = [];
    //  mi entras la selección tenga elementos dentro se ejecutara 
    for (var i = 0; i < seleccion.length; i++) {

        //  se realiza un  push a la matriz de los que devuelve la función "craeatargeta() lo cual se le pasa cada tr almacenado en selección por individual "
        lista.push(craeatargeta(seleccion[i]));

    }
    //  Ahora se agregan como hijos todas las tarjetas generadas 
    for (var i = 0; i < lista.length; i++) {

        cartWrap.appendChild(lista[i]);
    }

    // =================================================================
    // =================================================================
    // ===============================================================
    //  Insertar cantidad tambien 
    // ===============================================================
    datos_compra();
    let compra_qty = document.querySelectorAll(".cartWrap .qty");
    //  Cuando se oprime el botón para cambie=ar la cantidad de artículos que se desean se repite le posesor de borrar todos los input ocultos y generarlos nuevamente 
    for (var i = 0; i < compra_qty.length; i++) {
        compra_qty[i].addEventListener("change", function(argument) {
            let datos_hide = document.querySelector(".datos_hide");
            borra_nodos(datos_hide);
            datos_compra();
        });

    }
    // =================================================================
    // =================================================================
    // ===============================================================
    // ===============================================================
    let btn_qty = document.querySelectorAll(".qty");

    let preciototal = document.querySelectorAll(".prodTotal p");
    let precio_fijo = document.querySelectorAll(".span_precio_fijo");
    //  Al oprimir El botón d e la cantidad que desea el usuario comprar  se establece el 
    //  elemento precio total  nuevamente 
    for (var i = 0; i < btn_qty.length; i++) {

        btn_qty[i].addEventListener("input", function(argument) {

            multiplica(this);
        });
    }
    //  Multiplica el valor del precio por el valor del input
    function multiplica(btn) {
        let precio = 0;
        for (let i = 0; i < preciototal.length; i++) {
            //   Si el  botón de cantidad es igual al que recorriendo la matriz  y coincide procede a  escribir el precio correspondiente en  el elemento correspondiente dado que están en orden ascendente tanto el elemento que representa el precio fijo como el elemento  de precio total
            if (btn_qty[i] == btn) {

                let str = preciototal[i].innerHTML;
                let res = str.replace("$", "");
                let var_precio_fijo = precio_fijo[i].innerHTML;

                var_precio_fijo = var_precio_fijo.replace("x $", "");
                var_precio_fijo = parseFloat(var_precio_fijo);

                precio = parseInt(btn_qty[i].value) * var_precio_fijo;

                console.log(parseInt(btn_qty[i].value));
                console.log(parseFloat(res));
                console.log(preciototal[i]);
                console.log(btn_qty[i]);
                console.log("Precio total =$" + precio.toFixed(2));
                preciototal[i].innerHTML = "$" + precio.toFixed(2);
            }
        }
        fun_subtotal();
        precio = 0;

    }

    fun_subtotal();
    //  Puma todos los valores  de precio total obtenidos  de todas  las tarjetas 
    function fun_subtotal(argument) {
        let subtotal = 0;
        for (var i = 0; i < preciototal.length; i++) {
            // Sumatoria en cadena convirtiendo el valor de tipo cadena a flotante 
            subtotal = subtotal + parseFloat(preciototal[i].textContent.substring(1));

        }

        let subtotalvalue = document.querySelector('.subtotalvalue');

        subtotal = subtotal.toFixed(2);
        subtotalvalue.innerHTML = "$" + subtotal;
        let input_taxes = document.getElementById('taxes');
        //  Cuando  el usuario  deje de presionar la tecla de entrada de valor 
        // se dispara le evento  llamando a la función  que escribe el precio total mas el impuesto 
        input_taxes.addEventListener("keyup", function(argument) {
            //  Llamada a la función "fun_preciototal" cada vez que suceda el evento
            fun_preciototal(subtotal, this.value);
        });

    }

}
//  Recibe dos parámetros el subtotal  y el impuesto, Calcula y establece el precio total 
function fun_preciototal(p_subtotal, p_impuesto) {

    p_impuesto = parseFloat(p_impuesto);
    p_impuesto = p_impuesto.toFixed(2);
    p_impuesto = parseFloat(p_impuesto);
    console.log(p_impuesto);
    let subtotal = p_subtotal;
    let total_display = document.querySelector('.total');
    let inpuesto = 0;
    subtotal = parseFloat(subtotal);
    // Impuesto sera igual a valor introducido como impuesto, multiplicado por el subtotal  y dividido entre 100
    inpuesto = (p_impuesto * subtotal) / 100;

    //  Total mas el impuesto
    let total = subtotal + inpuesto;
    //  Escribir el valor en el elemento seleccionado  para este fin "total_display"
    total_display.innerHTML = "$ " + parseFloat(total.toFixed(2));
}

//  Función encargada de crear las tarjetas  y recibe una fila tr  por parámetro 
function craeatargeta(registro) {

    // =================================================
    //  Estas variables reciben el valor de los hijos  
    // correspondientes a los campos de la fila en la tabla 
    let nombre = registro.childNodes[0].textContent;
    let cantidad = registro.childNodes[5].textContent;
    let precio = registro.childNodes[6].textContent;
    // =================================================
    // ============================

    // variable  Stock  se encarga de almacenar el resultado de la función 
    // "disponiblilidad()" lo cual recibe el numero recuperado guardado en 
    // la variable cantidad  esta variable mostrara en la tarjeta si hay productos disponibles o no 
    let stock = disponiblilidad(cantidad);

    function disponiblilidad(argument) {
        if (argument == 0) {
            return "No disponible";
        } else {
            return "Disponible";
        }
    }
    // ============================
    //  Bloque de código  se encarga de crear los elementos 
    // necesarios para generar la  tarjeta con los datos del 
    // productos. Este poseso contiene creación de elementos y 
    // agrear los hijos a los elementos padre que da estructura a las  tarjeta 

    let lista = document.createElement("LI");
    lista.classList.add("items");
    lista.setAttribute("idjuego", registro.getAttribute("idjuego"));

    let infoWrap = document.createElement("DIV");
    infoWrap.classList.add("infoWrap");

    let cartSection = document.createElement("DIV");
    cartSection.classList.add("cartSection");

    let img = document.createElement("IMG");
    img.classList.add("itemImg");
    img.src = "../img/technics-q-c-300-300-4.jpg";

    let h3 = document.createElement("H3");
    h3.innerHTML = nombre;

    let p1 = document.createElement("P");

    let inputbtn = document.createElement("INPUT");
    inputbtn.classList.add("qty");
    inputbtn.style.width = "60px";
    inputbtn.value = 1;
    inputbtn.max = cantidad;
    inputbtn.min = 0;
    inputbtn.setAttribute("type", "number");

    let p2 = document.createElement("P");
    p2.classList.add("stockStatus");

    let a = document.createElement("A");

    p2.innerHTML = stock;
    let prodTotal = document.createElement("div"); // hijo de cartSection
    prodTotal.classList.add("prodTotal", "cartSection");
    let p3 = document.createElement("p");
    p3.innerHTML = "$" + precio;
    let removeWrap = document.createElement("div"); // hijo de cartSection

    removeWrap.classList.add("cartSection", "removeWrap");
    a.classList.add("remove");
    a.innerHTML = "x";

    lista.appendChild(infoWrap);
    infoWrap.appendChild(cartSection);
    infoWrap.appendChild(prodTotal);
    infoWrap.appendChild(removeWrap);
    cartSection.appendChild(img);
    cartSection.appendChild(h3);
    cartSection.appendChild(p1);
    cartSection.appendChild(p2);
    p1.appendChild(inputbtn);
    let t = document.createElement("SPAN");
    t.classList.add("span_precio_fijo");

    t.innerHTML = "x $" + precio;
    p1.appendChild(t);

    prodTotal.appendChild(p3);
    removeWrap.appendChild(a);

    // devuelve  la tarjeta generada con todas las   
    // propiedades y valores que obtuvo del el tr como parámetro de turno
    return lista;

}

function precios(argument) {

    let displaydatos = document.querySelectorAll("#displaydatos tr");
    let precioproducto = [];
    for (var i = 0; i < displaydatos.length; i++) {
        if (displaydatos[i].style.backgroundColor == "green") {
            precioproducto.push(displaydatos[i].childNodes[6].textContent);
        }
    }
    return precioproducto;
}
// Función genera los input ocultos que contienen los datos necesarios para que el formulario se enviado mediante específicamente en el formulario ubicado en el directorio pag fichero carrito.php en le linea 130
function datos_compra(argument) {

    let compra_idjuego = document.querySelectorAll(".cartWrap [idjuego]");
    let compra_qty = document.querySelectorAll(".cartWrap .qty");

    console.log(compra_idjuego);
    let seleccion = [];
    //  selecciona y agrega todos  los tr en color verde para incorporar los datos  en los input cultos 
    let displaydatos = document.querySelectorAll("#displaydatos tr");

    for (var i = 0; i < displaydatos.length; i++) {
        if (displaydatos[i].style.backgroundColor == "green") {
            seleccion.push(displaydatos[i]);
        }
    }

    let input = [];
    let datos_hide = document.querySelector(".datos_hide");

    for (var i = 0; i < seleccion.length; i++) {
        input.push(document.createElement("input"));
        input[i].setAttribute("type", "hidden");
        // Método para incorporar datos JSON dentro del valor de 
        // un input y ser enviado como post para usar el nombre en el servidor
        input[i].setAttribute("name", "arraydatos['" + i + "']");

        //  Variable formato JSON  dentro de este bucle específica 
        // a cada input generado cual sera el valor del mismo
        let dato = {
            "idjuego": compra_idjuego[i].getAttribute("idjuego"),
            "qty": compra_qty[i].value,

        }
        //  Establece el valor JSON  como una cadena 
        let myJSON = JSON.stringify(dato);

        input[i].setAttribute("value", myJSON);

    }
    //  se agregan todos los input generados al contenedor  de turno.
    for (var i = 0; i < input.length; i++) {
        datos_hide.appendChild(input[i]);
    }

}

selecionatr();