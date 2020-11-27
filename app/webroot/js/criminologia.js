$(function(){
	
	$('#moduloVIGrupoEdad').click(function(){
		var grupo_edad = $(this).val();
		$('#moduloVIEdad').val('');
		if (grupo_edad == "No precisa"){
			$('#moduloVIEdad').attr("readonly", true);
			$('#moduloVIEdad').attr("required", false);
		}else{
			$('#moduloVIEdad').attr("readonly", false);
			$('#moduloVIEdad').attr("required", true);
		}
	});
	
	$('#moduloVIEdad').change(function(){
		var grupo_edad = $('#moduloVIGrupoEdad').val();
		var edad = $(this).val();
		
		validacion = false;
		switch(grupo_edad){
			case "Menor de 3 años": 
				if(edad <= 3){
					validacion = true;
				}
				break;
			case "Menos de 12 años": 
				if(edad > 3 && edad <= 12){
					validacion = true;
				}
				break;
			case "De 12 años a más años": 
				if(edad > 12){
					validacion = true;
				}
				break;
		}
		
		if(validacion == false){
			$('#moduloVIEdad').val('');			
		}
		
	});	
	
	$('#moduloIIIGrupoEdad').click(function(){
		var grupo_edad = $(this).val();
		$('#moduloIIIEdad').val('');
		if (grupo_edad == "No precisa"){
			$('#moduloIIIEdad').attr("readonly", true);
			$('#moduloIIIEdad').attr("required", false);
		}else{
			$('#moduloIIIEdad').attr("readonly", false);
			$('#moduloIIIEdad').attr("required", true);
		}
	});
	
	$('#moduloIIIEdad').change(function(){
		var grupo_edad = $('#moduloIIIGrupoEdad').val();
		var edad = $(this).val();
		
		validacion = false;
		switch(grupo_edad){
			case "Menor de 3 años": 
				if(edad <= 3){
					validacion = true;
				}
				break;
			case "Menos de 12 años": 
				if(edad > 3 && edad <= 12){
					validacion = true;
				}
				break;
			case "De 12 años a más años": 
				if(edad > 12){
					validacion = true;
				}
				break;
		}
		
		if(validacion == false){
			$('#moduloIIIEdad').val('');			
		}
		
	});
	
	$('#moduloIIFuentePrincipalId').click(function(){
		var fuente_principal_id = $(this).val();
		if (fuente_principal_id == 9){
			$('#moduloIIOtro').attr("readonly", false);
		}else{
			$('#moduloIIOtro').attr("readonly", true);
		}
	});
	
	var base = $('base').attr('href');
		
	$('#moduloIRegionPolicialId').click(function(){
		var region_policial_id = $(this).val();
		if (region_policial_id !== '' && region_policial_id !== undefined) {
			$.ajax({
				url: base+'/MacroRegions/listjson?region_policial_id='+region_policial_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIMacroRegionId').empty();
				$("#moduloIMacroRegionId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['MacroRegion']['id'];	
					var name = data[i]['MacroRegion']['nombre'];
					$("#moduloIMacroRegionId").append("<option value='"+id+"'>"+name+"</option>");
				}
				if(len > 0){
					$('#moduloIMacroRegionId').attr("required", true);	
				}else{
					$('#moduloIMacroRegionId').attr("required", false);
				}
				
			});
			
			$.ajax({
				url: base+'/Departamentos/listjson?region_policial_id='+region_policial_id,
				dataType: 'json',
			    async: false,
			}).done(function(data){				
				var len = data.length;
				$('#moduloIDepartamentoId').empty();
				$("#moduloIDepartamentoId").append("<option value=''>Seleccionar</option>");
				for(var i=0; i<len; i++){
					var id = data[i]['Departamento']['id'];	
					var name = data[i]['Departamento']['nombre'];
					$("#moduloIDepartamentoId").append("<option value='"+id+"'>"+name+"</option>");
				}
			});
		}
	});
	
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