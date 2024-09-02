window.onload = function() {
    mostrarRol();
}

function mostrarRol() {
    var registro;
    if(document.body.contains(document.getElementsByName("modificar")[0])){
        registro = document.getElementsByName("modificar")[0];
        console.log(registro);
    } else if (document.body.contains(document.getElementsByName("Registrar")[0])){
        registro = document.getElementsByName("Registrar")[0];
        console.log(registro);
    }

    var select = registro[2];
    console.log(select);

    const codigo = document.getElementById("Codigo");

    if(document.body.contains(codigo)){
        if (select.className == "1") {
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