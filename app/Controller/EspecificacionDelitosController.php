<?php
App::uses('AppController', 'Controller');
/**
 * EspecificacionDelitos Controller
 *
 * @property EspecificacionDelito $EspecificacionDelito
 * @property PaginatorComponent $Paginator
 */
class EspecificacionDelitosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function listjson(){
	    $this->autoRender = false;
	    $this->response->type('json');
	    
	    $modalidades_delito_id = $this->request->query['modalidades_delito_id'];
	    $options = array('fields'=>array('id','nombre'),
	        'conditions' => array('modalidades_delito_id' => $modalidades_delito_id),
	        'recursive' => -1,
	        'order' => array('nombre'));
	    
	    if (isset($this->request->query['especificacion_delito_id'])){
	        $especificacion_delito_id = $this->request->query['especificacion_delito_id'];
	        $options['conditions']['id'] = $especificacion_delito_id;
	    }
	    
	    $especificacionDelitos = $this->EspecificacionDelito->find('all',$options);
	    $json = json_encode($especificacionDelitos);
	    $this->response->body($json);
	}
	/**
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EspecificacionDelito->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->EspecificacionDelito->displayField)?$this->EspecificacionDelito->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['EspecificacionDelito'][$campo] = $nombre ;
			$conditions = array('conditions' => array('EspecificacionDelito.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('especificacionDelitos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EspecificacionDelito->exists($id)) {
			throw new NotFoundException(__('Invalid especificacion delito'));
		}
		$options = array('conditions' => array('EspecificacionDelito.' . $this->EspecificacionDelito->primaryKey => $id));
		$this->set('especificacionDelito', $this->EspecificacionDelito->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EspecificacionDelito->create();
			if ($this->EspecificacionDelito->save($this->request->data)) {
				$this->Flash->success(__('The especificacion delito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The especificacion delito could not be saved. Please, try again.'));
			}
		}
		$modalidadesDelitos = $this->EspecificacionDelito->ModalidadesDelito->find('list');
		$this->set(compact('modalidadesDelitos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EspecificacionDelito->exists($id)) {
			throw new NotFoundException(__('Invalid especificacion delito'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EspecificacionDelito->save($this->request->data)) {
				$this->Flash->success(__('The especificacion delito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The especificacion delito could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EspecificacionDelito.' . $this->EspecificacionDelito->primaryKey => $id));
			$this->request->data = $this->EspecificacionDelito->find('first', $options);
		}
		$modalidadesDelitos = $this->EspecificacionDelito->ModalidadesDelito->find('list');
		$this->set(compact('modalidadesDelitos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EspecificacionDelito->id = $id;
		if (!$this->EspecificacionDelito->exists()) {
			throw new NotFoundException(__('Invalid especificacion delito'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EspecificacionDelito->delete()) {
			$this->Flash->success(__('The especificacion delito has been deleted.'));
		} else {
			$this->Flash->error(__('The especificacion delito could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
