<?php
App::uses('AppModel', 'Model');
/**
 * Denuncia Model
 *
 * @property RegionPolicial $RegionPolicial
 * @property MacroRegion $MacroRegion
 * @property Departamento $Departamento
 * @property Provincia $Provincia
 * @property Distrito $Distrito
 * @property Comisaria $Comisaria
 * @property TipoDependenciaPolicial $TipoDependenciaPolicial
 * @property TipoComisaria $TipoComisaria
 * @property CategoriaComisaria $CategoriaComisaria
 * @property TipoUnidadEspecializada $TipoUnidadEspecializada
 * @property SituacionHecho $SituacionHecho
 * @property TipoTramiteHecho $TipoTramiteHecho
 * @property TotalDocumentosFormulado $TotalDocumentosFormulado
 * @property ModalidadDenuncia $ModalidadDenuncia
 * @property FuentePrincipal $FuentePrincipal
 * @property Generico $Generico
 * @property Especifico $Especifico
 * @property Modalidad $Modalidad
 * @property SubModalidad $SubModalidad
 * @property Detalle $Detalle
 * @property Ubigeo $Ubigeo
 * @property TipoVia $TipoVia
 * @property LugarOcurrencia $LugarOcurrencia
 * @property FormaMedioUtilizado $FormaMedioUtilizado
 * @property PresuntasCausa $PresuntasCausa
 * @property CometidoOrganizacionCriminal $CometidoOrganizacionCriminal
 * @property DerivadaMp $DerivadaMp
 * @property NombreFiscalia $NombreFiscalia
 * @property SituacionDenuncia $SituacionDenuncia
 */
class Denuncia extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'RegionPolicial' => array(
			'className' => 'RegionPolicial',
			'foreignKey' => 'region_policial_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MacroRegion' => array(
			'className' => 'MacroRegion',
			'foreignKey' => 'macro_region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Departamento' => array(
			'className' => 'Departamento',
			'foreignKey' => 'departamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Distrito' => array(
			'className' => 'Distrito',
			'foreignKey' => 'distrito_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Comisaria' => array(
			'className' => 'Comisaria',
			'foreignKey' => 'comisaria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoDependenciaPolicial' => array(
			'className' => 'TipoDependenciaPolicial',
			'foreignKey' => 'tipo_dependencia_policial_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoComisaria' => array(
			'className' => 'TipoComisaria',
			'foreignKey' => 'tipo_comisaria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CategoriaComisaria' => array(
			'className' => 'CategoriaComisaria',
			'foreignKey' => 'categoria_comisaria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoUnidadEspecializada' => array(
			'className' => 'TipoUnidadEspecializada',
			'foreignKey' => 'tipo_unidad_especializada_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SituacionHecho' => array(
			'className' => 'SituacionHecho',
			'foreignKey' => 'situacion_hecho_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoTramiteHecho' => array(
			'className' => 'TipoTramiteHecho',
			'foreignKey' => 'tipo_tramite_hecho_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TotalDocumentosFormulado' => array(
			'className' => 'TotalDocumentosFormulado',
			'foreignKey' => 'total_documentos_formulado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ModalidadDenuncia' => array(
			'className' => 'ModalidadDenuncia',
			'foreignKey' => 'modalidad_denuncia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FuentePrincipal' => array(
			'className' => 'FuentePrincipal',
			'foreignKey' => 'fuente_principal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Generico' => array(
			'className' => 'Generico',
			'foreignKey' => 'generico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Especifico' => array(
			'className' => 'Especifico',
			'foreignKey' => 'especifico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modalidad' => array(
			'className' => 'Modalidad',
			'foreignKey' => 'modalidad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SubModalidad' => array(
			'className' => 'SubModalidad',
			'foreignKey' => 'sub_modalidad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Detalle' => array(
			'className' => 'Detalle',
			'foreignKey' => 'detalle_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ubigeo' => array(
			'className' => 'Ubigeo',
			'foreignKey' => 'ubigeo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoVia' => array(
			'className' => 'TipoVia',
			'foreignKey' => 'tipo_via_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LugarOcurrencia' => array(
			'className' => 'LugarOcurrencia',
			'foreignKey' => 'lugar_ocurrencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FormaMedioUtilizado' => array(
			'className' => 'FormaMedioUtilizado',
			'foreignKey' => 'forma_medio_utilizado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PresuntasCausa' => array(
			'className' => 'PresuntasCausa',
			'foreignKey' => 'presuntas_causa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CometidoOrganizacionCriminal' => array(
			'className' => 'CometidoOrganizacionCriminal',
			'foreignKey' => 'cometido_organizacion_criminal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DerivadaMp' => array(
			'className' => 'DerivadaMp',
			'foreignKey' => 'derivada_mp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'NombreFiscalia' => array(
			'className' => 'NombreFiscalia',
			'foreignKey' => 'nombre_fiscalia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SituacionDenuncia' => array(
			'className' => 'SituacionDenuncia',
			'foreignKey' => 'situacion_denuncia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
