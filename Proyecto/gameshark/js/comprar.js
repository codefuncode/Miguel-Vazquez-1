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
     let correo =
         document.getElementById("correo");
     // ======

     let display_mail_user =
         document.getElementById("display_mail_user");

     let nombre_usuario_targeta =
         document.getElementById("nombre_usuario_targeta");

     let nombre_usuario_resibo =
         document.getElementById("nombre_usuario_resibo");

     seccion_targeta.style.display = "block";
     seccion_resibo.style.display = "none";

     btnvisa.addEventListener("click", function(argument) {

         seccion_targeta.style.display = "none";
         seccion_resibo.style.display = "block";

         display_mail_user.innerHTML = correo.value;
         nombre_usuario_resibo.innerHTML = nombre_usuario_targeta.value;
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

     var getBrowserInfo = function() {
         var ua = navigator.userAgent,
             tem,
             M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
         if (/trident/i.test(M[1])) {
             tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
             return 'IE ' + (tem[1] || '');
         }
         if (M[1] === 'Chrome') {
             tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
             if (tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
         }
         M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
         if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
         return M.join(' ');
     };

  

     var res = getBrowserInfo().split(" ");
     console.log(res);

     if (res.includes("Opera")) {
         let img_recibo = document.getElementById("img_recibo");
         img_recibo.style.width = "70px";
         img_recibo.style.height = "70px";
         img_recibo.style.border = "50px";
         img_recibo.style.float = "left";

     } else {

     }
 }
