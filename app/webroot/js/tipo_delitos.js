$(function(){
	
	var base = $('base').attr('href');	  

	
	$('#moduloIIITipoDelitoId').click(function(){
		var tipo_delito_id = $(this).val();		
		if (tipo_delito_id !== '' && tipo_delito_id !== undefined) {
			$.ajax({
				url: base+'/ModalidadesDelitos/listjson?tipo_delito_id='+tipo_delito_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIIIModalidadesDelitoId').empty();
				$("#moduloIIIModalidadesDelitoId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['ModalidadesDelito']['id'];	
					var name = data[i]['ModalidadesDelito']['nombre'];
					$("#moduloIIIModalidadesDelitoId").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}
	})
	
	$('#moduloIIIModalidadesDelitoId').click(function(){
		var modalidades_delito_id = $(this).val();
		if (modalidades_delito_id !== '' && modalidades_delito_id !== undefined) {
			$.ajax({
				url: base+'/EspecificacionDelitos/listjson?modalidades_delito_id='+modalidades_delito_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIIIEspecificacionDelitoId').empty();
				$("#moduloIIIEspecificacionDelitoId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['EspecificacionDelito']['id'];	
					var name = data[i]['EspecificacionDelito']['nombre'];
					$("#moduloIIIEspecificacionDelitoId").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}
	});
	
});