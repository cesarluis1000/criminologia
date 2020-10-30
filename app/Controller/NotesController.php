<?php
App::uses('AppController', 'Controller');
/**
 * Notes Controller
 *
 * @property Note $Note
 * @property PaginatorComponent $Paginator
 */
class NotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function denuncias($denuncia = null, $modulo = null){
	    $this->set(compact('denuncia','modulo'));
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Note->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Note->displayField)?$this->Note->displayField:'id';
		$this->set('campo',$campo);
		$conditions = array('order' => array('Note.date'=>'DESC'));
		$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		$conditions = array();
		
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Note'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Note.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('notes', $this->Paginator->paginate());
	}
	
	public function index2(){
	    
	    $offset = 0;
	    if (isset($this->request->query['offset']) && !empty($this->request->query['offset'])){
	        $offset = $this->request->query['offset'];
	    }
	    
	    $limit = 10;
	    if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])){
	        $limit = $this->request->query['limit'];
	    }
	    
	    $conditions = array();
	    $options = array('conditions'=> $conditions,
            	        'order' => array('date DESC'),
            	        'offset' => $offset,
            	        'limit'=> $limit,
            	        'recursive' => 1);
	    
	    $results = $this->Note->find('all',$options);
	    $results = Set::extract($results, '{n}.Note');
	    //pr($notes); exit;
	    
	    $optionsCount  = array('conditions'=> $conditions,
            	        'order' => array('date DESC'),
            	        'recursive' => 1);
	    
	    $count = $this->Note->find('count',$optionsCount);
	    
	    $offsetNext    = $offset + $limit;
	    $next          = ($offset + $limit >= $count) ? null : Router::url('/', true).'api/notes.json?offset='.$offsetNext.'&limit='.$limit;
	    
	    $offsetPrev    = $offset - $limit;
	    $previous      = ($offsetPrev < 0) ? null : Router::url('/', true).'api/notes.json?offset='.$offsetPrev.'&limit='.$limit;
	    
	    $this->set(compact('count', 'next', 'previous', 'results'));
	    
	    $this->set(array(
	        '_serialize' => array('count', 'next', 'previous', 'results')
	    ));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Note->exists($id)) {
			throw new NotFoundException(__('Invalid note'));
		}
		$options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
		$this->set('note', $this->Note->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Note->create();
			if ($this->Note->save($this->request->data)) {
				$this->Flash->success(__('The note has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The note could not be saved. Please, try again.'));
			}
		}
	}

	public function add2() {
	    //pr($this->request->data); exit;
	    $this->Note->create();
	    if (!isset($this->request->data['date']) || empty($this->request->data['date'])){
	        $this->request->data['date'] = date('Y-m-d H:i:s');
	    }
	    if ($this->Note->save($this->request->data)) {
	        $success = true;
	        $message = 'The note has been saved.';
	    } else {
	        $success = false;
	        $message = 'The note could not be saved. Please, try again.';
	    }
	    $this->set(compact('success','message'));
	    $this->set(array(
	        //'response' => $response,
	        '_serialize' => array('success','message')
	    ));
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Note->exists($id)) {
			throw new NotFoundException(__('Invalid note'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Note->save($this->request->data)) {
				$this->Flash->success(__('The note has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The note could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
			$this->request->data = $this->Note->find('first', $options);
		}
	}
			
	public function edit2($id) {
	    
	    $this->Note->id = $id;
	    
	    if (!isset($this->request->data['date']) || empty($this->request->data['date'])){
	        $this->request->data['date'] = date('Y-m-d H:i:s');
	    }
	    if ($this->Note->save($this->request->data)) {
	        $success = true;
	        $message = 'The note has been updated.';
	    } else {
	        $success = false;
	        $message = 'The note could not be updated. Please, try again.';
	    }
	    $this->set(compact('success','message'));
	    $this->set(array(
	        '_serialize' => array('success','message')
	    ));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException(__('Invalid note'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Note->delete()) {
			$this->Flash->success(__('The note has been deleted.'));
		} else {
			$this->Flash->error(__('The note could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function delete2($id) {
	    	    
	    if ($this->Note->delete($id)) {
	        $success = true;
	        $message = 'The note has been removed.';
	    } else {
	        $success = false;
	        $message = 'The note could not be removed. Please, try again.';
	    }
	    $this->set(compact('success','message'));
	    $this->set(array(
	        '_serialize' => array('success','message')
	    ));
	}
}
