$(function(){
	
	var base = $('base').attr('href');
	$('#departamento_id').click(function(){
		var departamento_id = $(this).val();		
		if (departamento_id !== '' && departamento_id !== undefined) {
			$.ajax({
				url: base+'/Provincias/listjson?departamento_id='+departamento_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#provincia_id').empty();
				$("#provincia_id").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Provincia']['id'];	
					var name = data[i]['Provincia']['nombre'];
					$("#provincia_id").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
			
			$.ajax({
				url: base+'/Comisarias/listjson?departamento_id='+departamento_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#comisaria_id').empty();
				$("#comisaria_id").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Comisaria']['id'];	
					var name = data[i]['Comisaria']['nombre'];
					$("#comisaria_id").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}		
	})
	
	$('#provincia_id').click(function(){
		var provincia_id = $(this).val();
		if (provincia_id !== '' && provincia_id !== undefined) {
			$.ajax({
				url: base+'/Distritos/listjson?provincia_id='+provincia_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#distrito_id').empty();
				$("#distrito_id").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Distrito']['id'];	
					var name = data[i]['Distrito']['nombre'];
					$("#distrito_id").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}
	});
	
});