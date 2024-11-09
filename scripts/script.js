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

    const senhaUsuario = document.getElementById("senha-do-usuario");
    const confirmacaoSenha = document.getElementById("confirmacao-senha");

    confirmacaoSenha.addEventListener("input", function(){
        if(senhaUsuario.value != confirmacaoSenha.value){
            confirmacaoSenha.style.border = "2px solid red";
        }
        else{
            confirmacaoSenha.style.border = "2px solid green";
        }
    });

    confirmacaoSenha.addEventListener("blur", function() {
        confirmacaoSenha.style.border = "";
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

function limpaFormulario(){
    const inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
        input.value = "";
    })
}

function pegaEndereco(){
    const cep = document.getElementById("cep").value.replace("-", "");
    const rua = document.getElementById("rua");
    const bairro = document.getElementById("bairro");
    const cidade = document.getElementById("cidade");
    const uf = document.getElementById("uf")

    if (cep.length !== 8){
        alert("Por favor, digite um CEP válido.");
        return;
    }

    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {

            if (data.erro){
                alert("CEP não encontrado.");
            } 
            
            else{
                const componentesDeEndereco = [rua, bairro, cidade, uf];

                rua.value = data.logradouro;
                bairro.value = data.bairro;
                cidade.value = data.localidade;
                uf.value = data.uf
            }
        });      
}

function validaCPF() {
    const cpf = document.getElementById("cpf").value;
    const campoCPF = document.getElementById("cpf");
    const consultaDeCPF = document.getElementById("consultaDeCPF");

    if (isNaN(cpf) ||
        cpf.length !== 11 ||
        cpf == 0 || 
        cpf == 11111111111 ||
        cpf == 22222222222 ||
        cpf == 33333333333 ||
        cpf == 44444444444 ||
        cpf == 55555555555 ||
        cpf == 66666666666 ||
        cpf == 77777777777 ||
        cpf == 88888888888 ||
        cpf == 99999999999){
        consultaDeCPF.innerHTML = "CPF inválido!";
        campoCPF.value = "";
        return false;
    }

    let soma = 0;
    let resto;

    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.charAt(i - 1)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if ((resto === 10 || resto === 11) ? parseInt(cpf.charAt(9)) !== 0 : parseInt(cpf.charAt(9)) !== resto) {
        consultaDeCPF.innerHTML = "CPF inválido!";
        campoCPF.value = "";
        return false;
    }

    soma = 0;

    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.charAt(i - 1)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if ((resto === 10 || resto === 11) ? parseInt(cpf.charAt(10)) !== 0 : parseInt(cpf.charAt(10)) !== resto) {
        consultaDeCPF.innerHTML = "CPF inválido!";
        campoCPF.value = "";
        return false;
    }

    consultaDeCPF.innerHTML = "CPF válido!";
    return true;
}

function validaCNPJ() {
    const cnpj = document.getElementById("cnpj").value;
    const campoCNPJ = document.getElementById("cnpj");
    const consultaDeCNPJ = document.getElementById("consultaDeCNPJ");

    const cnpjLimpo = cnpj.replace(/[^\d]+/g, '');

    if (cnpjLimpo.length !== 14 ||
        /^(\d)\1+$/.test(cnpjLimpo)) {
        consultaDeCNPJ.innerHTML = "CNPJ inválido!";
        campoCNPJ.value = "";
        return false;
    }

    let tamanho = cnpjLimpo.length - 2;
    let numeros = cnpjLimpo.substring(0, tamanho);
    const digitos = cnpjLimpo.substring(tamanho);
    
    let soma = 0;
    let pos = tamanho - 7;

    for (let i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) pos = 9;
    }

    let resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
    if (resultado != digitos.charAt(0)) {
        consultaDeCNPJ.innerHTML = "CNPJ inválido!";
        campoCNPJ.value = "";
        return false;
    }

    tamanho += 1;
    numeros = cnpjLimpo.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;

    for (let i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) pos = 9;
    }

    resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
    if (resultado != digitos.charAt(1)) {
        consultaDeCNPJ.innerHTML = "CNPJ inválido!";
        campoCNPJ.value = "";
        return false;
    }

    consultaDeCNPJ.innerHTML = "CNPJ válido!";
    return true;
}


