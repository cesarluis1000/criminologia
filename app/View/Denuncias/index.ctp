<h2><?php echo __('Denuncias'); ?></h2>

<!-- Buscador -->
<div class="row">
	<div class="col-md-10">
			<?php echo $this->Form->create('Denuncia', array('type' => 'get','url' => 'index','class' => 'form-inline','inputDefaults'=>array('div' => array('class' => 'form-group'),'class'=>'form-control input-xs'))); ?>	
			<?php echo $this->Form->input($campo,array('required' => false,'label'=>false)); ?>
			<?php echo $this->Form->button('Buscar', array('type' => 'submit','class'=>'btn btn-primary btn-xs'));  ?>
			<?php echo $this->Form->button('Limpiar', array('type' => 'reset','class'=>'btn btn-primary btn-xs'));  ?>		
			<?php echo $this->Form->end(); ?>	
     </div>
     <div class="col-md-2 text-right">
    		<?php echo $this->Html->link($this->Html->tag('span','', array('class' => 'glyphicon glyphicon-file')).__(' Nuevo'),array('action' => 'add'),array('class' => 'btn btn-success btn-xs','escape'=>false)); ?>
    </div>
</div>

<!-- Paginador y boton Nuevo -->
<?php $this->Paginator->options['url']['?'] = $this->params['url']; ?>
<div class="row text-right">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentTag' => 'a', 'currentClass' => 'active','first' => 1));
					echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				?>
            </ul>
        </nav>
    </div>        
</div>

