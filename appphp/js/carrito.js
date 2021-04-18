var articulos = [];

function remueveitem(argument) {
    console.log('ok');
    let remueve = document.querySelectorAll(".removeWrap");

    for (var i = 0; i < remueve.length; i++) {
        remueve[i].addEventListener("click", function(event) {
            event.preventDefault();
            this.parentElement.
            parentElement.classList.
            add("toggle-content");
            console.log(this.parentElement.parentElement.classList);
            console.log(this.parentElement.parentElement);
        });
    }

}
remueveitem();
//  Función  recuperada de  https://jsfiddle.net/emkey08/zgvtjc51
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                // this.value = this.value.toFixed(2);
            } else {
                this.value = "";
            }
        });
    });
}

setInputFilter(document.getElementById("taxes"), function(value) {
    return /^-?\d*[.,]?\d*$/.test(value);
});
// =======================================================================================

function borra_nodos(argument) {

    while (argument.firstChild) {

        argument.removeChild(argument.lastChild);

    }
}

function selecionatr(argument) {

    let displaydatos = document.querySelectorAll("#displaydatos tr");

    for (var i = 0; i < displaydatos.length; i++) {

        displaydatos[i].addEventListener("click", function(argument) {
            // console.log(this);
            // this.style.backgroundColor = "red";
            // console.log(this.getAttribute("idjuego"));
            cambiacolor(this);

        });

        // console.log(displaydatos[i]);
    }

    // Agrtegar evento al boton numerico para calcular cantiodad  de acuerdo a el valor de la cantidad multimpicada port el precio
}

