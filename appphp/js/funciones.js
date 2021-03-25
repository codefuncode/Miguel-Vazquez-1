var accioin = "";
const server = "php.php";

//  Se utiliza para eliminar todos los nodos 
// donde debamos generar elementos dinámicos 
function borra_nodos(argument) {

    while (argument.firstChild) {

        argument.removeChild(argument.lastChild);

    }
}
// Petición al servidor de los datos  que  
// llenan los elementos select de la aplicación
function getdata(argument) {

    //  función de la librería Jqueri para hacer peticiones al servidor 
    $.post(server, {
        fun: 'clasificacion'
    }, function(respuesta) {

        //  Selección del elemento html que mostrara los datos 
        let clasificacion = document.getElementById("clasificacion");
        let option = [];

        borra_nodos(clasificacion);

        respuesta = JSON.parse(respuesta);

        console.log(respuesta);
        // Bucle  para agregar los elementos option necesarios  e incorporarlos como hijos del elemento seleccionado 

        for (var i = 0; i < respuesta.length; i++) {

            option.push(document.createElement("OPTION"));
            option[i].value = respuesta[i]['idclasificacion'];
            option[i].innerHTML = respuesta[i]['nombre'];
            clasificacion.appendChild(option[i]);
        }

    }).always(function() {

        $.post(server, {
            fun: 'plataforma'
        }, function(respuesta) {

            let plataforma = document.getElementById("plataforma");
            let option = [];
            borra_nodos(plataforma);
            respuesta = JSON.parse(respuesta);
            console.log(respuesta);
            for (var i = 0; i < respuesta.length; i++) {

                option.push(document.createElement("OPTION"));
                option[i].value = respuesta[i]['idplataforma'];
                option[i].innerHTML = respuesta[i]['nombre'];
                plataforma.appendChild(option[i]);
            }

        });
    });
    //  función de la librería Jqueri para hacer peticiones al servidor 

}

function guardar(argument) {
    //  Selección del botón para guardar
    let guardar =
        document.querySelector("#guardar");

    guardar.addEventListener("click", function(argument) {

        //  Selección de todos los elementos de  entrada del formulario
        let nombre =
            document.querySelector("#nombre");
        let estado1 =
            document.querySelector("#estado1");
        let estado2 =
            document.querySelector("#estado2");
        let clasificacion =
            document.querySelector("#clasificacion");
        let fecha =
            document.querySelector("#fecha");
        let plataforma =
            document.querySelector("#plataforma");
        let cantidad =
            document.querySelector("#cantidad");
        let precio =
            document.querySelector("#precio");

        let estado;
        //  Verificación de input radio  y su estado
        if (estado1.checked) {

            estado = estado1.value;

        } else if (estado2.checked) {

            estado = estado2.value;
        } else {
            estado = "";
        }
        // Matriz  con todos los valores recuperados para  
        // comprobar si existe alguno vacío
        let datos = [
            nombre.value,
            estado,
            fecha.value,
            clasificacion.value,
            plataforma.value,
            cantidad.value,
            precio.value
        ]
        //  Variable que incrementa  por cada campo vacío
        let camposvacios = 0;

        for (var i = 0; i < datos.length; i++) {

            if (!datos[i] ||
                datos[i].length == 0 ||
                datos[i] == null ||
                datos[i] == undefined ||
                datos[i] == "") {

                camposvacios++;

            } else {

            }
        }
        // console.log(camposvacios);

        if (camposvacios == 0) {

            let datos = {
                'fun': "guardar",
                "nombre": nombre.value,
                "estado": estado,
                "idclasificacion": clasificacion.value,
                "fecha": fecha.value,
                "idplataforma": plataforma.value,
                "cantidad": cantidad.value,
                "precio": precio.value,
            }

            console.log('JSON =======================');
            console.log(datos);
            console.log('JSON =======================');

            $.post(server, datos, function(respuesta) {

                respuesta = JSON.parse(respuesta);
                console.log(respuesta['respuesta']);

                if (respuesta['respuesta'] == "si") {

                    swal({
                        title: "Registro insertado ",
                        icon: "success",
                    });
                    // devuelveinventario();
                } else if (respuesta['respuesta'] == "no") {
                    swal({
                        title: "Error del servidor",
                        icon: "error",
                    });
                }

            });

        } else {

            swal({
                title: "Verifique los campos vacíos",
                icon: "error",
            });

        }

        console.log(datos);

    });
}
// var registros;

// https://stackoverflow.com/questions/25434813/simple-pagination-in-javascript#25435422

function borracampos(argument) {
    let campos =
        document.querySelectorAll('[type="radio"], [type="number"], [type="text"]');

    for (var i = 0; i < campos.length; i++) {

        if (campos[i].getAttribute("type") == "radio") {
            campos[i].checked = false;
        } else {
            campos[i].value = "";
        }

    }
}

