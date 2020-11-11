<h2><?php echo __('Denuncia'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region Policial'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['RegionPolicial']['nombre'], array('controller' => 'region_policiales', 'action' => 'view', $denuncia['RegionPolicial']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Macro Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['MacroRegion']['nombre'], array('controller' => 'macro_regiones', 'action' => 'view', $denuncia['MacroRegion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Departamento']['nombre'], array('controller' => 'departamentos', 'action' => 'view', $denuncia['Departamento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Provincia']['id'], array('controller' => 'provincias', 'action' => 'view', $denuncia['Provincia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distrito'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Distrito']['id'], array('controller' => 'distritos', 'action' => 'view', $denuncia['Distrito']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comisaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Comisaria']['id'], array('controller' => 'comisarias', 'action' => 'view', $denuncia['Comisaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Dependencia Policial'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoDependenciaPolicial']['id'], array('controller' => 'tipo_dependencia_policiales', 'action' => 'view', $denuncia['TipoDependenciaPolicial']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Comisaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoComisaria']['id'], array('controller' => 'tipo_comisarias', 'action' => 'view', $denuncia['TipoComisaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria Comisaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['CategoriaComisaria']['id'], array('controller' => 'categoria_comisarias', 'action' => 'view', $denuncia['CategoriaComisaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Unidad Especializada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoUnidadEspecializada']['id'], array('controller' => 'tipo_unidad_especializadas', 'action' => 'view', $denuncia['TipoUnidadEspecializada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacion Hecho'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['SituacionHecho']['id'], array('controller' => 'situacion_hechos', 'action' => 'view', $denuncia['SituacionHecho']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Tramite Hecho'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoTramiteHecho']['id'], array('controller' => 'tipo_tramite_hechos', 'action' => 'view', $denuncia['TipoTramiteHecho']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Resolucion'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_resolucion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Documentos Formulado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TotalDocumentosFormulado']['id'], array('controller' => 'total_documentos_formulados', 'action' => 'view', $denuncia['TotalDocumentosFormulado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Bandas Desarticuladas'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_bandas_desarticuladas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Detenidos Captura Bandas'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_detenidos_captura_bandas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Organizacion Criminal'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_organizacion_criminal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Personas Desaparecidas'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_personas_desaparecidas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Personas Aparecidas'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_personas_aparecidas']); ?>
			&nbsp;
		</dd>
	</dl>
