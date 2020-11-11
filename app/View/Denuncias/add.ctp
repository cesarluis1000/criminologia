<fieldset>
	<legend><?php echo __('DENUNCIA DE DELITOS'); ?></legend>
	<?php echo $this->Form->create('Denuncia', array(
	    'class' => 'form-horizontal',
		'inputDefaults'=>array('div' => array('class' => 'form-group'),
		                      'between' => '<div class="col-sm-6">',
		                      'after' => '</div>',
		                      'class'=>'form-control input-xs',
		                      'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))))); ?>
		<?php
		echo $this->Form->input('region_policial_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('macro_region_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('departamento_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('provincia_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('distrito_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('comisaria_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('tipo_dependencia_policial_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('tipo_comisaria_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('categoria_comisaria_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('tipo_unidad_especializada_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('situacion_hecho_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('tipo_tramite_hecho_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_resolucion',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_documentos_formulado_id',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_bandas_desarticuladas',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_detenidos_captura_bandas',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_organizacion_criminal',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_personas_desaparecidas',array('label'=>array('class'=>'control-label col-sm-2')));
		echo $this->Form->input('total_personas_aparecidas',array('label'=>array('class'=>'control-label col-sm-2')));
	?>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
					<?php echo $this->Form->button('Guardar', array('type' => 'submit','class'=>'btn btn-success'));  ?>
		</div>
	</div>
		<?php echo $this->Form->end(); ?>
</fieldset>