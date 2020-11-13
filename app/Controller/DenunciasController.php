<?php
App::uses('AppController', 'Controller');
/**
 * Denuncias Controller
 *
 * @property Denuncia $Denuncia
 * @property PaginatorComponent $Paginator
 */
class DenunciasController extends AppController {

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
		$this->Denuncia->recursive = 0;
		//Si se busca campo displayField del modelo
		$campo = !empty($this->Denuncia->displayField)?$this->Denuncia->displayField:'id';
		$this->set('campo',$campo);
		if (!empty($this->request->query[$campo])){	    
		    $nombre = $this->request->query[$campo];
			$this->request->data['Denuncia'][$campo] = $nombre ;
			$conditions = array('conditions' => array('Denuncia.'.$campo.' LIKE' => '%'.$nombre.'%'));
			$this->Paginator->settings = array_merge($this->Paginator->settings,$conditions);
		}
		$this->set('denuncias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Denuncia->exists($id)) {
			throw new NotFoundException(__('Invalid denuncia'));
		}
		$options = array('conditions' => array('Denuncia.' . $this->Denuncia->primaryKey => $id));
		$this->set('denuncia', $this->Denuncia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($denuncia = null, $modulo = null) {
	    
	    /*
		if ($this->request->is('post')) {
			$this->Denuncia->create();
			if ($this->Denuncia->save($this->request->data)) {
				$this->Flash->success(__('The denuncia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The denuncia could not be saved. Please, try again.'));
			}
		}*/
		
		$regionPolicials = $this->Denuncia->RegionPolicial->find('list');
		$macroRegions = $this->Denuncia->MacroRegion->find('list');
		$departamentos = $this->Denuncia->Departamento->find('list');
		$provincias = $this->Denuncia->Provincia->find('list');
		$distritos = $this->Denuncia->Distrito->find('list');
		$comisarias = $this->Denuncia->Comisaria->find('list');
		$tipoDependenciaPolicials = $this->Denuncia->TipoDependenciaPolicial->find('list');
		$tipoComisarias = $this->Denuncia->TipoComisaria->find('list');
		$categoriaComisarias = $this->Denuncia->CategoriaComisaria->find('list');
		$tipoUnidadEspecializadas = $this->Denuncia->TipoUnidadEspecializada->find('list');
		$situacionHechos = $this->Denuncia->SituacionHecho->find('list');
		$tipoTramiteHechos = $this->Denuncia->TipoTramiteHecho->find('list');
		$totalDocumentosFormulados = $this->Denuncia->TotalDocumentosFormulado->find('list');
		$this->set(compact('denuncia','modulo','regionPolicials', 'macroRegions', 'departamentos', 'provincias', 'distritos', 'comisarias', 'tipoDependenciaPolicials', 'tipoComisarias', 'categoriaComisarias', 'tipoUnidadEspecializadas', 'situacionHechos', 'tipoTramiteHechos', 'totalDocumentosFormulados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Denuncia->exists($id)) {
			throw new NotFoundException(__('Invalid denuncia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Denuncia->save($this->request->data)) {
				$this->Flash->success(__('The denuncia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The denuncia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Denuncia.' . $this->Denuncia->primaryKey => $id));
			$this->request->data = $this->Denuncia->find('first', $options);
		}
		$regionPolicials = $this->Denuncia->RegionPolicial->find('list');
		$macroRegions = $this->Denuncia->MacroRegion->find('list');
		$departamentos = $this->Denuncia->Departamento->find('list');
		$provincias = $this->Denuncia->Provincium->find('list');
		$distritos = $this->Denuncia->Distrito->find('list');
		$comisarias = $this->Denuncia->Comisarium->find('list');
		$tipoDependenciaPolicials = $this->Denuncia->TipoDependenciaPolicial->find('list');
		$tipoComisarias = $this->Denuncia->TipoComisarium->find('list');
		$categoriaComisarias = $this->Denuncia->CategoriaComisarium->find('list');
		$tipoUnidadEspecializadas = $this->Denuncia->TipoUnidadEspecializada->find('list');
		$situacionHechos = $this->Denuncia->SituacionHecho->find('list');
		$tipoTramiteHechos = $this->Denuncia->TipoTramiteHecho->find('list');
		$totalDocumentosFormulados = $this->Denuncia->TotalDocumentosFormulado->find('list');
		$this->set(compact('regionPolicials', 'macroRegions', 'departamentos', 'provincias', 'distritos', 'comisarias', 'tipoDependenciaPolicials', 'tipoComisarias', 'categoriaComisarias', 'tipoUnidadEspecializadas', 'situacionHechos', 'tipoTramiteHechos', 'totalDocumentosFormulados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Denuncia->id = $id;
		if (!$this->Denuncia->exists()) {
			throw new NotFoundException(__('Invalid denuncia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Denuncia->delete()) {
			$this->Flash->success(__('The denuncia has been deleted.'));
		} else {
			$this->Flash->error(__('The denuncia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
