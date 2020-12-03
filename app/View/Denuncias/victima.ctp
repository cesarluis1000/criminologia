<br/>
<fieldset>
	<br/>
	<legend><?php echo __('MODULO III. CARACTERÍSTICAS DE LA VICTIMA'); ?></legend>
	<?php echo $this->Form->create('moduloIII', array(
	    'url' => array('controller' => 'denuncias', 'action' => 'victimario'),
	    'class' => 'form-horizontal',
		'inputDefaults'=>array('div' => array('class' => 'form-group'),
		    'between' => '<div class="col-sm-6">','after' => '</div>','class'=>'form-control input-xs',
		    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))))); ?>
		<div class="row">
          <div class="col-sm-6, col-md-5">
          <h4>Perfil de la Víctima</h4>
          <?php 
        echo $this->Form->input('apellido_parterno',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
        echo $this->Form->input('apellido_marterno',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
        echo $this->Form->input('nombres',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
        echo $this->Form->input('tipo_documento_identidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_documento_identidades,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('numero_documento',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'required'=>true));
        echo $this->Form->input('sexo',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $sexos,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('grupo_edad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $grupo_edades,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('edad',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'required'=>true));
        echo $this->Form->input('fecha_nacimiento',array('label'=>array('class'=>'control-label col-sm-6'),'type' => 'text','placeholder'=>'YYYY-MM-DD', 'required'=>true));
        echo $this->Form->input('nivel_educativo_alcanzado',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $nivel_educativo_alcanzados,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('ocupacion',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $ocupaciones,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('estado_civil',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $estado_civiles,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('lugar_residencia',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
        echo $this->Form->input('lugar_nacimiento',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
        echo $this->Form->input('nacionalidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $nacionalidades,'empty' => 'Seleccionar', 'required'=>true));
		?>
      </div>
      <div class="col-sm-6, col-md-5"> 
      <h4>Situación de la Víctima</h4>         
      <?php
        echo $this->Form->input('reincidencia',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $reincidencias,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('tipo_delito_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_delitos,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('modalidades_delito_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $modalidad_delitos,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('especificacion_delito_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $especificacion_delitos,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('parentesco_victimaro',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $parentesco_victimaros,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('situacion_victima',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $situacion_victimas,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('estado_encontro_victima',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $estado_encontro_victimas,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('presenta_problemas_mental',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $presenta_problemas_mentales,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('tipo_problemas_mental',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_problemas_mentales,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('presenta_discapacidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $presenta_discapacidades,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('tipo_discapacidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_discapacidades,'empty' => 'Seleccionar', 'required'=>true));
        echo $this->Form->input('situacion_denuncia',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $situacion_denuncias,'empty' => 'Seleccionar', 'required'=>true));
		?>
    		</div>
        </div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<?php echo $this->Form->button('Anterior',array('type' => 'button','class'=>'btn btn-success',
					    'onclick' => "location.href='".$this->Html->url(array('controller' => 'denuncias', 'action' => 'edit'))."'")); ?>
			<?php echo $this->Form->button('Siguiente', array('type' => 'submit','class'=>'btn btn-success'));  ?>
		</div>
	</div>
		<?php echo $this->Form->end(); ?>
</fieldset>
<?php 
echo $this->Html->script('criminologia.js');
echo $this->Html->script('tipo_delitos.js');
?>