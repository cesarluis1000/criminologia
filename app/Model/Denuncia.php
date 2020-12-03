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
 * @property Ubigeo $Ubigeo
 * @property TipoVia $TipoVia
 * @property Generico $Generico
 * @property Especifico $Especifico
 * @property Modalidad $Modalidad
 * @property SubModalidad $SubModalidad
 * @property Detalle $Detalle
 * @property LugarOcurrencia $LugarOcurrencia
 * @property FormaMedioUtilizado $FormaMedioUtilizado
 * @property PresuntasCausa $PresuntasCausa
 * @property DerivadaMp $DerivadaMp
 * @property NombreFiscalia $NombreFiscalia
 * @property SituacionDenuncia $SituacionDenuncia
 */
class Denuncia extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'region_policial_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'macro_region_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'departamento_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'provincia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'distrito_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'comisaria_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_dependencia_policial_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_comisaria_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'categoria_comisaria_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_unidad_especializada_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'situacion_hecho_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_tramite_hecho_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_resolucion' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_documentos_formulado_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_bandas_desarticuladas' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	    'total_detenidos_captura_bandas' => array(
	        'required' => array(
	            'rule' => 'notEmpty', // use notBlank as of CakePHP 2.7
	            'message' => 'Required.'
	        ),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_organizacion_criminal' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_personas_desaparecidas' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_personas_aparecidas' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'id_sidopl' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_registro_denuncia' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modalidad_denuncia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fuente_principal_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'otro' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_ocurrencia' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ubigeo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_via_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cuadra' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'direccion' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'numero' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'urbanizacion' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'latitud' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitud' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'generico_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'especifico_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modalidad_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sub_modalidad_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'detalle_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lugar_ocurrencia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'forma_medio_utilizado_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'presuntas_causa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_encontro_victima' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_fisico_mental_victima' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cometido_organizacion_criminal' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nro_victimas' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nro_presuntos_victimarios' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tramite_hecho' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'documento_formulado' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'derivada_mp_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'derivada_mp' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre_fiscalia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'situacion_denuncia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'denunciascol' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
		),
	    'TipoDelito' => array(
	        'className' => 'TipoDelito',
	        'foreignKey' => 'tipo_delito_id',
	        'conditions' => '',
	        'fields' => '',
	        'order' => ''
	    ),
	    'ModalidadesDelito' => array(
	        'className' => 'ModalidadesDelito',
	        'foreignKey' => 'modalidades_delito_id',
	        'conditions' => '',
	        'fields' => '',
	        'order' => ''
	    ),
	    'EspecificacionDelito' => array(
	        'className' => 'EspecificacionDelito',
	        'foreignKey' => 'modalidades_delito_id',
	        'conditions' => '',
	        'fields' => '',
	        'order' => ''
	    )
	);
}