function cambiacolor(fila) {

    if (!(fila.style.backgroundColor == "green")) {
        fila.style.backgroundColor = "green";
    } else if (fila.style.backgroundColor == "green") {
        fila.style.backgroundColor = "#343A40";
    }

    let seleccion = [];
    let cartWrap = document.getElementById('cartWrap');
    borra_nodos(cartWrap);
    let displaydatos = document.querySelectorAll("#displaydatos tr");
    for (var i = 0; i < displaydatos.length; i++) {
        if (displaydatos[i].style.backgroundColor == "green") {
            seleccion.push(displaydatos[i]);
        }
    }

    //  posible funcion
    let lista = [];
    for (var i = 0; i < seleccion.length; i++) {

        lista.push(craeatargeta(seleccion[i]));

        // console.log(seleccion[i].childNodes);
    }

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

    // for (var i = 0; i < preciototal.length; i++) {
    //     var str = preciototal[i].innerHTML;

    //     var res = str.replace("$", "");
    //     console.log('Precio total targeta');
    //     console.log(parseFloat(res));
    //     console.log(preciototal[i]);
    //     console.log(btn_qty[i]);
    //     console.log('Precio total targeta');
    // }

    // console.log(preciototal);
    for (var i = 0; i < btn_qty.length; i++) {

        btn_qty[i].addEventListener("input", function(argument) {
            // console.log(this.value);

            multiplica(this);
        });
    }

    function multiplica(btn) {
        let precio = 0;
        for (let i = 0; i < preciototal.length; i++) {
            if (btn_qty[i] == btn) {

                let str = preciototal[i].innerHTML;
                let res = str.replace("$", "");
                let var_precio_fijo = precio_fijo[i].innerHTML;

                var_precio_fijo = var_precio_fijo.replace("x $", "");
                var_precio_fijo = parseFloat(var_precio_fijo);

                precio = parseInt(btn_qty[i].value) * var_precio_fijo;
                // console.log(parseFloat(precio_fijo[i].innerHTML.replace("x $", ""));
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
        console.log("===============================");
        // for (var i = 0; i < precio_fijo.length; i++) {

        // }
    }
    fun_subtotal();

    function fun_subtotal(argument) {
        let subtotal = 0;
        for (var i = 0; i < preciototal.length; i++) {

            subtotal = subtotal + parseFloat(preciototal[i].textContent.substring(1));
            // console.log(parseFloat(preciototal[i].textContent.substring(1)));
        }
        // console.log("subtotal");
        // console.log(subtotal);
        // console.log("subtotal");
        let subtotalvalue = document.querySelector('.subtotalvalue');

        subtotal = subtotal.toFixed(2);
        subtotalvalue.innerHTML = "$" + subtotal;
        let input_taxes = document.getElementById('taxes');
        input_taxes.addEventListener("keyup", function(argument) {
            fun_preciototal(subtotal, this.value);
        });
        // input_taxes.addEventListener("keydown", function(argument) {
        //     fun_preciototal(subtotal, this.value);
        // });
        // let x = parseFloat((0.11 / subtotal) + subtotal);
        // x = x.toFixed(2);
        // total_display.innerHTML = "$" + x;
    }

}
//  TODO
function fun_preciototal(p_subtotal, p_impuesto) {
    p_impuesto = parseFloat(p_impuesto);
    p_impuesto = p_impuesto.toFixed(2);
    p_impuesto = parseFloat(p_impuesto);
    console.log(p_impuesto);
    let subtotal = p_subtotal;
    let total_display = document.querySelector('.total');
    let inpuesto = 0;
    subtotal = parseFloat(subtotal);

    inpuesto = (p_impuesto * subtotal) / 100;
    // inpuesto = (p_impuesto * subtotal);
    console.log(inpuesto);
    let total = subtotal + inpuesto;
    // amount + (taxPercent * amount);
    console.log('impuesto');
    console.log(inpuesto);
    console.log('impuesto');
    console.log("subtotal");
    console.log(subtotal);
    console.log("subtotal");
    console.log("total");
    console.log(parseFloat(total.toFixed(2)));
    console.log("total");

    total_display.innerHTML = "$ " + parseFloat(total.toFixed(2));
}

function craeatargeta(registro) {

    //  0 ,5, 6
    let nombre = registro.childNodes[0].textContent;
    let cantidad = registro.childNodes[5].textContent;
    let precio = registro.childNodes[6].textContent;
    // let cantidad = registro.childNodes[5].textContent;
    let stock = disponiblilidad(cantidad);

    function disponiblilidad(argument) {
        if (argument == 0) {
            return "No disponible";
        } else {
            return "Disponible";
        }
    }

    // misdatos = registro;

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
    // inputbtn.placeholder = cantidad;
    // inputbtn.value = cantidad;

    // let removeWrap = document.createElement("div"); // hijo de cartSection

    let a = document.createElement("A");

    // removeWrap.appendChild(a);
    // let p2 = document.createElement("P");
    p2.innerHTML = stock;
    let prodTotal = document.createElement("div"); // hijo de cartSection
    prodTotal.classList.add("prodTotal", "cartSection");
    let p3 = document.createElement("p");
    p3.innerHTML = "$" + precio;
    let removeWrap = document.createElement("div"); // hijo de cartSection
    // let a = document.createElement("A");
    removeWrap.classList.add("cartSection", "removeWrap");
    a.classList.add("remove");
    a.innerHTML = "x";

    lista.appendChild(infoWrap);
    infoWrap.appendChild(cartSection);
    // infoWrap.appendChild(cartSection);
    infoWrap.appendChild(prodTotal);
    infoWrap.appendChild(removeWrap);
    cartSection.appendChild(img);
    cartSection.appendChild(h3);
    cartSection.appendChild(p1);
    cartSection.appendChild(p2);
    p1.appendChild(inputbtn);
    let t = document.createElement("SPAN");
    t.classList.add("span_precio_fijo");
    // let t = document.createTextNode("x $" + precio);
    t.innerHTML = "x $" + precio;
    p1.appendChild(t);
    // p1.innerHTML = ;
    // cartSection.appendChild(img);
    prodTotal.appendChild(p3);
    removeWrap.appendChild(a);

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

function datos_compra(argument) {
    let compra_idjuego = document.querySelectorAll(".cartWrap [idjuego]");
    let compra_qty = document.querySelectorAll(".cartWrap .qty");

    console.log(compra_idjuego);
    let seleccion = [];
    // let cartWrap = document.getElementById('cartWrap');
    // borra_nodos(cartWrap);
    let displaydatos = document.querySelectorAll("#displaydatos tr");
    for (var i = 0; i < displaydatos.length; i++) {
        if (displaydatos[i].style.backgroundColor == "green") {
            seleccion.push(displaydatos[i]);
        }
    }

    // articulos = [];
    // let data_temp = [];
    // let nombre = "dato";
    let input = [];
    let datos_hide = document.querySelector(".datos_hide");

    for (var i = 0; i < seleccion.length; i++) {
        input.push(document.createElement("input"));
        input[i].setAttribute("type", "hidden");
        input[i].setAttribute("name", "arraydatos['" + i + "']");

        let dato = {
            "idjuego": compra_idjuego[i].getAttribute("idjuego"),
            "qty": compra_qty[i].value,

        }
        let myJSON = JSON.stringify(dato);
        // let myJSON = dato;
        input[i].setAttribute("value", myJSON);

    }

    console.log(input);

    for (var i = 0; i < input.length; i++) {
        datos_hide.appendChild(input[i]);
    }

}

selecionatr();

// comprar();

// console.log('');