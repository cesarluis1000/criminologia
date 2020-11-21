<?php
App::uses('AppController', 'Controller');
/**
 * Comisarias Controller
 *
 * @property Comisaria $Comisaria
 * @property PaginatorComponent $Paginator
 */
class ComisariasController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator');
    
    public function listjson(){
        $this->autoRender = false;
        $this->response->type('json');
        
        $departamento_id = $this->request->query['departamento_id'];
        
        $options = array('fields'=>array('id','nombre'),
            'conditions' => array('departamento_id' => $departamento_id),
            'recursive' => -1,
            'order' => array('nombre'));
        
        if (isset($this->request->query['provincia_id'])){
            $provincia_id = $this->request->query['provincia_id'];
            $options['conditions']['id'] = $provincia_id;
        }
        
        $provincias = $this->Comisaria->find('all',$options);
        $json = json_encode($provincias);
        $this->response->body($json);
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comisaria->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Comisaria->displayField)?$this->Comisaria->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Comisaria'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Comisaria.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('comisarias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comisaria->exists($id)) {
			throw new NotFoundException(__('Invalid comisaria'));
		}
		$options = array('conditions' => array('Comisaria.' . $this->Comisaria->primaryKey => $id));
		$this->set('comisaria', $this->Comisaria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comisaria->create();
			if ($this->Comisaria->save($this->request->data)) {
				$this->Flash->success(__('The comisaria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The comisaria could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comisaria->exists($id)) {
			throw new NotFoundException(__('Invalid comisaria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comisaria->save($this->request->data)) {
				$this->Flash->success(__('The comisaria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The comisaria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comisaria.' . $this->Comisaria->primaryKey => $id));
			$this->request->data = $this->Comisaria->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comisaria->id = $id;
		if (!$this->Comisaria->exists()) {
			throw new NotFoundException(__('Invalid comisaria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comisaria->delete()) {
			$this->Flash->success(__('The comisaria has been deleted.'));
		} else {
			$this->Flash->error(__('The comisaria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
