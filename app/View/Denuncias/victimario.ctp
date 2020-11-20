<br/>
<fieldset>
	<br/>
	<legend><?php echo __('Características del presunto victimario'); ?></legend>
	<?php echo $this->Form->create('Victimario', array(
	    'url' => array('controller' => 'notes', 'action' => 'denuncias'),
	    'class' => 'form-horizontal',
		'inputDefaults'=>array('div' => array('class' => 'form-group'),
		    'between' => '<div class="col-sm-6">',
		    'after' => '</div>','class'=>'form-control input-xs',
		    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))))); ?>

		<div class="row">
          <div class="col-sm-6, col-md-5">  
          <?php 
    		echo $this->Form->input('apellido_parterno',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('apellido_marterno',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('nombres',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('tipo_documento_identidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_documento_identidades,'empty' => 'Seleccionar'));
    		echo $this->Form->input('numero_documento',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('sexo',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $sexos,'empty' => 'Seleccionar'));
    		echo $this->Form->input('grupo_edad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $grupo_edades,'empty' => 'Seleccionar'));
    		echo $this->Form->input('edad',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('fecha_nacimiento',array('label'=>array('class'=>'control-label col-sm-6'),'type' => 'text','placeholder'=>'YYYY-MM-DD'));
    		echo $this->Form->input('nivel_educativo_alcanzado',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('ocupacion',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $ocupaciones,'empty' => 'Seleccionar'));
    	   ?>          
          </div>
          <div class="col-sm-6, col-md-5">          
          <?php 
          echo $this->Form->input('estado_civil',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $estado_civiles,'empty' => 'Seleccionar'));
          echo $this->Form->input('lugar_residencia',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('lugar_nacimiento',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('nacionalidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $nacionalidades,'empty' => 'Seleccionar'));
    		echo $this->Form->input('detenido_por',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('antecedentes_penales',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('tipo_delito_anterior',array('label'=>array('class'=>'control-label col-sm-6')));
    		echo $this->Form->input('situacion_denunciado',array('label'=>array('class'=>'control-label col-sm-6'))); ?>
          </div>
          <div class="col-sm-6, col-md-5">
          	<h4>Responsable del Operativo</h4>     
          <?php 
    		echo $this->Form->input('resp_app',array('label'=>array('text'=> 'Primer Apellido','class'=>'control-label col-sm-6')));
    		echo $this->Form->input('resp_apm',array('label'=>array('text'=> 'Segundo Apellido','class'=>'control-label col-sm-6')));
    		echo $this->Form->input('resp_nombres',array('label'=>array('text'=> 'Nombres','class'=>'control-label col-sm-6')));
    	?>
    		</div>
        </div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
					<?php echo $this->Form->button('Guardar', array('type' => 'submit','class'=>'btn btn-success'));  ?>
		</div>
	</div>
		<?php echo $this->Form->end(); ?>
</fieldset>