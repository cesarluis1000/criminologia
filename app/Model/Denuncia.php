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
		)
	);
}
