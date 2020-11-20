<?php
App::uses('AppController', 'Controller');
/**
 * Victimas Controller
 *
 * @property Victima $Victima
 * @property PaginatorComponent $Paginator
 */
class VictimasController extends AppController {

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
		$this->Victima->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Victima->displayField)?$this->Victima->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Victima'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Victima.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('victimas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Victima->exists($id)) {
			throw new NotFoundException(__('Invalid victima'));
		}
		$options = array('conditions' => array('Victima.' . $this->Victima->primaryKey => $id));
		$this->set('victima', $this->Victima->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Victima->create();
			if ($this->Victima->save($this->request->data)) {
				$this->Flash->success(__('The victima has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The victima could not be saved. Please, try again.'));
			}
		}
		$denuncias = $this->Victima->Denuncia->find('list');
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
		if (!$this->Victima->exists($id)) {
			throw new NotFoundException(__('Invalid victima'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Victima->save($this->request->data)) {
				$this->Flash->success(__('The victima has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The victima could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Victima.' . $this->Victima->primaryKey => $id));
			$this->request->data = $this->Victima->find('first', $options);
		}
		$denuncias = $this->Victima->Denuncia->find('list');
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
		$this->Victima->id = $id;
		if (!$this->Victima->exists()) {
			throw new NotFoundException(__('Invalid victima'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Victima->delete()) {
			$this->Flash->success(__('The victima has been deleted.'));
		} else {
			$this->Flash->error(__('The victima could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
