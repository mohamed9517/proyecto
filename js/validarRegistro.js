//Guardar la referencia de cada elemento segun el ID
const usuario = document.getElementById('usuario');
const password = document.getElementById('password');
const nombre = document.getElementById('nombre');
const apellido1 = document.getElementById('apellido1');
const apellido2 = document.getElementById('apellido2');
const email = document.getElementById('email');





//Constantes que guarda los errores 
const errorUsuario = document.getElementById('errorUsuario');
const errorPassword = document.getElementById('errorPassword');
const errorNombre = document.getElementById('errorNombre');
const errorApellido1 = document.getElementById('errorApellido1');
const errorApellido2 = document.getElementById('errorApellido2');
const errorTelefono = document.getElementById('errorTelefono');
const errorEmail = document.getElementById('errorEmail');

// En caso cumpla la condicion 
const correctNombre=document.getElementById('corectNombre');
const correctApellidod1=document.getElementById('corectApellido1');
const correctApellidod2=document.getElementById('corectApellido2');
const correctUsuario=document.getElementById('corectUsuario');
const correctPassword=document.getElementById('corectPassword');
const correctEmail= document.getElementById('corectEmail');
//Ocultar los errores 
errorUsuario.style.display = "none";
errorPassword.style.display = "none";
errorNombre.style.display = "none";
errorApellido1.style.display = "none";
errorApellido2.style.display = "none";
errorEmail.style.display = "none";
correctNombre.style.display = "none";
correctApellidod1.style.display = "none";
correctApellidod2.style.display = "none";
correctUsuario.style.display="none";
correctPassword.style.display= "none";
correctEmail.style.display="none";

//Las expresiones regulares
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{6,16}$/,
	password: /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/,
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	apellido1: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	apellido2: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
}

//Cuando todas las variables de este objeto sean  true, podremos mostrar los datos
const campos = {
	usuario:false,
	nombre:false,
	apellido1:false,
	apellido2:false,	
	password: false,
	email: false,
	usuario: false,
}
//Esta funcion nos permitera ejecutar cada una las funciones segun donde escriba el usuario
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarUsuario(expresiones.usuario, e.target);
		
			break;
		case "password":
			validarPassword(expresiones.password, e.target);
			break;
		case "nombre":
			validarNombre(expresiones.nombre, e.target);
			primeraLetraMayuscula(e.target);
			break;
		case "apellido1":
			validarApellido1(expresiones.apellido1, e.target);
			primeraLetraMayuscula(e.target);
			break;
		case "apellido2":
			validarApellido2(expresiones.apellido2, e.target);
			primeraLetraMayuscula(e.target);
		case "email":
			validarEmail(expresiones.email, e.target);
	}
}
// Esta funcion nos permitira validar el campo usuario
const validarUsuario = (expresiones, input) => {
	if (expresiones.test(input.value)) {
        correctUsuario.style.display="block";
		errorUsuario.style.display="none";
		usuario.style.border = "2px solid green";
		campos.usuario = "true";
	} else {
        correctUsuario.style.display="none";
		errorUsuario.style.display="block";
		usuario.style.border = "2px solid red";
	}
}
//Esta funcion nos permitira validar el password
const validarPassword = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorPassword.style.display= "none";
		password.style.border = "2px solid green";
		campos.password = "true";
        correctPassword.style.display= "block";

	} else {
        correctPassword.style.display= "none";
		errorPassword.style.display= "block";
		password.style.border = "2px solid red";
	}
}

//Validar nombre

const validarNombre = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorNombre.style.display = 'none';
		nombre.style.border = "2px solid green";
        correctNombre.style.display = "block";
		campos.password = "true";
	} else {
		errorNombre.style.display = 'block';
        correctNombre.style.display = "none";
		nombre.style.border = "2px solid red";
	}
}
//Apellido 1
const validarApellido1 = (expresiones, input) => {
	if (expresiones.test(input.value)) {
        correctApellidod1.style.display = "block";
        errorApellido1.style.display = "none";
		apellido1.style.border = "2px solid green";
		campos.password = "true";
        
	} else {
        correctApellidod1.style.display = "none";
        errorApellido1.style.display = "block";
		apellido1.style.border = "2px solid red";
	}
}
//Apellido 2
const validarApellido2 = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorApellido2.style.display = "none";
        correctApellidod2.style.display = "block";
		apellido2.style.border = "2px solid green";
		campos.password = "true";
	} else {
        correctApellidod2.style.display = "none";
		errorApellido2.style.display = "block";
		apellido2.style.border = "2px solid red";
	}
}


//El correo
const validarEmail = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorEmail.style.display="none";
        correctEmail.style.display="block";
		email.style.border = "2px solid green";
		campos.email = "true";
	} else {
        correctEmail.style.display="none";
		errorEmail.style.display="block";;
		email.style.border = "2px solid red";
	}
}

//Para poner al usuario la primera letra en mayuscula
const primeraLetraMayuscula=(input)=>{
		input.value=input.value.charAt(0).toUpperCase()+input.value.substring(1, input.length);
}
const validarCp = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorCp.style.visibility = "hidden";
		cp.style.border = "2px solid green";
		campos.email = "true";
	} else {
		errorCp.style.visibility = "visible";
		cp.style.border = "2px solid red";
	}
}





//Oyentes de evento
usuario.addEventListener('keyup', validarFormulario);
password.addEventListener('keyup', validarFormulario);
nombre.addEventListener('keyup', validarFormulario);
apellido1.addEventListener('keyup', validarFormulario);
apellido2.addEventListener('keyup', validarFormulario);
email.addEventListener('keyup', validarFormulario);


usuario.addEventListener('blur', validarFormulario);
password.addEventListener('blur', validarFormulario);
nombre.addEventListener('blur', validarFormulario);
apellido1.addEventListener('blur', validarFormulario);
apellido2.addEventListener('blur', validarFormulario);
email.addEventListener('blur', validarFormulario);
password.addEventListener('blur', validarFormulario);
