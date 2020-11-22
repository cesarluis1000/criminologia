$(function(){
	
	var base = $('base').attr('href');
	$('#moduloIDepartamentoId').click(function(){
		var departamento_id = $(this).val();		
		if (departamento_id !== '' && departamento_id !== undefined) {
			$.ajax({
				url: base+'/Provincias/listjson?departamento_id='+departamento_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIProvinciaId').empty();
				$("#moduloIProvinciaId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Provincia']['id'];	
					var name = data[i]['Provincia']['nombre'];
					$("#moduloIProvinciaId").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
			
			$.ajax({
				url: base+'/Comisarias/listjson?departamento_id='+departamento_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIComisariaId').empty();
				$("#moduloIComisariaId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Comisaria']['id'];	
					var name = data[i]['Comisaria']['nombre'];
					$("#moduloIComisariaId").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}		
	})
	
	$('#moduloIProvinciaId').click(function(){
		var provincia_id = $(this).val();
		if (provincia_id !== '' && provincia_id !== undefined) {
			$.ajax({
				url: base+'/Distritos/listjson?provincia_id='+provincia_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIDistritoId').empty();
				$("#moduloIDistritoId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Distrito']['id'];	
					var name = data[i]['Distrito']['nombre'];
					$("#moduloIDistritoId").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}
	});
	
});