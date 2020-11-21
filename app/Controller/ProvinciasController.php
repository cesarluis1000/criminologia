<?php
App::uses('AppController', 'Controller');
/**
 * Provincias Controller
 *
 * @property Provincia $Provincia
 * @property PaginatorComponent $Paginator
 */
class ProvinciasController extends AppController {

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
        
        $provincias = $this->Provincia->find('all',$options);
        $json = json_encode($provincias);
        $this->response->body($json);
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Provincia->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Provincia->displayField)?$this->Provincia->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Provincia'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Provincia.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('provincias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
		$this->set('provincia', $this->Provincia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Provincia->create();
			if ($this->Provincia->save($this->request->data)) {
				$this->Flash->success(__('The provincia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The provincia could not be saved. Please, try again.'));
			}
		}
		$departamentos = $this->Provincia->Departamento->find('list');
		$this->set(compact('departamentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Provincia->save($this->request->data)) {
				$this->Flash->success(__('The provincia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The provincia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
			$this->request->data = $this->Provincia->find('first', $options);
		}
		$departamentos = $this->Provincia->Departamento->find('list');
		$this->set(compact('departamentos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Provincia->id = $id;
		if (!$this->Provincia->exists()) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Provincia->delete()) {
			$this->Flash->success(__('The provincia has been deleted.'));
		} else {
			$this->Flash->error(__('The provincia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
