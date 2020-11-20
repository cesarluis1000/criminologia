<?php
App::uses('AppModel', 'Model');
/**
 * Victima Model
 *
 * @property Denuncias $Denuncias
 */
class Victima extends AppModel {


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
