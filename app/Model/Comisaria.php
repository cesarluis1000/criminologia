<?php
App::uses('AppModel', 'Model');
/**
 * Comisaria Model
 *
 * @property Denuncia $Denuncia
 */
class Comisaria extends AppModel {

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
	    'Departamento' => array(
	        'className' => 'Departamento',
	        'foreignKey' => 'departamento_id',
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
		'Denuncia' => array(
			'className' => 'Denuncia',
			'foreignKey' => 'comisaria_id',
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
