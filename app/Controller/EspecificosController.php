<?php
App::uses('AppController', 'Controller');
/**
 * Especificos Controller
 *
 * @property Especifico $Especifico
 * @property PaginatorComponent $Paginator
 */
class EspecificosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function listjson(){
	    $this->autoRender = false;
	    $this->response->type('json');
	    $this->loadModel('Parametro');
	    
	    $generico_id = $this->request->query['generico_id'];
	    
	    $options = array('fields'=>array('id','nombre'),
	        'conditions' => array('generico_id' => $generico_id),
	        'recursive' => -1,
	        'order' => array('nombre')
	    );
	    
	    $especificos = $this->Especifico->find('all',$options);
	    $json = json_encode($especificos);
	    $this->response->body($json);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Especifico->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Especifico->displayField)?$this->Especifico->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Especifico'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Especifico.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('especificos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Especifico->exists($id)) {
			throw new NotFoundException(__('Invalid especifico'));
		}
		$options = array('conditions' => array('Especifico.' . $this->Especifico->primaryKey => $id));
		$this->set('especifico', $this->Especifico->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Especifico->create();
			if ($this->Especifico->save($this->request->data)) {
				$this->Flash->success(__('The especifico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The especifico could not be saved. Please, try again.'));
			}
		}
		$genericos = $this->Especifico->Generico->find('list');
		$this->set(compact('genericos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Especifico->exists($id)) {
			throw new NotFoundException(__('Invalid especifico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Especifico->save($this->request->data)) {
				$this->Flash->success(__('The especifico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The especifico could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Especifico.' . $this->Especifico->primaryKey => $id));
			$this->request->data = $this->Especifico->find('first', $options);
		}
		$genericos = $this->Especifico->Generico->find('list');
		$this->set(compact('genericos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Especifico->id = $id;
		if (!$this->Especifico->exists()) {
			throw new NotFoundException(__('Invalid especifico'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Especifico->delete()) {
			$this->Flash->success(__('The especifico has been deleted.'));
		} else {
			$this->Flash->error(__('The especifico could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
