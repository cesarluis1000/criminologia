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
			<?php echo $this->Html->link($denuncia['Provincia']['nombre'], array('controller' => 'provincias', 'action' => 'view', $denuncia['Provincia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distrito'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Distrito']['nombre'], array('controller' => 'distritos', 'action' => 'view', $denuncia['Distrito']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comisaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Comisaria']['nombre'], array('controller' => 'comisarias', 'action' => 'view', $denuncia['Comisaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Dependencia Policial'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoDependenciaPolicial']['nombre'], array('controller' => 'tipo_dependencia_policiales', 'action' => 'view', $denuncia['TipoDependenciaPolicial']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Comisaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoComisaria']['nombre'], array('controller' => 'tipo_comisarias', 'action' => 'view', $denuncia['TipoComisaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria Comisaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['CategoriaComisaria']['nombre'], array('controller' => 'categoria_comisarias', 'action' => 'view', $denuncia['CategoriaComisaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Unidad Especializada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoUnidadEspecializada']['nombre'], array('controller' => 'tipo_unidad_especializadas', 'action' => 'view', $denuncia['TipoUnidadEspecializada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacion Hecho'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['SituacionHecho']['nombre'], array('controller' => 'situacion_hechos', 'action' => 'view', $denuncia['SituacionHecho']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Tramite Hecho'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoTramiteHecho']['nombre'], array('controller' => 'tipo_tramite_hechos', 'action' => 'view', $denuncia['TipoTramiteHecho']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Resolucion'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['total_resolucion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Documentos Formulado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TotalDocumentosFormulado']['nombre'], array('controller' => 'total_documentos_formulados', 'action' => 'view', $denuncia['TotalDocumentosFormulado']['id'])); ?>
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
		<dt><?php echo __('Id Sidopl'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['id_sidopl']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Registro Denuncia'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['fecha_registro_denuncia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modalidad Denuncia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['ModalidadDenuncia']['id'], array('controller' => 'modalidad_denuncias', 'action' => 'view', $denuncia['ModalidadDenuncia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fuente Principal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['FuentePrincipal']['nombre'], array('controller' => 'fuente_principales', 'action' => 'view', $denuncia['FuentePrincipal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otro'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['otro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ocurrencia'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['fecha_ocurrencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubigeo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Ubigeo']['id'], array('controller' => 'ubigeos', 'action' => 'view', $denuncia['Ubigeo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Via'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['TipoVia']['id'], array('controller' => 'tipo_vias', 'action' => 'view', $denuncia['TipoVia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generico'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Generico']['id'], array('controller' => 'genericos', 'action' => 'view', $denuncia['Generico']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Especifico'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Especifico']['id'], array('controller' => 'especificos', 'action' => 'view', $denuncia['Especifico']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modalidad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Modalidad']['nombre'], array('controller' => 'modalidades', 'action' => 'view', $denuncia['Modalidad']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Modalidad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['SubModalidad']['nombre'], array('controller' => 'sub_modalidades', 'action' => 'view', $denuncia['SubModalidad']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detalle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['Detalle']['id'], array('controller' => 'detalles', 'action' => 'view', $denuncia['Detalle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuadra'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['cuadra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urbanizacion'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['urbanizacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['latitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['longitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lugar Ocurrencia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['LugarOcurrencia']['id'], array('controller' => 'lugar_ocurrencias', 'action' => 'view', $denuncia['LugarOcurrencia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Medio Utilizado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['FormaMedioUtilizado']['id'], array('controller' => 'forma_medio_utilizados', 'action' => 'view', $denuncia['FormaMedioUtilizado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presuntas Causa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['PresuntasCausa']['id'], array('controller' => 'presuntas_causas', 'action' => 'view', $denuncia['PresuntasCausa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Encontro Victima'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['estado_encontro_victima']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Fisico Mental Victima'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['estado_fisico_mental_victima']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cometido Organizacion Criminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['CometidoOrganizacionCriminal']['nombre'], array('controller' => 'cometido_organizacion_criminales', 'action' => 'view', $denuncia['CometidoOrganizacionCriminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nro Victimas'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['nro_victimas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nro Presuntos Victimarios'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['nro_presuntos_victimarios']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tramite Hecho'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['tramite_hecho']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Documento Formulado'); ?></dt>
		<dd>
			<?php echo h($denuncia['Denuncia']['documento_formulado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Derivada Mp'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['DerivadaMp']['id'], array('controller' => 'derivada_mps', 'action' => 'view', $denuncia['DerivadaMp']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Fiscalia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['NombreFiscalia']['id'], array('controller' => 'nombre_fiscalias', 'action' => 'view', $denuncia['NombreFiscalia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacion Denuncia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($denuncia['SituacionDenuncia']['id'], array('controller' => 'situacion_denuncias', 'action' => 'view', $denuncia['SituacionDenuncia']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