<!-- Contenido de los registros y las acciones -->
<div class="table-responsive">
<table class="table table-hover table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('region_policial_id'); ?></th>
			<th><?php echo $this->Paginator->sort('macro_region_id'); ?></th>
			<th><?php echo $this->Paginator->sort('departamento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('provincia_id'); ?></th>
			<th><?php echo $this->Paginator->sort('distrito_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comisaria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_dependencia_policial_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_comisaria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_comisaria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_unidad_especializada_id'); ?></th>
			<th><?php echo $this->Paginator->sort('situacion_hecho_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_tramite_hecho_id'); ?></th>
			<th><?php echo $this->Paginator->sort('total_resolucion'); ?></th>
			<th><?php echo $this->Paginator->sort('total_documentos_formulado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('total_bandas_desarticuladas'); ?></th>
			<th><?php echo $this->Paginator->sort('total_detenidos_captura_bandas'); ?></th>
			<th><?php echo $this->Paginator->sort('total_organizacion_criminal'); ?></th>
			<th><?php echo $this->Paginator->sort('total_personas_desaparecidas'); ?></th>
			<th><?php echo $this->Paginator->sort('total_personas_aparecidas'); ?></th>
			<th><?php echo $this->Paginator->sort('id_sidopl'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_registro_denuncia'); ?></th>
			<th><?php echo $this->Paginator->sort('modalidad_denuncia_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fuente_principal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('otro'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_ocurrencia'); ?></th>
			<th><?php echo $this->Paginator->sort('ubigeo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_via_id'); ?></th>
			<th><?php echo $this->Paginator->sort('generico_id'); ?></th>
			<th><?php echo $this->Paginator->sort('especifico_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modalidad_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_modalidad_id'); ?></th>
			<th><?php echo $this->Paginator->sort('detalle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cuadra'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('numero'); ?></th>
			<th><?php echo $this->Paginator->sort('urbanizacion'); ?></th>
			<th><?php echo $this->Paginator->sort('latitud'); ?></th>
			<th><?php echo $this->Paginator->sort('longitud'); ?></th>
			<th><?php echo $this->Paginator->sort('lugar_ocurrencia_id'); ?></th>
			<th><?php echo $this->Paginator->sort('forma_medio_utilizado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('presuntas_causa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estado_encontro_victima'); ?></th>
			<th><?php echo $this->Paginator->sort('estado_fisico_mental_victima'); ?></th>
			<th><?php echo $this->Paginator->sort('cometido_organizacion_criminal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nro_victimas'); ?></th>
			<th><?php echo $this->Paginator->sort('nro_presuntos_victimarios'); ?></th>
			<th><?php echo $this->Paginator->sort('tramite_hecho'); ?></th>
			<th><?php echo $this->Paginator->sort('documento_formulado'); ?></th>
			<th><?php echo $this->Paginator->sort('derivada_mp_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre_fiscalia_id'); ?></th>
			<th><?php echo $this->Paginator->sort('situacion_denuncia_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($denuncias as $denuncia): ?>
	<tr>
		<td><?php echo h($denuncia['Denuncia']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['RegionPolicial']['nombre'], array('controller' => 'region_policiales', 'action' => 'view', $denuncia['RegionPolicial']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['MacroRegion']['nombre'], array('controller' => 'macro_regiones', 'action' => 'view', $denuncia['MacroRegion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Departamento']['nombre'], array('controller' => 'departamentos', 'action' => 'view', $denuncia['Departamento']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Provincia']['nombre'], array('controller' => 'provincias', 'action' => 'view', $denuncia['Provincia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Distrito']['nombre'], array('controller' => 'distritos', 'action' => 'view', $denuncia['Distrito']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Comisaria']['nombre'], array('controller' => 'comisarias', 'action' => 'view', $denuncia['Comisaria']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['TipoDependenciaPolicial']['nombre'], array('controller' => 'tipo_dependencia_policiales', 'action' => 'view', $denuncia['TipoDependenciaPolicial']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['TipoComisaria']['nombre'], array('controller' => 'tipo_comisarias', 'action' => 'view', $denuncia['TipoComisaria']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['CategoriaComisaria']['nombre'], array('controller' => 'categoria_comisarias', 'action' => 'view', $denuncia['CategoriaComisaria']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['TipoUnidadEspecializada']['nombre'], array('controller' => 'tipo_unidad_especializadas', 'action' => 'view', $denuncia['TipoUnidadEspecializada']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['SituacionHecho']['nombre'], array('controller' => 'situacion_hechos', 'action' => 'view', $denuncia['SituacionHecho']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['TipoTramiteHecho']['nombre'], array('controller' => 'tipo_tramite_hechos', 'action' => 'view', $denuncia['TipoTramiteHecho']['id'])); ?>
		</td>
		<td><?php echo h($denuncia['Denuncia']['total_resolucion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['TotalDocumentosFormulado']['nombre'], array('controller' => 'total_documentos_formulados', 'action' => 'view', $denuncia['TotalDocumentosFormulado']['id'])); ?>
		</td>
		<td><?php echo h($denuncia['Denuncia']['total_bandas_desarticuladas']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['total_detenidos_captura_bandas']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['total_organizacion_criminal']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['total_personas_desaparecidas']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['total_personas_aparecidas']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['id_sidopl']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['fecha_registro_denuncia']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['ModalidadDenuncia']['id'], array('controller' => 'modalidad_denuncias', 'action' => 'view', $denuncia['ModalidadDenuncia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['FuentePrincipal']['nombre'], array('controller' => 'fuente_principales', 'action' => 'view', $denuncia['FuentePrincipal']['id'])); ?>
		</td>
		<td><?php echo h($denuncia['Denuncia']['otro']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['fecha_ocurrencia']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['Ubigeo']['id'], array('controller' => 'ubigeos', 'action' => 'view', $denuncia['Ubigeo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['TipoVia']['id'], array('controller' => 'tipo_vias', 'action' => 'view', $denuncia['TipoVia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Generico']['id'], array('controller' => 'genericos', 'action' => 'view', $denuncia['Generico']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Especifico']['id'], array('controller' => 'especificos', 'action' => 'view', $denuncia['Especifico']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Modalidad']['nombre'], array('controller' => 'modalidades', 'action' => 'view', $denuncia['Modalidad']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['SubModalidad']['nombre'], array('controller' => 'sub_modalidades', 'action' => 'view', $denuncia['SubModalidad']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['Detalle']['id'], array('controller' => 'detalles', 'action' => 'view', $denuncia['Detalle']['id'])); ?>
		</td>
		<td><?php echo h($denuncia['Denuncia']['cuadra']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['numero']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['urbanizacion']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['latitud']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['longitud']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['LugarOcurrencia']['id'], array('controller' => 'lugar_ocurrencias', 'action' => 'view', $denuncia['LugarOcurrencia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['FormaMedioUtilizado']['id'], array('controller' => 'forma_medio_utilizados', 'action' => 'view', $denuncia['FormaMedioUtilizado']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['PresuntasCausa']['id'], array('controller' => 'presuntas_causas', 'action' => 'view', $denuncia['PresuntasCausa']['id'])); ?>
		</td>
		<td><?php echo h($denuncia['Denuncia']['estado_encontro_victima']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['estado_fisico_mental_victima']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['CometidoOrganizacionCriminal']['nombre'], array('controller' => 'cometido_organizacion_criminales', 'action' => 'view', $denuncia['CometidoOrganizacionCriminal']['id'])); ?>
		</td>
		<td><?php echo h($denuncia['Denuncia']['nro_victimas']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['nro_presuntos_victimarios']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['tramite_hecho']); ?>&nbsp;</td>
		<td><?php echo h($denuncia['Denuncia']['documento_formulado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($denuncia['DerivadaMp']['id'], array('controller' => 'derivada_mps', 'action' => 'view', $denuncia['DerivadaMp']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['NombreFiscalia']['id'], array('controller' => 'nombre_fiscalias', 'action' => 'view', $denuncia['NombreFiscalia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($denuncia['SituacionDenuncia']['id'], array('controller' => 'situacion_denuncias', 'action' => 'view', $denuncia['SituacionDenuncia']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-eye-open')), array('action' => 'view', $denuncia['Denuncia']['id']),array('class' => 'btn btn-info btn-xs','escape'=>false)); ?>
			<?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $denuncia['Denuncia']['id']),array('class' => 'btn btn-warning btn-xs','escape'=>false)); ?>
			<?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $denuncia['Denuncia']['id']),array('class' => 'btn btn-danger btn-xs','escape'=>false), __('Are you sure you want to delete # %s?', $denuncia['Denuncia']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>	
</div>