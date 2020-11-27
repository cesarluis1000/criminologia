<?php
App::uses('AppController', 'Controller');
/**
 * MacroRegions Controller
 *
 * @property MacroRegion $MacroRegion
 * @property PaginatorComponent $Paginator
 */
class MacroRegionsController extends AppController {

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
        
        $region_policial_id = $this->request->query['region_policial_id'];
        
        $options = array(
            'conditions' => array('RegionPolicial.id' => $region_policial_id)         ,
            'recursive' => -1,
            'order' => array('nombre')
        );
                
        $regionPolicial = $this->MacroRegion->RegionPolicial->find('first',$options);
        
        $macro_region_id = $regionPolicial['RegionPolicial']['macro_region_id'];
                
        $options = array(
            'conditions' => array('MacroRegion.id' => $macro_region_id)         ,
            'recursive' => -1,
            'order' => array('nombre')
        );
        
        $macroRegion = $this->MacroRegion->find('all',$options);

        $json = json_encode($macroRegion);
        $this->response->body($json);
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MacroRegion->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->MacroRegion->displayField)?$this->MacroRegion->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['MacroRegion'][$campo] = $nombre ;
			$conditions = array('conditions' => array('MacroRegion.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('macroRegions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MacroRegion->exists($id)) {
			throw new NotFoundException(__('Invalid macro region'));
		}
		$options = array('conditions' => array('MacroRegion.' . $this->MacroRegion->primaryKey => $id));
		$this->set('macroRegion', $this->MacroRegion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MacroRegion->create();
			if ($this->MacroRegion->save($this->request->data)) {
				$this->Flash->success(__('The macro region has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The macro region could not be saved. Please, try again.'));
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
		if (!$this->MacroRegion->exists($id)) {
			throw new NotFoundException(__('Invalid macro region'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MacroRegion->save($this->request->data)) {
				$this->Flash->success(__('The macro region has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The macro region could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MacroRegion.' . $this->MacroRegion->primaryKey => $id));
			$this->request->data = $this->MacroRegion->find('first', $options);
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
		$this->MacroRegion->id = $id;
		if (!$this->MacroRegion->exists()) {
			throw new NotFoundException(__('Invalid macro region'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MacroRegion->delete()) {
			$this->Flash->success(__('The macro region has been deleted.'));
		} else {
			$this->Flash->error(__('The macro region could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
