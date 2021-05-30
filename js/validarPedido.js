//Guardar la referencia de cada elemento segun el ID

const nombre = document.getElementById('nombre');
const apellido1 = document.getElementById('apellido1');
const apellido2 = document.getElementById('apellido2');
const telefono = document.getElementById('telefono');
const email = document.getElementById('email');
const cp = document.getElementById('cp');
const provincia = document.getElementById('provincia');
const comunidadAutonoma = document.getElementById('comunidadAutonoma');
const dni = document.getElementById('dni');




//Constantes que guarda los errores 

const errorNombre = document.getElementById('errorNombre');
const errorApellido1 = document.getElementById('errorApellido1');
const errorApellido2 = document.getElementById('errorApellido2');
const errorTelefono = document.getElementById('errorTelefono');
const errorEmail = document.getElementById('errorEmail');
const errorCp = document.getElementById('errorCp');
const errorDni = document.getElementById('errorDni');

// constantes
const correctNombre=document.getElementById('corectNombre');
const correctApellidod1=document.getElementById('corectApellido1');
const correctApellidod2=document.getElementById('corectApellido2');
const correctUsuario=document.getElementById('corectUsuario');
const correctPassword=document.getElementById('corectPassword');
const correctEmail= document.getElementById('corectEmail');
const correctDni=document.getElementById('corectDni')
const correctTelefono=document.getElementById('corectTelefono');
const correctCp=document.getElementById('corectCp');

//Ocultar los errores 

errorNombre.style.display = "none";
errorApellido1.style.display = "none";
errorApellido2.style.display = "none";
errorTelefono.style.display = "none";
errorEmail.style.display = "none";
errorCp.style.display = "none";
errorDni.style.display = "none";

correctNombre.style.display = "none";
correctApellidod1.style.display = "none";
correctApellidod2.style.display = "none";
correctEmail.style.display="none";
correctDni.style.display="none";
correctTelefono.style.display="none";
correctCp.style.display="none";
//Las expresiones regulares
const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	apellido1: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	apellido2: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	telefono: /(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/,
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	cp: /^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$/,
	provincia: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	comunidad: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	dni: /^[0-9]{8}[A-Za-z]$/,

}

//Cuando todas las variables de este objeto sean  true, podremos mostrar los datos
const campos = {
	dni: false,
	nombre:false,
	apellido1:false,
	apellido2:false,
	telefono:false,
	cp:false,
	email: false,
	usuario: false,
}
//Esta funcion nos permitera ejecutar cada una las funciones segun donde escriba el usuario
const validarFormulario = (e) => {
	switch (e.target.name) {
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

			break;
		case "dni":
			validarDni(expresiones.dni, e.target);

			break;
		case "telefono":
			validarTelefono(expresiones.telefono, e.target);

			break;
		case "email":
			validarEmail(expresiones.email, e.target);

			break;
		case "cp":
			validarCp(expresiones.cp, e.target);

			break;
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
//Para validar el dni segun la expresion regular
const validarDni = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorDni.style.display = "none";
		correctDni.style.display="block";
		dni.style.border = "2px solid green";
		campos.dni = "true";
	} else {
		correctDni.style.display="none";
		errorDni.style.display = "block";
		dni.style.border = "2px solid red";
	}
}
//Para validacion de la letra del DNI
const validarDniLetra = (input) => {
	let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

	var letraDNI = input.value.charAt(8, 9).toUpperCase();
	var numDNI = parseInt(input.value.substring(0, 8));
	if (letraDNI == letras[numDNI % 23]) {
		errorDni.style.visibility = "hidden";
		dni.style.border = "2px solid green";
		campos.dni = "true";

	} else {
		errorDni.style.visibility = "visible"
		dni.style.border = "2px solid red";
	}
}
//Validar el telefono
const validarTelefono = (expresiones, input) => {
	if (expresiones.test(input.value)) {
		errorTelefono.style.display = "none";
		correctTelefono.style.display="block";
		telefono.style.border = "2px solid green";
		campos.password = "true";
	} else {
		correctTelefono.style.display="none";
		errorTelefono.style.display = "block";
		telefono.style.border = "2px solid red";
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

		errorCp.style.display = "none";
		correctCp.style.display="block";
		cp.style.border = "2px solid green";
		campos.email = "true";
	} else {
		correctCp.style.display="none";
		errorCp.style.display = "block";
		cp.style.border = "2px solid red";
	}
}
// Estas os funciones son sacadas de internet 
function validarProvincia(cpostal) {
	let cp_provincias = {
		1: "\u00C1lava", 2: "Albacete", 3: "Alicante", 4: "Almer\u00EDa", 5: "\u00C1vila",
		6: "Badajoz", 7: "Baleares", 08: "Barcelona", 09: "Burgos", 10: "C\u00E1ceres",
		11: "C\u00E1diz", 12: "Castell\u00F3n", 13: "Ciudad Real", 14: "C\u00F3rdoba", 15: "Coruña",
		16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guip\u00FAzcoa",
		21: "Huelva", 22: "Huesca", 23: "Ja\u00E9n", 24: "Le\u00F3n", 25: "L\u00E9rida",
		26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "M\u00E1laga", 30: "Murcia",
		31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas",
		36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
		41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
		46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
		51: "Ceuta", 52: "Melilla"
	};
	if (cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000)
		return cp_provincias[parseInt(cpostal.substring(0, 2))];
	else
		return "----";
}

