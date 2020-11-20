<?php
App::uses('AppModel', 'Model');
/**
 * Victimario Model
 *
 * @property Denuncias $Denuncias
 */
class Victimario extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Denuncias' => array(
			'className' => 'Denuncias',
			'foreignKey' => 'denuncias_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
