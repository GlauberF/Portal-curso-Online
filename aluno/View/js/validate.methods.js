	// extend the current rules with new groovy ones


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
		var validator = $("#TipoComida").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				tipo_comida: {
					required:true
				}
			}
		});

	});


	$().ready(function() {
		var validator = $("#Tipo").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome_tipo: {
					required:true
				},
				id_divisao_bebida_id: {
					required: true
				}
			}
		});

	});


	$().ready(function() {
		var validator = $("#bebida").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome_bebida: {
					required:true
				},
				id_tipo_id: {
					required: true
				}
			}
		});

	});


	$().ready(function() {
		var validator = $("#estabelecimentoIN").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome_estabelecimento: {
					required:true
				},
				email_estabelecimento: {
					required: true
				},
				endereco_estabelecimento: {
					required: true
				},
				bairro_estabelecimento: {
					required: true
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

	$().ready(function() {
		var validator = $("#estabelecimento_folder").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				folder: {
					required:true
				}
			}
		});


	});

	$().ready(function() {
		var validator = $("#Divisao_bebida").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome_divisao_bebida: {
					required:true
				}
			}
		});


	});


	$().ready(function() {
		var validator = $("#promocao").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				email_send: {
					required:true,
					email: true
				},
				email_newsletter: {
					required:true,
					email: true
				}
			}
		});


	});



	$().ready(function() {
		var validator = $("#promocao").bind("invalid-form.validate", function() {

		}).validate({
			debug: false,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("span").next("span") );
			},
			rules: {
				nome_promocao: {
					required:true
				},
				data_entrada: {
					required:true
				},
				data_saida: {
					required:true
				},
				descricao_promocao: {
					required:true
				},
				valor_promocao: {
					required:true
				},
				id_estabelecimento_id: {
					required:true
				}
			}
		});


	});