var current_page = 1;
var records_per_page = 3;

var objJson = [
    { adName: "AdName 1"},
    { adName: "AdName 2"},
    { adName: "AdName 3"},
    { adName: "AdName 4"},
    { adName: "AdName 5"},
    { adName: "AdName 6"},
    { adName: "AdName 7"},
    { adName: "AdName 8"},
    { adName: "AdName 9"},
    { adName: "AdName 10"}
]; // Can be obtained from another source, such as your objJson variable

function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}
    
function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");
 
    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    listing_table.innerHTML = "";

    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < objJson.length; i++) {
        listing_table.innerHTML += objJson[i].adName + "<br>";
    }
    page_span.innerHTML = page + "/" + numPages();

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}

window.onload = function() {
    changePage(1);
};



var table = document.querySelector('table'), 
    table_meta_container = table.querySelector('thead'), 
    table_data_container = table.querySelector('tbody'),
    data = [
  { 'firstName': 'Scooby', 'lastName': 'Doo', 'birth': 1969 }, 
  { 'firstName': 'Yogi', 'lastName': 'Bear', 'birth': 1958 }, 
  { 'firstName': 'Tom', 'lastName': 'Cat', 'birth': 1940 }, 
  { 'firstName': 'Jerry', 'lastName': 'Mouse', 'birth': 1940 }, 
  { 'firstName': 'Fred', 'lastName': 'Flintstone', 'birth': 1960 }
], n = data.length;
 
var createTable = function(src) {
  var frag = document.createDocumentFragment(), 
      curr_item, curr_p;
   
  for(var i = 0; i < n; i++) {
    curr_item = document.createElement('tr');
    curr_item.classList.add(((i%2 === 0)?'odd':'even'));
    data[i].el = curr_item;
     
    for(var p in data[i]) {
      if(p !== 'el') {
        curr_p = document.createElement('td');
        curr_p.classList.add('prop__value');
        curr_p.dataset.propName = p;
        curr_p.textContent = data[i][p];
        curr_item.appendChild(curr_p)
      }
    }
     
    frag.appendChild(curr_item);
  }
   
  table_data_container.appendChild(frag);
};
 
var sortTable = function(entries, type, dir) {  
  entries.sort(function(a, b) { 
    if(a[type] < b[type]) return -dir;
    if(a[type] > b[type]) return dir;
    return 0;
  });
   
  table.dataset.sortBy = type;
   
  for(var i = 0; i < n; i++) {
    entries[i].el.style.order = i + 1;
     
    if((i%2 === 0 &amp;&amp; entries[i].el.classList.contains('even')) || 
       (i%2 !== 0 &amp;&amp; entries[i].el.classList.contains('odd'))) {
      entries[i].el.classList.toggle('odd');
      entries[i].el.classList.toggle('even');
    }
  }
};
 
createTable(data);
 
table_meta_container.addEventListener('click', function(e) {
  var t = e.target;
   
  if(t.classList.contains('prop__name')) {
    if(!t.dataset.dir) { t.dataset.dir = 1; }
    else { t.dataset.dir *= -1; }
     
    sortTable(data, t.dataset.propName, t.dataset.dir);
  }
}, false);



function paginate(totalItems: number,
    currentPage: number = 1,
    pageSize: number = 10,
    maxPages: number = 10) {
    // calculate total pages
    let totalPages = Math.ceil(totalItems / pageSize);

    // ensure current page isn't out of range
    if (currentPage < 1) {
        currentPage = 1;
    } else if (currentPage > totalPages) {
        currentPage = totalPages;
    }

    let startPage: number, endPage: number;
    if (totalPages <= maxPages) {
        // total pages less than max so show all pages
        startPage = 1;
        endPage = totalPages;
    } else {
        // total pages more than max so calculate start and end pages
        let maxPagesBeforeCurrentPage = Math.floor(maxPages / 2);
        let maxPagesAfterCurrentPage = Math.ceil(maxPages / 2) - 1;
        if (currentPage <= maxPagesBeforeCurrentPage) {
            // current page near the start
            startPage = 1;
            endPage = maxPages;
        } else if (currentPage + maxPagesAfterCurrentPage >= totalPages) {
            // current page near the end
            startPage = totalPages - maxPages + 1;
            endPage = totalPages;
        } else {
            // current page somewhere in the middle
            startPage = currentPage - maxPagesBeforeCurrentPage;
            endPage = currentPage + maxPagesAfterCurrentPage;
        }
    }

    // calculate start and end item indexes
    let startIndex = (currentPage - 1) * pageSize;
    let endIndex = Math.min(startIndex + pageSize - 1, totalItems - 1);

    // create an array of pages to ng-repeat in the pager control
    let pages = Array.from(Array((endPage + 1) - startPage).keys()).map(i => startPage + i);

    // return object with all pager properties required by the view
    return {
        totalItems: totalItems,
        currentPage: currentPage,
        pageSize: pageSize,
        totalPages: totalPages,
        startPage: startPage,
        endPage: endPage,
        startIndex: startIndex,
        endIndex: endIndex,
        pages: pages
    };
}

