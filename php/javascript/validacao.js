function validarForm(){
    if(document.frmcontato.nome_completo.value == ""){
        document.frmcontato.nome_completo.focus();
        alert("Precissa preencher o campo Nome !");
        return false;
    }
    if(document.frmcontato.sobrenome.value == ""){
        document.frmcontato.sobrenome.focus();
        alert("Precissa preencher o campo Sobrenome !");
        return false;
    }
    if(document.frmcontato.email.value == ""){
        document.frmcontato.email.focus();
        alert("Precissa preencher o campo Email !");
        return false;
    }
    if(document.frmcontato.contacto.value == ""){
        document.frmcontato.contacto.focus();
        alert("Precissa preencher o campo Contacto !");
        return false;
    }
    if(document.frmcontato.provincia.value == "" || document.frmcontato.provincia.value == "s/i"){
        document.frmcontato.provincia.focus();
        alert("Precissa informar sua Provincia !");
        return false;
    }
    if(document.frmcontato.localidade.value == "" ){
        document.frmcontato.localidade.focus();
        alert("Precissa preencher o campo Localidade !");
        return false;
    }
    if(document.frmcontato.historia.value == "" ){
        document.frmcontato.historia.focus();
        alert("Precissa preencher o campo Historia !");
        return false;
    }
    if(document.frmcontato.imagem.value == "" ){
        document.frmcontato.imagem.focus();
        alert("Precissa selecionar uma foto !");
        return false;
    }
}