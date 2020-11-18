<?php
App::uses('AppModel', 'Model');
/**
 * Generico Model
 *
 * @property Denuncia $Denuncia
 */
class Generico extends AppModel {

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
		'Denuncia' => array(
			'className' => 'Denuncia',
			'foreignKey' => 'generico_id',
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