// ==========================================================
Object.size = function(obj) {
    var size = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function navegacion(data) {
    var record = data.slice(0, 6);

    return record;

}

function prueba(argument) {

    let btn = document.querySelectorAll("tbody tr td > button");

    for (var i = 0; i < btn.length; i++) {
        // console.log(btn[i]);
        btn[i].addEventListener("click", function(argument) {

            // console.log(this.classList.contains('borrar'));
            // console.log(this.classList.contains('editar'));

            if (this.classList.contains('borrar')) {
                accioin = "borrar";
            } else if (this.classList.contains('editar')) {
                accioin = "editar";

                let id = this.parentElement.parentElement.getAttribute("idjuego");

                let valor =
                    "[idjuego=" + '"' + id + '"] > td';

                let campos = document.querySelectorAll(valor);
                // console.log(campos);

                for (var i = 0; i < campos.length; i++) {
                    if (i == 0) {
                        let valor = campos[i].textContent.trim();
                        console.log(valor);
                        let nombre = document.getElementById("nombre");
                        nombre.value = valor;
                        // console.log(campos[i].textContent);
                    } else if (i == 1) {
                        let estado = document.querySelectorAll("[name='estado']");

                        let valor = campos[i].textContent.trim();
                        console.log(valor);

                        // for (var j = 0; j < estado.length; j++) {
                        //     if (estado[j] == valor) {
                        //         estado[j].checked = true;
                        //     }
                        // }

                        if (valor == "nuevo") {

                            let estado1 = document.getElementById('estado1');
                            estado1.checked = true;
                            console.log('nuevo');

                        } else if (valor == "usado") {

                            let estado2 = document.getElementById('estado2');
                            estado2.checked = true;
                        }

                        // console.log(estado);
                        // nombre.value = campos[i].textContent;
                        // console.log(campos[i].textContent);
                    } else if (i == 2) {
                        let clasificacion = document.getElementById("clasificacion");
                        let option = document.querySelectorAll("#clasificacion > option ");
                        let valor = campos[i].textContent.trim();
                        console.log(valor);

                        for (var a = 0; a < option.length; a++) {

                            if (option[a].textContent.trim() == valor) {
                                clasificacion.value = option[a].value;
                            }
                        }
                        // console.log(clasificacion);

                    } else if (i == 3) {
                        let valor = campos[i].textContent.trim();
                        console.log(valor);

                    } else if (i == 4) {
                        let valor = campos[i].textContent.trim();
                        console.log(valor);

                    } else if (i == 5) {
                        let valor = campos[i].textContent.trim();
                        console.log(valor);

                    } else if (i == 6) {
                        let valor = campos[i].textContent.trim();
                        console.log(valor);

                    }
                }
            }
            // console.log(this.parentElement.parentElement.getAttribute("idjuego"));

            if (accioin == "borrar") {

                console.log(" Usaremos el algoritmo  de borrar");

            } else if (accioin == "editar") {

                console.log(" Usaremos el algoritmo  de editar");

            }
        });
    }

    // var x = document.getElementById("myLI").parentElement.nodeName; 
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

        // var size = Object.size(respuesta[0]);
        // console.log("size = " + size);
        let fila = [];
        let att = [];

        let displaydatos = document.getElementById('displaydatos');

        borra_nodos(displaydatos);

        for (var i = 0; i < data.length; i++) {

            fila.push(document.createElement("tr"));
            let registro = [];

            for (var j = 0; j < Object.size(data[i]) + 1; j++) {

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
        // selecionatr();
        //  escribir  contenido de las celdas de la tabla en los campos corepndiantes para editar 
        // prueba();
    });

}

// function selecionatr(argument) {

//     let displaydatos = document.querySelectorAll("#displaydatos tr");

//     for (var i = 0; i < displaydatos.length; i++) {

//         displaydatos[i].addEventListener("click", function(argument) {

//             // this.style.backgroundColor = "red";
//             console.log(this.getAttribute("idjuego"));
//             cambiacolor(this);
//         });

//         // console.log(displaydatos[i]);
//     }

//     function cambiacolor(argument) {
//         for (var i = 0; i < displaydatos.length; i++) {
//             if (displaydatos[i] == argument) {
//                 displaydatos[i].style.backgroundColor = "red";
//             } else {
//                 displaydatos[i].style.backgroundColor = "#343A40";
//             }
//         }
//     }
//     // body... 
// }
// Funcion recuperada de https://stackoverflow.com/questions/5223/length-of-a-javascript-object#6700
// ==========================================================

// Get the size of an object
// var size = Object.size(myObj);
// nventario.nombre,inventario.estado,inventario.fecha, clasificacion.nombre as cnombre, plataforma.nombre as pnombre,inventario.cantidad , inventario.precio

// $('#example').DataTable({
//     "pagingType": "full_numbers"
// });