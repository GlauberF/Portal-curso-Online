	jQuery.validator.addMethod("cpf", function (value, element) {
	    value = jQuery.trim(value);
	 
	    value = value.replace('.', '');
	    value = value.replace('.', '');
	    cpf = value.replace('-', '');
	    while (cpf.length < 11) cpf = "0" + cpf;
	    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
	    var a = [];
	    var b = new Number;
	    var c = 11;
	    for (i = 0; i < 11; i++) {
	        a[i] = cpf.charAt(i);
	        if (i < 9) b += (a[i] * --c);
	    }
	    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
	    b = 0;
	    c = 11;
	    for (y = 0; y < 10; y++) b += (a[y] * c--);
	    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
	    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return this.optional(element) || false;
	    return this.optional(element) || true;
	}, "Informe um CPF válido."); // Mensagem padrão 






	// this one requires the value to be the same as the first parameter
	$.validator.methods.equal = function(value, element, param) {
		return value == param;
	};

	$().ready(function() {
		var validator = $("#User").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true,
				},
				senha2: {
					required: true,
					minlength: 8
				},
				senha3: {
					minlength: 8,
					equalTo: "#senha2"
				},
				email: {
					required: true,
					email: true
				}
			}
		});

	});


	$().ready(function() {
		var validator = $("#VI_User").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome_completo: {
					required:true,
				},
				email2: {
					required: true,
					email: true
				}
			}
		});

	});


	$().ready(function() {
		var validator = $("#User_SENHA").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				senha: {
					required: true,
					minlength: 8
				},
				senha1: {
					minlength: 8,
					equalTo: "#senha"
				}
			}
		});

	});


	
	
	$().ready(function() {
		var validator = $("#Versao").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				atualizacao_numero: {
					required:true
				},
				nome_atualizacao: {
					required:true
				}
			}
		});
	});	
	
	
	
	
	//---------------aluno--------------
	$().ready(function() {
		var validator = $("#Aluno").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				email: {
					required: true,
					email: true
				},
				cpf: {
					required: true,
					cpf: {cpf: true}					
				},
				cidade: {
					required: true
				},					
				senha: {
					required: true,
					minlength: 8
				},
				senha2: {
					minlength: 8,
					equalTo: "#senha"
				}					
						
			}
		});

	});
	//---------------aluno--------------	


	
	
	//---------------professor--------------	
	$().ready(function() {
		var validator = $("#Professor").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				email: {
					required: true,
					email: true
				},
				cpf: {
					required: true,
					cpf: {cpf: true}					
				}				
			}
		});

	});
	//---------------professor--------------	
	
	
	
	//---------------curso--------------	
	$().ready(function() {
		var validator = $("#Curso").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				}
			}
		});
	});
	//---------------curso--------------	
	

	
	//---------------disciplina--------------		
	$().ready(function() {
		var validator = $("#Disciplina").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				concurso_idconcurso: {
					required: true
				},
				date_in: {
					required: true
				},
				date_out: {
					required: true
				}				
			}
		});

	});
	//---------------disciplina--------------	

	


	
	//---------------aula--------------		
	$().ready(function() {
		var validator = $("#Aula").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				endereco_video: {
					required:true
				},
				curso_idcurso: {
					required:true
				}												
			}
		});
	});
	//---------------aula--------------		

	
	
	
	//---------------material--------------		
	$().ready(function() {
		var validator = $("#Material").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				endereco: {
					required:true
				},
				aula_idaula: {
					required:true
				}								
			}
		});
	});
	//---------------material--------------		
	




	//---------------pagseguro--------------		
	$().ready(function() {
		var validator = $("#Pagseguro").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				email: {
					required: true,
					email: true
				},
				token: {
					required:true
				}
			}
		});
	});
	//---------------pagseguro--------------			
	
	
	
	
	//---------------vendas--------------		
	$().ready(function() {
		var validator = $("#Vendas").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				valor: {
					required: true
				},
				date_in: {
					required:true
				},
				date_out: {
					required:true
				}
			}
		});
	});
	//---------------vendas--------------		
	
	
	
	
	//---------------cliente--------------		
	$().ready(function() {
		var validator = $("#Cliente").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome: {
					required:true
				},
				cnpj: {
					required: true
				},
				email: {
					required:true,
					email: true					
				}
			}
		});
	});
	//---------------cliente--------------		