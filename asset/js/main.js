function mostrarContraseña(idPassword, idIcon){
    let inputPassword = document.getElementById(idPassword);
    let icon = document.getElementById(idIcon);
    if(inputPassword.type=="password"&& icon.classList.contains("fa-teeth")){
        inputPassword.type= "text";

    }else{

}
}

