function reportes_fun(argument) {
    let menu_usuarios =
        document.querySelectorAll(".menu_usuarios");

    let menu_inventario =
        document.querySelectorAll(".menu_inventario");

    // name="tabla"

    let btn_radio_tabla = document.querySelectorAll('[name="tabla"]');
    console.log(btn_radio_tabla);

    menu_usuarios[0].style.display = "none";
    menu_inventario[0].style.display = "none";

    for (var i = 0; i < btn_radio_tabla.length; i++) {
        btn_radio_tabla[i].addEventListener("change", function(argument) {
            console.log(this);

            if (this.value == "usuario") {
                menu_usuarios[0].style.display = "block";
                menu_inventario[0].style.display = "none";

            } else if (this.value == "innventario") {
                menu_usuarios[0].style.display = "none";
                menu_inventario[0].style.display = "block";
            }
        });
    }

}