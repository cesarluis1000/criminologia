<br/>
<fieldset>
	<br/>
	<legend><?php echo __('MODULO I. LOCALIZACIÓN DE LA DEPENDENCIA POLICIAL'); ?></legend>
	<?php echo $this->Form->create(false, array(
	    'url' => array('controller' => 'denuncias', 'action' => 'edit'),
	    'class' => 'form-horizontal',
		'inputDefaults'=>array('div' => array('class' => 'form-group'),
		                      'between' => '<div class="col-sm-6">',
		                      'after' => '</div>',
		                      'class'=>'form-control input-xs',
		                      'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))))); ?>		
		
		<div class="row">
          <div class="col-sm-6, col-md-5">          
    		<h4>A. Ubicación Geográfica</h4>
          <?php 
            echo $this->Form->input('region_policial_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $regionPolicials,'empty' => 'Seleccionar'));
            echo $this->Form->input('macro_region_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $macroRegions,'empty' => 'Seleccionar'));
            echo $this->Form->input('departamento_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $departamentos,'empty' => 'Seleccionar'));
            echo $this->Form->input('provincia_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $provincias,'empty' => 'Seleccionar'));
            echo $this->Form->input('distrito_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $distritos,'empty' => 'Seleccionar'));?>
          
          </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>B. Identificación de la Dependencia Policial</h4>
          <?php 
            echo $this->Form->input('comisaria_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $comisarias,'empty' => 'Seleccionar'));
            echo $this->Form->input('tipo_dependencia_policial_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipoDependenciaPolicials,'empty' => 'Seleccionar'));
            echo $this->Form->input('tipo_comisaria_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipoComisarias,'empty' => 'Seleccionar'));
            echo $this->Form->input('categoria_comisaria_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $categoriaComisarias,'empty' => 'Seleccionar'));
            echo $this->Form->input('tipo_unidad_especializada_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipoUnidadEspecializadas,'empty' => 'Seleccionar'));?>
          </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>C. Datos complementarios</h4>
          <?php 
            echo $this->Form->input('situacion_hecho_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $situacionHechos,'empty' => 'Seleccionar'));
            echo $this->Form->input('tipo_tramite_hecho_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipoTramiteHechos,'empty' => 'Seleccionar'));
    		echo $this->Form->input('total_resolucion',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('total_documentos_formulado_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $totalDocumentosFormulados,'empty' => 'Seleccionar'));
    		echo $this->Form->input('total_bandas_desarticuladas',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('total_detenidos_captura_bandas',array('label'=>array('class'=>'control-label col-sm-6'))); ?>
		  </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>D. Otras denuncias</h4>
          <?php 
            echo $this->Form->input('total_organizacion_criminal',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('total_personas_desaparecidas',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('total_personas_aparecidas',array('label'=>array('class'=>'control-label col-sm-6')));?>
		  </div>
        </div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
					<?php echo $this->Form->button('Siguiente', array('type' => 'submit','class'=>'btn btn-success'));  ?>
		</div>
	</div>
		<?php echo $this->Form->end(); ?>
</fieldset>