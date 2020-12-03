<?php
App::uses('AppModel', 'Model');
/**
 * ModalidadesDelito Model
 *
 * @property TipoDelito $TipoDelito
 * @property EspecificacionDelito $EspecificacionDelito
 */
class ModalidadesDelito extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TipoDelito' => array(
			'className' => 'TipoDelito',
			'foreignKey' => 'tipo_delito_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EspecificacionDelito' => array(
			'className' => 'EspecificacionDelito',
			'foreignKey' => 'modalidades_delito_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
