window.onload = function() {
    mostrarRol();
}
<<<<<<< HEAD

function mostrarRol() {
    const registro = document.getElementsByName("modificar")[0];
=======
function mostrarRol() {
    const registro = document.getElementsByTagName("form")[0];
>>>>>>> acea37510004622bf2177bce07f0852722f6942e
    console.log(registro);
    var select = registro[3];
    console.log(select);
    if(registro.getAttribute("name")=="Registrar"){
        select = registro[2];
        console.log(select);
    }

    const codigo = document.getElementById("Codigo");

    if(document.body.contains(codigo)){
<<<<<<< HEAD
        if (select.className == "1") {
=======
        if (select.className == "1000") {
>>>>>>> acea37510004622bf2177bce07f0852722f6942e
            codigo.type = 'password';
            codigo.disabled = false;
        } else {
            codigo.type = 'hidden';
            codigo.disabled = true;
        }
    }
    const selectValue = select.className;
    for (let j = 0; j < select.length; j++) {
        if (selectValue == select[j].value){
            console.log("selecionado");
            select[j].selected = true;
            break;
        }
    }   
}