function validarComunidad(cpostal) {
	let cp_comunidad = {
		1: "Pa\u00EDs Vasco", 2: "Castilla-La Mancha", 3: "Comunidad Valenciana", 4: "Andaluc\u00EDa", 5: "Castilla y Le\u00F3n",
		6: "Extremadura", 7: "Islas Baleares", 08: "Catalu\u00F1a", 09: "Castilla y Le\u00F3n", 10: "Extremadura",
		11: "Andaluc\u00EDa", 12: "Comunidad Valenciana", 13: "Castilla-La Mancha", 14: "Andaluc\u00EDa", 15: "Galicia",
		16: "Castilla-La Mancha", 17: "Catalu\u00F1a", 18: "Andaluc\u00EDa", 19: "Castilla-La Mancha", 20: "Pa\u00EDs Vasco",
		21: "Andaluc\u00EDa", 22: "Arag\u00F3n", 23: "Andaluc\u00EDa", 24: "Castilla y Le\u00F3n", 25: "Catalu\u00F1a",
		26: "La Rioja", 27: "Galicia", 28: "Comunidad de Madrid", 29: "Andaluc\u00EDa", 30: "Regi\u00F3n de Murcia",
		31: "Comunidad de Navarra", 32: "Galicia", 33: "Principado de Asturias", 34: "Castilla y Le\u00F3n", 35: "Islas Canarias",
		36: "Galicia", 37: "Castilla y Le\u00F3n", 38: "Islas Canarias", 39: "Cantabria", 40: "Castilla y Le\u00F3n",
		41: "Andaluc\u00EDa", 42: "Castilla y Le\u00F3n", 43: "Catalu\u00F1a", 44: "Arag\u00F3n", 45: "Castilla-La Mancha",
		46: "Comunidad Valenciana", 47: "Castilla y Le\u00F3n", 48: "Pa\u00EDs Vasco", 49: "Castilla y Le\u00F3n", 50: "Arag\u00F3n",
		51: "Ceuta", 52: "Melilla"
	};
	if (cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000)
		return cp_comunidad[parseInt(cpostal.substring(0, 2))];
	else
		return "----";
}
// Utilizacion jquery
cp.onkeyup = function () {
	comunidadAutonoma.value = validarComunidad(cp.value);
	provincia.value = validarProvincia(cp.value);
}


//Oyentes de evento

nombre.addEventListener('keyup', validarFormulario);
apellido1.addEventListener('keyup', validarFormulario);
apellido2.addEventListener('keyup', validarFormulario);
telefono.addEventListener('keyup', validarFormulario);
email.addEventListener('keyup', validarFormulario);
dni.addEventListener('keyup', validarFormulario);
dni.addEventListener('keydown', validarFormulario);
cp.addEventListener('keydown', validarFormulario);

nombre.addEventListener('blur', validarFormulario);
apellido1.addEventListener('blur', validarFormulario);
apellido2.addEventListener('blur', validarFormulario);
telefono.addEventListener('blur', validarFormulario);
email.addEventListener('blur', validarFormulario);
cp.addEventListener('blur', validarFormulario);
dni.addEventListener('blur', validarFormulario);