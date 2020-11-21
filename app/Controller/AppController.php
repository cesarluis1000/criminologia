<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl','RequestHandler',//'DebugKit.Toolbar',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
			//Ruta de logeo
            'loginRedirect' => array(
                'controller' => 'denuncias',
                'action' => 'add'
            ),
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
         'Paginator', 'Session', 'Flash'
    );
    public $helpers = array('Html', 'Form', 'Session');

	public $a_estados;
	
	function beforeFilter(){
	    $this->loadModel('Parametro');
	    $this->response->header('Access-Control-Allow-Origin','*');
	    $this->response->header('Access-Control-Allow-Credentials','true');
	    $this->response->header('Access-Control-Allow-Methods', '*');
	    $this->response->header('Access-Control-Allow-Headers', '*');
	    $this->response->header('Allow', 'GET, POST, PUT, DELETE, OPTIONS');
	    $this->response->header('Content-Type', 'application/json');
	    $this->response->header('Access-Control-Max-Age','3600');
	    
        $this->paginate = array('limit'=>20);
		$this->a_estados = array('A'=>'Activo','D'=>'Desactivo');
		$this->set('a_estados',$this->a_estados);
		
		$this->Auth->unauthorizedRedirect=FALSE ;
		$this->Auth->authError=__('You are not authorized to access that location.');
		
		/*$allow = array('login','logout','display');
		if(in_array($this->params['controller'],array('personas'))){
		    $allow = array_merge($allow,array('index','edit','view','add','delete','options'));		    		    
		}*/
		//$this->Auth->allow($allow);
		$this->Auth->allow('listjson','index','add','denuncias','login','logout','display','login2','index2','add2','edit2','view2','delete2');
	
		$this->__checkAuth();
		$this->__observatorio();
	}
	
	private function __observatorio(){
	    //Acciones que utilizarar el layout observatorio	    
	    $this->acciones_ecommerce = array('denuncias');
	    $this->controladores = array('denuncias','victimas','victimarios');
	    
	    if (in_array($this->action, $this->acciones_ecommerce)){
	        $this->layout = 'observatorio';
	    }
	    
	    if (in_array($this->params['controller'], $this->controladores)){
	        $this->layout = 'observatorio';
	    }
	    
	    $a_simulador = array(
	        'Delitos' => array(
	            array(
	                'controller' => 'denuncias',
	                'action' => 'add',
	                'alias' => 'Localización de la dependencia policial'
	            ),
	            array(
	                'controller' => 'denuncias',
	                'action' => 'edit',
	                'alias' => 'Características de la denuncia policial'
	            ),
	            array(
	                'controller' => 'denuncias',
	                'action' => 'victima',
	                'alias' => 'Características de la victima'
	            ),
	            array(
	                'controller' => 'denuncias',
	                'action' => 'victimario',
	                'alias' => 'Características del presunto victimario'
	            ),
	            array(
	                'controller' => 'notes',
	                'action' => 'denuncias/Delitos/Reporte',
	                'alias' => 'Total de denuncias de delitos'
	            ),
	            array(
	                'controller' => 'notes',
	                'action' => 'denuncias/Delitos/Reporte Regional',
	                'alias' => 'Reporte Comisaria'
	            ),
	            array(
	                'controller' => 'notes',
	                'action' => 'denuncias/Delitos/Reporte Comisaria',
	                'alias' => 'Reporte Comisaria'
	            ),
	    ));
	        
	    $a_denuncias = array(
	        'Delitos' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características de la denuncia policial',
	            'MODULO III' =>'Características de la victima',
	            'MODULO IV' =>'Características del presunto victimario',
	            'Reporte' =>'Total de delitos',
	            'Reporte Regional' =>'Total de denuncias de delitos',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),	        
	        'Faltas' => array(
	            'Denuncia de Faltas' =>'Denuncia de Faltas',
	            'Faltas' =>'Faltas',
	            'Intervenidos por Faltas' =>'Intervenidos por Faltas',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),
	        'Accidentes de transito' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características de la denuncia policial',
	            'MODULO III' =>'Características del fallecido',
	            'MODULO IV' =>'Características del presunto victimario',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),
	        'Operativos policiales' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características del operativo policial',
	            'MODULO III' =>'Características de los detenidos',
	            'MODULO IV' =>'Características de los intervenidos',
	            'MODULO V' =>'Vehículos',
	            'MODULO VI' =>'Decomiso de armas',
	            'MODULO VII' =>'Decomiso de drogas',
	            'MODULO VIII' =>'Incautación de dinero',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),
	        'Intervenciones de detenidos' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características del detenido',
	            'MODULO III' =>'Vehículos robados y recuperados',
	            'MODULO IV' =>'Casos de pandillaje',
	            'MODULO V' =>'Agresión del personal PNP',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),
	        'Ocurrencia de calle' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características de la ocurrencia',
	            'MODULO III' =>'Características del presunto victimario',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),
	        'Registro de fallecidos' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características de la denuncia policial',
	            'MODULO III' =>'Características del fallecido',
	            'MODULO IV' =>'Características del presunto victimario',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor'),
	        'Produccion Policial' => array(
	            'MODULO I' =>'Localización de la dependencia policial',
	            'MODULO II' =>'Características de la producción policial',
	            'MODULO III' =>'Características del fallecido',
	            'Reporte' =>'Reporte',
	            'Reporte Regional' =>'Reporte Regional',
	            'Reporte Comisaria' =>'Reporte Comisaria',
	            'Reporte Mapa de Calor' =>'Reporte Mapa de Calor')
	        );
	    $a_condicion = array('SI'=>'SI','NO'=>'NO');
	    $this->set(compact('a_denuncias','a_simulador','a_condicion'));
	}
	
	public function options(){	    
	    $this->set(array(
	        'options' => array(),
	        '_serialize' => array('options')
	    ));
	}
	

    private function __checkAuth() {
        $currentUser = $this->Auth->user();
        //pr($currentUser);
        if(!empty($currentUser)){
           $params = array('conditions' => array('Aro.model' => 'group', 'Aro.foreign_key' => $currentUser['Group']['id']),'order' => 'Aro.lft','recursive' => 0);
           $aro = $this->Acl->Aro->find('first',$params);
           //pr($aro);
           $this->loadModel('Menu');
           $this->Menu->unbindModel(array('belongsTo' => array('ParentMenu')));
           $this->Menu->unbindModel(array('hasMany' => array('ChildMenu')));
           $params1 = array('conditions' => array('Menu.aro_id' => $aro['Aro']['id'],'Menu.parent_id' => ''),'order' => 'Menu.lft');
           $a_menu = $this->Menu->find('all',$params1);
           foreach ($a_menu as $id => $item){
               
               $this->Menu->unbindModel(array('belongsTo' => array('ParentMenu')));
               $this->Menu->unbindModel(array('hasMany' => array('ChildMenu')));
               $params2 = array('conditions' => array('Menu.parent_id' => $item['Menu']['id']),'order' => 'Menu.lft');
               $a_menu1 = $this->Menu->find('all',$params2);
               
               foreach ($a_menu1 as $id1 => $item1){
                  $params3 = array('conditions' => array('Aco.id' => $item1['Aco']['parent_id']),'recursive' => 0);
                  $a_aco_controlador = $this->Acl->Aco->find('first',$params3);
                  $a_menu1[$id1]['Controlador'] = $a_aco_controlador['Aco'];
               }
               
               $a_menu[$id]['Acciones'] = $a_menu1;
           }
        }
        $this->set(compact('a_menu','currentUser'));
    }
}
