/*
	Para validar os campos deve-se adicionar a class validar no input e definir uma mensagem usando o atributo data-mensagem.
	Por fim deve-se chamar a função validarFormulario no onclick do botão de submit.
*/
function validarFormulario(){

	var campos = document.getElementsByClassName('validar');
	for(var i=0; i< campos.length; i++){
		if(campos[i].value == ""){
			alert(campos[i].getAttribute('data-mensagem'));
			return false;
		}
	}
};

/*
	Para mascaram um campo deve-se adicionar a função no evento onkeypress 
	passando como argumentos o this(próprio input) e o modelo de máscara"sai: "+.
*/
function mascararCampo(t, mascara){
	var len = t.value.length;
	var saida = mascara.substring(1,0);
	var texto = mascara.substring(len);

	if (texto.substring(0,1) != saida){
		t.value += texto.substring(0,1);
	}
}

     