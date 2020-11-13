<?php
App::uses('AppModel', 'Model');
/**
 * TipoTramiteHecho Model
 *
 * @property Denuncia $Denuncia
 */
class TipoTramiteHecho extends AppModel {

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
			'foreignKey' => 'tipo_tramite_hecho_id',
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
