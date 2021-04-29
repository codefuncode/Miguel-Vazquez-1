function fun_ver_usuarios(argument) {
    let idusuario = document.querySelectorAll("[idusuario]");
    let btn_editar = document.querySelectorAll("table .btn-warning");
    let btn_eliminar = document.querySelectorAll("table .btn-danger");
    console.log(idusuario);
    console.log(btn_editar);
    console.log(btn_eliminar);
    for (var i = 0; i < btn_editar.length; i++) {
        btn_editar[i].addEventListener("click", fun_editar);
    }
    for (var i = 0; i < btn_editar.length; i++) {
        btn_eliminar[i].addEventListener("click", fun_eliminar);
    }

    function fun_editar(argument) {
        console.log(this.getAttribute("idusuario"));
    }

    function fun_eliminar(argument) {

        // <a href="test_get.php?subject=PHP&web=W3schools.com">Test $GET</a>

    }

}

fun_ver_usuarios();