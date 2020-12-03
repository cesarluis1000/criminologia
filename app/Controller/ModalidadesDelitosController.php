<?php
App::uses('AppController', 'Controller');
/**
 * ModalidadesDelitos Controller
 *
 * @property ModalidadesDelito $ModalidadesDelito
 * @property PaginatorComponent $Paginator
 */
class ModalidadesDelitosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function listjson(){
	    $this->autoRender = false;
	    $this->response->type('json');
	    
	    $tipo_delito_id = $this->request->query['tipo_delito_id'];
	    $options = array('fields'=>array('id','nombre'),
	        'conditions' => array('tipo_delito_id' => $tipo_delito_id),
	        'recursive' => -1,
	        'order' => array('nombre'));
	    
	    if (isset($this->request->query['modalidades_delito_id'])){
	        $modalidades_delito_id = $this->request->query['modalidades_delito_id'];
	        $options['conditions']['id'] = $modalidades_delito_id;
	    }
	    
	    $modalidadesDelitos = $this->ModalidadesDelito->find('all',$options);
	    $json = json_encode($modalidadesDelitos);
	    $this->response->body($json);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ModalidadesDelito->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->ModalidadesDelito->displayField)?$this->ModalidadesDelito->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['ModalidadesDelito'][$campo] = $nombre ;
			$conditions = array('conditions' => array('ModalidadesDelito.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('modalidadesDelitos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ModalidadesDelito->exists($id)) {
			throw new NotFoundException(__('Invalid modalidades delito'));
		}
		$options = array('conditions' => array('ModalidadesDelito.' . $this->ModalidadesDelito->primaryKey => $id));
		$this->set('modalidadesDelito', $this->ModalidadesDelito->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ModalidadesDelito->create();
			if ($this->ModalidadesDelito->save($this->request->data)) {
				$this->Flash->success(__('The modalidades delito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The modalidades delito could not be saved. Please, try again.'));
			}
		}
		$tipoDelitos = $this->ModalidadesDelito->TipoDelito->find('list');
		$this->set(compact('tipoDelitos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ModalidadesDelito->exists($id)) {
			throw new NotFoundException(__('Invalid modalidades delito'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ModalidadesDelito->save($this->request->data)) {
				$this->Flash->success(__('The modalidades delito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The modalidades delito could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ModalidadesDelito.' . $this->ModalidadesDelito->primaryKey => $id));
			$this->request->data = $this->ModalidadesDelito->find('first', $options);
		}
		$tipoDelitos = $this->ModalidadesDelito->TipoDelito->find('list');
		$this->set(compact('tipoDelitos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ModalidadesDelito->id = $id;
		if (!$this->ModalidadesDelito->exists()) {
			throw new NotFoundException(__('Invalid modalidades delito'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ModalidadesDelito->delete()) {
			$this->Flash->success(__('The modalidades delito has been deleted.'));
		} else {
			$this->Flash->error(__('The modalidades delito could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
