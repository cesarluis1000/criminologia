<?php
App::uses('AppModel', 'Model');
/**
 * FuentePrincipal Model
 *
 * @property Denuncia $Denuncia
 */
class FuentePrincipal extends AppModel {

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
			'foreignKey' => 'fuente_principal_id',
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
