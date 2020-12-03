<?php
App::uses('AppModel', 'Model');
/**
 * EspecificacionDelito Model
 *
 * @property ModalidadesDelito $ModalidadesDelito
 */
class EspecificacionDelito extends AppModel {

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
		'ModalidadesDelito' => array(
			'className' => 'ModalidadesDelito',
			'foreignKey' => 'modalidades_delito_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
