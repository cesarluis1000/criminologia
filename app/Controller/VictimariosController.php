<?php
App::uses('AppController', 'Controller');
/**
 * Victimarios Controller
 *
 * @property Victimario $Victimario
 * @property PaginatorComponent $Paginator
 */
class VictimariosController extends AppController {

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
		$this->Victimario->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Victimario->displayField)?$this->Victimario->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Victimario'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Victimario.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('victimarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Victimario->exists($id)) {
			throw new NotFoundException(__('Invalid victimario'));
		}
		$options = array('conditions' => array('Victimario.' . $this->Victimario->primaryKey => $id));
		$this->set('victimario', $this->Victimario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Victimario->create();
			if ($this->Victimario->save($this->request->data)) {
				$this->Flash->success(__('The victimario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The victimario could not be saved. Please, try again.'));
			}
		}
		$denuncias = $this->Victimario->Denuncia->find('list');
		$this->set(compact('denuncias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Victimario->exists($id)) {
			throw new NotFoundException(__('Invalid victimario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Victimario->save($this->request->data)) {
				$this->Flash->success(__('The victimario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The victimario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Victimario.' . $this->Victimario->primaryKey => $id));
			$this->request->data = $this->Victimario->find('first', $options);
		}
		$denuncias = $this->Victimario->Denuncia->find('list');
		$this->set(compact('denuncias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Victimario->id = $id;
		if (!$this->Victimario->exists()) {
			throw new NotFoundException(__('Invalid victimario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Victimario->delete()) {
			$this->Flash->success(__('The victimario has been deleted.'));
		} else {
			$this->Flash->error(__('The victimario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
