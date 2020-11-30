<br/>
<fieldset>
	<br/>
	<legend><?php echo __('MODULO II. CARACTERÍSTICAS DE LA DENUNCIA POLICIAL'); ?></legend>
	
	<?php

	echo $this->Form->create('moduloII', array(
    'url' => array('controller' => 'denuncias', 'action' => 'victima'),
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'div' => array(
            'class' => 'form-group'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control input-xs',
        'error' => array(
            'attributes' => array(
                'wrap' => 'span',
                'class' => 'help-inline'
            )
        )
    )
));
?>
		
		<div class="row">
          <div class="col-sm-6, col-md-5">          
    		<h4>A. Id Denuncia</h4>    		
    		<?php
    		echo $this->Form->input('id_sidopl',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'required'=>true));
    		echo $this->Form->input('fecha_registro_denuncia',array('label'=>array('class'=>'control-label col-sm-6'),'type' => 'text', 'value' => date("Y-m-d H:i:s"), 'placeholder'=>'YYYY-MM-DD HH:mm:ss', 'required'=>true));
    		echo $this->Form->input('modalidad_denuncia_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $modalidadDenuncias,'empty' => 'Seleccionar', 'required'=>true));
    		echo $this->Form->input('fuente_principal_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $fuentePrincipales,'empty' => 'Seleccionar', 'required'=>true));
    		echo $this->Form->input('otro',array('label'=>array('class'=>'control-label col-sm-6'), 'readonly' => true));
    		?>
          
          </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>B. Localización De La Ocurrencia</h4>
              <?php 
              echo $this->Form->input('fecha_ocurrencia',array('label'=>array('class'=>'control-label col-sm-6'),'type' => 'text','placeholder'=>'YYYY-MM-DD HH:mm:ss', 'required'=>true));
              echo $this->Form->input('tipo_via_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $tipoVias,'empty' => 'Seleccionar', 'required'=>true));
              echo $this->Form->input('cuadra',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
              echo $this->Form->input('direccion',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
              echo $this->Form->input('numero',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'required'=>true));
              echo $this->Form->input('urbanizacion',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
              ?>
        
            <div class="form-group">
    			<label for="moduloIIUbigeoId" class="control-label col-sm-6">Ubigeo</label>
    			<div class="col-sm-6">
    				<?php 
    				echo $this->Html->link(
    				    $this->Html->tag('span', '',array('class' => 'glyphicon glyphicon-map-marker')).'&nbsp;'.__('Google map'),
    				    'https://developers-dot-devsite-v2-prod.appspot.com/maps/documentation/utils/geocoder',
    				    array('target'=>'_blank','escape'=>false,'class'=>'btn btn-default btn-xs') );
    				?>
    			</div>
    		</div>        
          
          	<?php 
            //echo $this->Form->input('ubigeo_id',array('label'=>array('class'=>'control-label col-sm-6')));            
          	echo $this->Form->input('latitud',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'min'=>"-90.000000", 'max'=>"90.000000", 'step'=>"0.000001", 'required'=>true));
          	echo $this->Form->input('longitud',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'min'=>"-180.000000", 'max'=>"-180.000000", 'step'=>"0.000001", 'required'=>true));
            ?>
		</div>
		
		<div class="col-sm-6, col-md-5">          
    		<h4>Ocurrencia</h4>
		<?php 		
		echo $this->Form->input('generico_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $genericos,'empty' => 'Seleccionar', 'required'=>true));
		echo $this->Form->input('especifico_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $especificos,'empty' => 'Seleccionar', 'required'=>true));
		echo $this->Form->input('modalidad_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $modalidades,'empty' => 'Seleccionar', 'required'=>true));
		echo $this->Form->input('sub_modalidad_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $subModalidades,'empty' => 'Seleccionar', 'required'=>true));
		echo $this->Form->input('detalle_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $subModalidades,'empty' => 'Seleccionar', 'required'=>true));
		?>		
          </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>C. Entorno Del Delito</h4>
          <?php 
          echo $this->Form->input('lugar_ocurrencia_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $lugarOcurrencias,'empty' => 'Seleccionar', 'required'=>true));
          echo $this->Form->input('forma_medio_utilizado_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $formaMedioUtilizados,'empty' => 'Seleccionar', 'required'=>true));
          echo $this->Form->input('presuntas_causa_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $presuntasCausas,'empty' => 'Seleccionar', 'required'=>true));
          echo $this->Form->input('estado_encontro_victima',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
          echo $this->Form->input('estado_fisico_mental_victima',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
          echo $this->Form->input('cometido_organizacion_criminal',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $a_condicion,'empty' => 'Seleccionar', 'required'=>true));
          echo $this->Form->input('nro_victimas',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'required'=>true));
          echo $this->Form->input('nro_presuntos_victimarios',array('label'=>array('class'=>'control-label col-sm-6'), 'type' => 'number', 'required'=>true));
          echo $this->Form->input('tramite_hecho',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true));
          echo $this->Form->input('documento_formulado',array('label'=>array('class'=>'control-label col-sm-6'), 'required'=>true)); ?>
          </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>D. Datos De La Fiscalia</h4>
          <?php 
          echo $this->Form->input('derivada_mp',array('label'=>array('text'=> 'Derivada al MP','class'=>'control-label col-sm-6'),'options'=> $a_condicion,'empty' => 'Seleccionar', 'required'=>true));
          echo $this->Form->input('nombre_fiscalia_id',array('label'=>array('class'=>'control-label col-sm-6'),'options'=> $nombreFiscalias,'empty' => 'Seleccionar', 'required'=>true));?>
          </div>
          <div class="col-sm-6, col-md-5">          
    		<h4>E. Otros Datos</h4>
          <?php 
          echo $this->Form->input('situacion_denuncia_id',array('label'=>array('text'=> 'Registro del proceso de investigación preliminar','class'=>'control-label col-sm-6'),'options'=> $situacionDenuncias,'empty' => 'Seleccionar', 'required'=>true));
	       ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
					<?php echo $this->Form->button('Anterior',array('type' => 'button','class'=>'btn btn-success',
					    'onclick' => "location.href='".$this->Html->url(array('controller' => 'denuncias', 'action' => 'add'))."'")); ?>
					<?php echo $this->Form->button('Siguiente', array('type' => 'submit','class'=>'btn btn-success'));  ?>
		</div>
	</div>
		<?php echo $this->Form->end(); ?>
</fieldset>
<?php 
    echo $this->Html->script('criminologia.js');
?>