 function comprar_seccion(argument) {

     let seccion_targeta =
         document.getElementById("seccion_targeta");
     // ==========
     let seccion_resibo =
         document.getElementById("seccion_resibo");
     // ==========
     let btnvisa =
         document.getElementById("btnvisa");
     // =========

     seccion_targeta.style.display = "block";
     seccion_resibo.style.display = "none";

     btnvisa.addEventListener("click", function(argument) {

         seccion_targeta.style.display = "none";
         seccion_resibo.style.display = "block";
     });
     let valor_total = 0;
     let precio_total =
         document.querySelectorAll(".precio_total");
     for (var i = 0; i <
         precio_total.length; i++) {
         console.log(
             parseFloat(precio_total[i].textContent));
         valor_total =
             valor_total + parseFloat(precio_total[i].textContent);
     }

     let resibo_preciototal =
         document.getElementById("resibo_preciototal");

     resibo_preciototal.innerHTML = "$ " + valor_total;
     valor_total = 0;
 }