$(document).ready(function() {
pageSetUp();	
	var $registerForm = $("#form1").validate({	
				// Rules for form validation
				rules : {
					nombre:{
						required : true,
						minlength : 10,
						maxlength : 50
					},
					usuario : {
						required : true,
						minlength : 3,
						maxlength : 20
					},
					password : {
						required : true,
						minlength : 5,
						maxlength : 20
					},
					repassword : {
						required : true,
						minlength : 5,
						maxlength : 20,
						equalTo : '#password'
					},
					email : {
						required : true,
						email : true
					},
					rol : {
						required : true						
					},
				},
	
				// Messages for form validation
				messages : {
					nombre : {
						required : 'Por favor, ingrese Nombre.'
					},
					usuario : {
						required : 'Por favor, ingrese Usuario.'
					},											
					password : {
						required : 'Por favor, ingrese Contraseña'
					},
					repassword : {
						required : 'Por favor, ingrese la Contraseña otra vez.',
						equalTo : 'Por favor, ingrese una contraseña identica a la anterior.'
					},
					email : {
						required : 'Por favor, ingrese email.'
					},
					rol : {
						required : 'Por favor, Seleccione Rol/Cargo del Usuario.'
					},		
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
});