export = paginate;

// Chequea slice(),
// page_size = 10
// index = 0
// while (index < json_array.length){
// json_array.slice(index, page_size + index)
// Index = page_size
// }
// Y terminas con un arreglo de páginas las cuales tienen hasta max 10 elementos.


// function devuelveinventario(argument) {
//     $.post(server, {
//         fun: 'devuelveinventario'
//     }, function(respuesta) {
//         respuesta = JSON.parse(respuesta);
//         console.log(respuesta);
//         // registros = respuesta;

//         // =============================

//         // Manejo  del la longitud de las filas del a tabla 
//         // Nota Guardar todos los datos  para luego usar esta funcion  y desplegar solo los quie deseamos 
//         // let data = navegacion(respuesta);
//         let data = respuesta;
//         // =============================

//         let paguinas = respuesta.length / 10;
//         let residuo = respuesta.length % 10;

//         console.log(paguinas);
//         console.log(residuo);

//         var size = Object.size(respuesta[0]);
//         console.log("size = " + size);
//         let fila = [];
//         let att = [];

//         let displaydatos = document.getElementById('displaydatos');

//         borra_nodos(displaydatos);

//         for (var i = 0; i < data.length; i++) {

//             fila.push(document.createElement("tr"));
//             let registro = [];

//             for (var j = 0; j < Object.size(data[i]) - 1; j++) {

//                 registro.push(document.createElement("td"));

//             }

//             // let btneditar = document.createElement("BUTTON");
//             // btneditar.innerHTML = "Editar";
//             // let btborrar = document.createElement("BUTTON");
//             // btborrar.innerHTML = "Bottar";

//             att.push(document.createAttribute("idjuego"));
//             att[i].value = data[i]['idjuego'];
//             registro[0].innerHTML = data[i]['nombre'];
//             registro[1].innerHTML = data[i]['estado'];
//             registro[2].innerHTML = data[i]['cnombre'];
//             registro[3].innerHTML = data[i]['fecha'];
//             registro[4].innerHTML = data[i]['pnombre'];
//             registro[5].innerHTML = data[i]['cantidad'];
//             registro[6].innerHTML = data[i]['precio'];
//             // registro[7].appendChild((function() {
//             //     let btn = document.createElement("BUTTON");
//             //     let att = document.createAttribute("class"); // Create a "class" attribute
//             //     att.value = "btn btn-warning editar";
//             //     btn.setAttributeNode(att);
//             //     btn.innerHTML = "Editar";
//             //     return btn;
//             // }()));
//             // registro[8].appendChild((function() {
//             //     let btn = document.createElement("BUTTON");
//             //     let att = document.createAttribute("class"); // Create a "class" attribute
//             //     att.value = "btn btn-danger borrar";
//             //     btn.setAttributeNode(att);
//             //     btn.innerHTML = "Borrar";
//             //     return btn;
//             // }()));

//             for (var z = 0; z < registro.length; z++) {

//                 fila[i].appendChild(registro[z]);

//             }
//             fila[i].setAttributeNode(att[i]);
//         }

//         for (var i = 0; i < fila.length; i++) {
//             displaydatos.appendChild(fila[i]);
//         }
//         // $('#example').DataTable({
//         //     "pagingType": "full_numbers"
//         // });
//         selecionatr();

//         // prueba();
//     });

// }

// document.addEventListener('click', function(event) {

//     // Make sure clicked element is our toggle
//     if (!event.target.classList.contains('toggle')) return;

//     // Prevent default link behavior
//     event.preventDefault();

//     // Get the content
//     var content = document.querySelector(event.target.hash);
//     if (!content) return;

//     // Toggle the content
//     toggle(content);

// }, false);
// const server = "../php/php.php";

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



    articulos = [];
    for (var i = 0; i < seleccion.length; i++) {
        let dato = {
            "idjuego": seleccion[i].getAttribute("idjuego"),

        }
        //        let nombre = registro.childNodes[0].textContent;
        // let cantidad = registro.childNodes[5].textContent;
        // let precio = registro.childNodes[6].textContent;
        articulos.push(dato);
        dato = {}
    }
    var jkaslbdjbvlkj={

        "":{firstName:"John", lastName:"Doe", age:46},
       "" person,
       "" person
   }
    var person = {firstName:"John", lastName:"Doe", age:46};  
     var person = {firstName:"John", lastName:"Doe", age:46};  
      var person = {firstName:"John", lastName:"Doe", age:46};  
       var person = {firstName:"John", lastName:"Doe", age:46};