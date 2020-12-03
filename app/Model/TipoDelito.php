<?php
App::uses('AppModel', 'Model');
/**
 * TipoDelito Model
 *
 * @property ModalidadesDelito $ModalidadesDelito
 */
class TipoDelito extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ModalidadesDelito' => array(
			'className' => 'ModalidadesDelito',
			'foreignKey' => 'tipo_delito_id',
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
