document.addEventListener("DOMContentLoaded", function(){
    const links = document.querySelectorAll("select");

    links.forEach(link => {

        link.addEventListener("change", function(){
            if (link.value != ""){
                window.location.href = link.value;
            }
        });
        
    });

    const paginaInicial = document.getElementById("hollowshop-form");

    paginaInicial.addEventListener("click", function(){
        window.location.href = "../menu.php";
    });

    const musica = document.getElementById("musica");

    document.addEventListener("click", function(){
        musica.play();
    });

});

window.addEventListener("load", function(){
    const musica = document.getElementById("musica");
    
    document.addEventListener("click", function(){
        musica.play();
    });
});

const email = document.getElementById("email");
const senha = document.getElementById("senha");
const emailPadrao = "admin@admin";
const senhaPadrao = "admin";

const botaoEntrar = document.getElementById("entrar");

botaoEntrar.addEventListener("click", function(event){

    if(email.value != emailPadrao || senha.value != senhaPadrao){
        event.preventDefault();

        alert("Login ou senha inválidos");
        window.location.href = "index.php";
    }
    else{
        window.location.href = "./pages/menu.php";
    }
});