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

document.addEventListener('click', function(event) {

    // Make sure clicked element is our toggle
    if (!event.target.classList.contains('toggle')) return;

    // Prevent default link behavior
    event.preventDefault();

    // Get the content
    var content = document.querySelector(event.target.hash);
    if (!content) return;

    // Toggle the content
    toggle(content);

}, false);
const server = "../php/php.php";

function navegacion(data) {
    var record = data.slice(0, 6);

    return record;

}
Object.size = function(obj) {
    var size = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function borra_nodos(argument) {

    while (argument.firstChild) {

        argument.removeChild(argument.lastChild);

    }
}

function devuelveinventario(argument) {
    $.post(server, {
        fun: 'devuelveinventario'
    }, function(respuesta) {
        respuesta = JSON.parse(respuesta);
        console.log(respuesta);
        // registros = respuesta;

        // =============================

        // Manejo  del la longitud de las filas del a tabla 
        // Nota Guardar todos los datos  para luego usar esta funcion  y desplegar solo los quie deseamos 
        // let data = navegacion(respuesta);
        let data = respuesta;
        // =============================

        let paguinas = respuesta.length / 10;
        let residuo = respuesta.length % 10;

        console.log(paguinas);
        console.log(residuo);

        var size = Object.size(respuesta[0]);
        console.log("size = " + size);
        let fila = [];
        let att = [];

        let displaydatos = document.getElementById('displaydatos');

        borra_nodos(displaydatos);

        for (var i = 0; i < data.length; i++) {

            fila.push(document.createElement("tr"));
            let registro = [];

            for (var j = 0; j < Object.size(data[i]) - 1; j++) {

                registro.push(document.createElement("td"));

            }

            // let btneditar = document.createElement("BUTTON");
            // btneditar.innerHTML = "Editar";
            // let btborrar = document.createElement("BUTTON");
            // btborrar.innerHTML = "Bottar";

            att.push(document.createAttribute("idjuego"));
            att[i].value = data[i]['idjuego'];
            registro[0].innerHTML = data[i]['nombre'];
            registro[1].innerHTML = data[i]['estado'];
            registro[2].innerHTML = data[i]['cnombre'];
            registro[3].innerHTML = data[i]['fecha'];
            registro[4].innerHTML = data[i]['pnombre'];
            registro[5].innerHTML = data[i]['cantidad'];
            registro[6].innerHTML = data[i]['precio'];
            // registro[7].appendChild((function() {
            //     let btn = document.createElement("BUTTON");
            //     let att = document.createAttribute("class"); // Create a "class" attribute
            //     att.value = "btn btn-warning editar";
            //     btn.setAttributeNode(att);
            //     btn.innerHTML = "Editar";
            //     return btn;
            // }()));
            // registro[8].appendChild((function() {
            //     let btn = document.createElement("BUTTON");
            //     let att = document.createAttribute("class"); // Create a "class" attribute
            //     att.value = "btn btn-danger borrar";
            //     btn.setAttributeNode(att);
            //     btn.innerHTML = "Borrar";
            //     return btn;
            // }()));

            for (var z = 0; z < registro.length; z++) {

                fila[i].appendChild(registro[z]);

            }
            fila[i].setAttributeNode(att[i]);
        }

        for (var i = 0; i < fila.length; i++) {
            displaydatos.appendChild(fila[i]);
        }
        // $('#example').DataTable({
        //     "pagingType": "full_numbers"
        // });
        selecionatr();

        // prueba();
    });

}

function selecionatr(argument) {

    let displaydatos = document.querySelectorAll("#displaydatos tr");

    for (var i = 0; i < displaydatos.length; i++) {

        displaydatos[i].addEventListener("click", function(argument) {

            // this.style.backgroundColor = "red";
            console.log(this.getAttribute("idjuego"));
            cambiacolor(this);

        });

        // console.log(displaydatos[i]);
    }

    function cambiacolor(argument) {

        if (!(argument.style.backgroundColor == "green")) {
            argument.style.backgroundColor = "green";
        } else if (argument.style.backgroundColor == "green") {
            argument.style.backgroundColor = "#343A40";
        }

        let seleccion = [];
        let cartWrap = document.getElementById('cartWrap');
        borra_nodos(cartWrap);

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

        console.log(seleccion);
        // console.log(seleccion);
        // let lista = [];
        // let infoWrap = [];
        // for (var i = 0; i < seleccion.length; i++) {
        //     lista.push(document.createElement("li"));
        //     lista[i].classList.add("items");
        // }
        // for (var i = 0; i < lista.length; i++) {
        //     infoWrap.push(document.createElement("DIV"));
        //     infoWrap[i].classList.add("infoWrap");
        //     lista[i].appendChild(infoWrap[i]);
        //     cartWrap.appendChild(lista[i]);
        // }
        // let infoWrapnodes = [];

        // for (var i = 0; i <= 2; i++) {
        //     infoWrapnodes.push(document.createElement("DIV"));

        //     if (i == 0) {
        //         // =============================================
        //         //  Insercion de los 4 hijos nesesarios para foto precio y total
        //         // ============================================
        //         infoWrapnodes[i].classList.add("cartSection");

        //         for (var j = 0; j <= 3; j++) {
        //             if (j == 0) {
        //                 let img = document.createElement("IMG");
        //                 img.classList.add("itemImg");
        //             } else if (j == 1) {

        //             } else if (j == 2) {

        //             } else if (j == 3) {

        //             }
        //         }
        //         // =============================================
        //         // ============================================
        //     } else if (i == 1) {
        //         infoWrapnodes[i].classList.add("prodTotal", "cartSection");
        //         let price = document.createElement("P");
        //         price.innerHTML = "$ 3.99";
        //         infoWrapnodes[i].appendChild(price);
        //     } else if (i == 2) {
        //         infoWrapnodes[i].classList.add("cartSection", "removeWrap");
        //         let btnremove = document.createElement("A");
        //         btnremove.innerHTML = "x";
        //         btnremove.classList.add("remove");
        //         infoWrapnodes[i].appendChild(btnremove);

        //     }
        // }

        // for (var i = 0; i < lista.length; i++) {

        //     for (var j = 0; j <= 3; j++) {

        //     }

        //     // infoWrap[i].appendChild(infoWrapnodes[0]);
        //     // infoWrap[i].appendChild(infoWrapnodes[1]);
        //     // infoWrap[i].appendChild(infoWrapnodes[2]);

        // }

        // console.log(infoWrap);

    }
    // body... 
}
devuelveinventario();
// selecionatr();

function craeatargeta(registro) {

    //  0 ,5, 6
    let nombre = registro.childNodes[0].textContent;
    let cantidad = registro.childNodes[5].textContent;
    let precio = "$ " + registro.childNodes[6].textContent;
    let stock = 'temporal';

    // misdatos = registro;

    let lista = document.createElement("LI");
    lista.classList.add("items");
    let infoWrap = document.createElement("DIV");
    infoWrap.classList.add("infoWrap");
    let cartSection = document.createElement("DIV");
    cartSection.classList.add("cartSection");
    let img = document.createElement("IMG");
    img.classList.add("itemImg");
    let h3 = document.createElement("H3");
    h3.innerHTML = nombre;
    let p1 = document.createElement("P");
    let inputbtn = document.createElement("INPUT");
    inputbtn.classList.add("qty");
    inputbtn.placeholder = "3";
    p1.appendChild(inputbtn);

    let p2 = document.createElement("P");
    let prodTotal = document.createElement("div"); // hijo de cartSection
    let p3 = document.createElement("p");
    let removeWrap = document.createElement("div"); // hijo de cartSection
    let a = document.createElement("A");

    lista.appendChild(infoWrap);

    infoWrap.appendChild(cartSection);
    infoWrap.appendChild(cartSection);

    infoWrap.appendChild(prodTotal);
    infoWrap.appendChild(removeWrap);
    cartSection.appendChild(img);
    cartSection.appendChild(h3);
    cartSection.appendChild(p1);
    p1.appendChild(inputbtn);
    cartSection.appendChild(p2);
    cartSection.appendChild(img);
    prodTotal.appendChild(p3);
    removeWrap.appendChild(a);

    lista.classList.add("items");
    lista.childNodes[0];
    lista.childNodes[0].childNodes[0].classList.add("cartSection");
    lista.childNodes[0].childNodes[0].childNodes[0].classList.add("1");
    lista.childNodes[0].childNodes[0].childNodes[0].innerHTML = nombre;
    lista.childNodes[0].childNodes[0].childNodes[1].classList.add("2");

    lista.childNodes[0].childNodes[0].childNodes[1].childNodes[0].classList.add("qty");
    // lista.childNodes[0].childNodes[0].childNodes[1].textContent = cantidad;
    lista.childNodes[0].childNodes[0].childNodes[2].classList.add("stockStatus");
    lista.childNodes[0].childNodes[0].childNodes[2].innerHTML = stock;

    // lista.childNodes[0].childNodes[0].childNodes[2].innerHTML = stock;
    //  rec0ordar src de la imagen
    lista.childNodes[0].childNodes[0].childNodes[3].classList.add("itemImg");
    lista.childNodes[0].childNodes[0].childNodes[3].src = "../img/technics-q-c-300-300-4.jpg";;

    //  rec0ordar src de la imagen
    lista.childNodes[0].childNodes[1].childNodes[0].innerHTML = precio;
    lista.childNodes[0].childNodes[1].classList.add("prodTotal", "cartSection");

    lista.childNodes[0].childNodes[2].classList.add("cartSection", "removeWrap");
    lista.childNodes[0].childNodes[2].innerHTML = "x";

    // lista.childNodes[0].childNodes[0].childNodes.add("infoWrap");

    // lista.childNodes[0].childNodes[0].childNodes[0].childNodes.add("cartSection");

    // lista.childNodes[0].childNodes[0].childNodes[1].childNodes.add("prodTotal", "cartSection");
    // lista.childNodes[0].childNodes[0].childNodes[2].childNodes.add("cartSection", "removeWrap");

    // lista.childNodes[0].childNodes[1].childNodes;
    // lista.childNodes[0].childNodes[1].childNodes[0].childNodes;

    console.log(lista);

    // let variable = " Pepe compro";

    // console.log('<div class=\"infoWrap\"><div class=\"cartSection\"><h3 class=\"1\">' + variable + ' variable</h3><p class=\"2\"><input class=\"qty\"></p><p class=\"3\">In Stock</p><img class=\"itemImg\"></div><div class=\"prodTotal cartSection\"><p>$15.00</p></div><div class=\"cartSection removeWrap\"><a></a></div></div>');
    console.log(lista.childNodes);
    console.log(lista.childNodes[0].childNodes);

    console.log(lista.childNodes[0].childNodes[0].childNodes);

    console.log(lista.childNodes[0].childNodes[0].childNodes[0].childNodes);
    console.log(lista.childNodes[0].childNodes[0].childNodes[1].childNodes);
    console.log(lista.childNodes[0].childNodes[0].childNodes[2].childNodes);
    console.log(lista.childNodes[0].childNodes[0].childNodes[3].childNodes);

    console.log(lista.childNodes[0].childNodes[1].childNodes);
    console.log(lista.childNodes[0].childNodes[1].childNodes[0].childNodes);

    console.log(lista.childNodes[0].childNodes[2].childNodes);
    console.log(lista.childNodes[0].childNodes[2].childNodes[0].childNodes);

    return lista;

}

// craeatargeta();