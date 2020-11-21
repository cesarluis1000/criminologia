<?php
App::uses('AppController', 'Controller');
/**
 * Distritos Controller
 *
 * @property Distrito $Distrito
 * @property PaginatorComponent $Paginator
 */
class DistritosController extends AppController {

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
	    
	    $provincia_id = $this->request->query['provincia_id'];
	    
	    $options = array('fields'=>array('id','nombre'),
	        'conditions' => array('provincia_id' => $provincia_id),
	        'recursive' => -1,
	        'order' => array('nombre')
	    );	    
	    
	    if (isset($this->request->query['distrito_id'])){
	        $distrito_id = $this->request->query['distrito_id'];
	        $options['conditions']['id'] = $distrito_id;
	    }
	    
	    $distritos = $this->Distrito->find('all',$options);
	    $json = json_encode($distritos);
	    $this->response->body($json);
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Distrito->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Distrito->displayField)?$this->Distrito->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Distrito'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Distrito.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('distritos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Distrito->exists($id)) {
			throw new NotFoundException(__('Invalid distrito'));
		}
		$options = array('conditions' => array('Distrito.' . $this->Distrito->primaryKey => $id));
		$this->set('distrito', $this->Distrito->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Distrito->create();
			if ($this->Distrito->save($this->request->data)) {
				$this->Flash->success(__('The distrito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The distrito could not be saved. Please, try again.'));
			}
		}
		$provincias = $this->Distrito->Provincium->find('list');
		$this->set(compact('provincias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Distrito->exists($id)) {
			throw new NotFoundException(__('Invalid distrito'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Distrito->save($this->request->data)) {
				$this->Flash->success(__('The distrito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The distrito could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Distrito.' . $this->Distrito->primaryKey => $id));
			$this->request->data = $this->Distrito->find('first', $options);
		}
		$provincias = $this->Distrito->Provincium->find('list');
		$this->set(compact('provincias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Distrito->id = $id;
		if (!$this->Distrito->exists()) {
			throw new NotFoundException(__('Invalid distrito'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Distrito->delete()) {
			$this->Flash->success(__('The distrito has been deleted.'));
		} else {
			$this->Flash->error(__('The distrito could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
