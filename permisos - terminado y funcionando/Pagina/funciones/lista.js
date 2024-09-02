function MostrarMenu1(){
    let Lista = document.getElementById("menu1");
    if (Lista.style.display == "block"){
        document.getElementById("flecha-menu1").style.transform = 'rotate(0deg)';
        document.getElementById("menu1").style.maxHeight = '0';
        //coloca un temporizador
        setTimeout(() =>{
            document.getElementById("menu1").style.display = "none";
        }, 1000);
    } else{
        document.getElementById("menu1").style.display = "block";
        setTimeout(() =>{
        document.getElementById("flecha-menu1").style.transform = 'rotate(90deg)';
        document.getElementById("menu1").style.maxHeight = "200px";
        }, 200);
    }
}

function MostrarMenu2(){
    let Lista = document.getElementById("menu2");
    if (Lista.style.display == "block"){
        document.getElementById("flecha-menu2").style.transform = 'rotate(0deg)';
        document.getElementById("menu2").style.maxHeight = '0';
        //coloca un temporizador
        setTimeout(() =>{
            document.getElementById("menu2").style.display = "none";
        }, 1000);
    } else{
        document.getElementById("menu2").style.display = "block";
        setTimeout(() =>{
        document.getElementById("flecha-menu2").style.transform = 'rotate(90deg)';
        document.getElementById("menu2").style.maxHeight = "200px";
        }, 200);
    }
}