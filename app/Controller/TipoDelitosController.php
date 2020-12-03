<?php
App::uses('AppController', 'Controller');
/**
 * TipoDelitos Controller
 *
 * @property TipoDelito $TipoDelito
 * @property PaginatorComponent $Paginator
 */
class TipoDelitosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TipoDelito->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->TipoDelito->displayField)?$this->TipoDelito->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['TipoDelito'][$campo] = $nombre ;
			$conditions = array('conditions' => array('TipoDelito.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('tipoDelitos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipoDelito->exists($id)) {
			throw new NotFoundException(__('Invalid tipo delito'));
		}
		$options = array('conditions' => array('TipoDelito.' . $this->TipoDelito->primaryKey => $id));
		$this->set('tipoDelito', $this->TipoDelito->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoDelito->create();
			if ($this->TipoDelito->save($this->request->data)) {
				$this->Flash->success(__('The tipo delito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tipo delito could not be saved. Please, try again.'));
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
		if (!$this->TipoDelito->exists($id)) {
			throw new NotFoundException(__('Invalid tipo delito'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipoDelito->save($this->request->data)) {
				$this->Flash->success(__('The tipo delito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tipo delito could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TipoDelito.' . $this->TipoDelito->primaryKey => $id));
			$this->request->data = $this->TipoDelito->find('first', $options);
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
		$this->TipoDelito->id = $id;
		if (!$this->TipoDelito->exists()) {
			throw new NotFoundException(__('Invalid tipo delito'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TipoDelito->delete()) {
			$this->Flash->success(__('The tipo delito has been deleted.'));
		} else {
			$this->Flash->error(__('The tipo delito could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
