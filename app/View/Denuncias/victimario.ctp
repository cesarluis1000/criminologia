<br/>
<fieldset>
	<br/>
	<legend><?php echo __('MODULO IV. CARACTERÍSTICAS DEL PRESUNTO VICTIMARIO'); ?></legend>
	<?php echo $this->Form->create('moduloVI', array(
	    'url' => array('controller' => 'notes', 'action' => 'denuncias'),
	    'class' => 'form-horizontal',
		'inputDefaults'=>array('div' => array('class' => 'form-group'),
		    'between' => '<div class="col-sm-6">',
		    'after' => '</div>','class'=>'form-control input-xs',
		    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))))); ?>

		<div class="row">
          <div class="col-sm-6, col-md-5">
          <h4>Perfil del Victimario</h4> 
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
          <h4>Situación del presunto Victimario</h4>         
          <?php 
            echo $this->Form->input('reincidencia',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $reincidencias,'empty' => 'Seleccionar', 'required'=>true));
            echo $this->Form->input('parentesco_victimaro',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $parentesco_victimas,'empty' => 'Seleccionar', 'required'=>true));
            
            echo $this->Form->input('situacion_presunto_victimario',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $situacion_presunto_victimarios,'empty' => 'Seleccionar', 'required'=>true));
            echo $this->Form->input('estado_encontro_victimario',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $estado_encontro_victimarios,'empty' => 'Seleccionar', 'required'=>true));            
            echo $this->Form->input('presenta_problemas_mental',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $presenta_problemas_mentales,'empty' => 'Seleccionar', 'required'=>true));
            echo $this->Form->input('tipo_problemas_mentales_victimario',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_problemas_mentales_victimarios,'empty' => 'Seleccionar', 'required'=>true));
            
            
            echo $this->Form->input('presenta_discapacidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $presenta_discapacidades,'empty' => 'Seleccionar', 'required'=>true));
            echo $this->Form->input('tipo_discapacidad',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipo_discapacidades,'empty' => 'Seleccionar', 'required'=>true));
    		?>
          </div>
          <div class="col-sm-6, col-md-5">
          	<h4>Responsable del Operativo</h4>     
          <?php 
          echo $this->Form->input('resp_app',array('label'=>array('text'=> 'Primer Apellido','class'=>'control-label col-sm-6'), 'required'=>true));
          echo $this->Form->input('resp_apm',array('label'=>array('text'=> 'Segundo Apellido','class'=>'control-label col-sm-6'), 'required'=>true));
          echo $this->Form->input('resp_nombres',array('label'=>array('text'=> 'Nombres','class'=>'control-label col-sm-6'), 'required'=>true));
    	?>
    		</div>
        </div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<?php 
			//$('#moduloVIDenunciasForm').serialize()
			echo $this->Form->button('Anterior',array('type' => 'button','class'=>'btn btn-success',
			    'onclick' => "location.href='".$this->Html->url(array('controller' => 'denuncias', 'action' => 'victima'))."'")); ?>
			<?php echo $this->Form->button('Guardar', array('type' => 'submit','class'=>'btn btn-success'));  ?>
		</div>
	</div>
		<?php echo $this->Form->end(); ?>
</fieldset>
<?php 
    echo $this->Html->script('criminologia.js');
?>