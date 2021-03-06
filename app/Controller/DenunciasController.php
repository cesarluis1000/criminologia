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
		
	    $departamentos = null;
	    $macroRegions = null;
	    $provincias = null;
	    $distritos = null;
	    $comisarias = null;
	     
	    $this->request->query['moduloI'] = $this->request->data['moduloI'] = $this->Session->read('moduloI');
	    
	    if (isset($this->request->query['moduloI']['region_policial_id'])){
	        $region_policial_id = $this->request->data['moduloI']['region_policial_id'] = $this->request->query['moduloI']['region_policial_id'];
	        
	        $options = array(
	            'conditions' => array('RegionPolicial.id' => $region_policial_id)         ,
	            'recursive' => -1,
	            'order' => array('nombre')
	        );
	        
	        $regionPolicial = $this->Denuncia->RegionPolicial->find('first',$options);
	        
	        $macro_region_id = $regionPolicial['RegionPolicial']['macro_region_id'];
	        
	        $options = array(
	            'conditions' => array('MacroRegion.id' => $macro_region_id)         ,
	            'recursive' => -1,
	            'order' => array('nombre')
	        );
	        
	        $macroRegion = $this->Denuncia->MacroRegion->find('all',$options);
	        
	        $options = array('fields'=>array('id','nombre'),
	            'conditions' => array('region_policial_id' => $region_policial_id),
	            'recursive' => -1,
	            'order' => array('nombre')
	        );
	        $departamentos = $this->Denuncia->Departamento->find('list',$options);
	    }
		
	    if (isset($this->request->query['moduloI']['departamento_id'])){
	        $departamento_id = $this->request->data['moduloI']['departamento_id'] = $this->request->query['moduloI']['departamento_id'];
		    $options = array('fields'=>array('id','nombre'),
		        'conditions' => array('departamento_id' => $departamento_id),
		        'recursive' => -1,
		        'order' => array('nombre'));
		    $provincias = $this->Denuncia->Provincia->find('list',$options);
		    
		    $options = array('fields'=>array('id','nombre'),
		        'conditions' => array('departamento_id' => $departamento_id),
		        'recursive' => -1,
		        'order' => array('nombre')
		    );
		    $comisarias = $this->Denuncia->Comisaria->find('list',$options);
		}
		
		if (isset($this->request->query['moduloI']['provincia_id'])){
		    $provincia_id = $this->request->data['moduloI']['provincia_id'] = $this->request->query['moduloI']['provincia_id'];
		    $options = array('fields'=>array('id','nombre'),
		        'conditions' => array('provincia_id' => $provincia_id),
		        'recursive' => -1,
		        'order' => array('nombre')
		    );
		    $distritos = $this->Denuncia->Distrito->find('list',$options);
		}
		
	    
		$regionPolicials = $this->Denuncia->RegionPolicial->find('list');
		$tipoDependenciaPolicials = $this->Denuncia->TipoDependenciaPolicial->find('list');
		$tipoComisarias = $this->Denuncia->TipoComisaria->find('list');
		$categoriaComisarias = $this->Denuncia->CategoriaComisaria->find('list');
		$tipoUnidadEspecializadas = $this->Denuncia->TipoUnidadEspecializada->find('list');
		$situacionHechos = $this->Denuncia->SituacionHecho->find('list');
		$tipoTramiteHechos = $this->Denuncia->TipoTramiteHecho->find('list');
		$totalDocumentosFormulados = $this->Denuncia->TotalDocumentosFormulado->find('list');
		$this->set(compact('denuncia','modulo','regionPolicials', 'macroRegions', 'departamentos', 
		    'provincias', 'distritos', 'comisarias', 'tipoDependenciaPolicials', 'tipoComisarias',
		     'categoriaComisarias', 'tipoUnidadEspecializadas', 'situacionHechos', 'tipoTramiteHechos', 'totalDocumentosFormulados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($denuncia = null, $modulo = null) {
	    	    
	    if (isset($this->request->data['moduloI']) && !empty($this->request->data['moduloI'])){
	        $this->Session->write('moduloI', $this->request->data['moduloI']);
	    }
	    
	    $this->request->query['moduloII'] = $this->request->data['moduloII'] = $this->Session->read('moduloII');
	    
	    $especificos = null;
	    
	    if (isset($this->request->query['moduloII']['generico_id'])){
	        $generico_id = $this->request->data['moduloII']['generico_id'] = $this->request->query['moduloII']['generico_id'];
	        $options = array('fields'=>array('id','nombre'),
	            'conditions' => array('generico_id' => $generico_id),
	            'recursive' => -1,
	            'order' => array('nombre')
	        );
	        $especificos = $this->Denuncia->Especifico->find('list',$options);
	    }
	    
	    $modalidadDenuncias = $this->Denuncia->ModalidadDenuncia->find('list');
	    $fuentePrincipales = $this->Denuncia->FuentePrincipal->find('list');
	    $tipoVias = $this->Denuncia->TipoVia->find('list');
	    $genericos = $this->Denuncia->Generico->find('list');
	    $modalidades = $this->Denuncia->Modalidad->find('list');
	    $subModalidades = $this->Denuncia->SubModalidad->find('list');
	    $detalles = $this->Denuncia->Detalle->find('list');
	    $lugarOcurrencias = $this->Denuncia->LugarOcurrencia->find('list');
	    $formaMedioUtilizados = $this->Denuncia->FormaMedioUtilizado->find('list');
	    $presuntasCausas = $this->Denuncia->PresuntasCausa->find('list');	     
	    $nombreFiscalias = $this->Denuncia->NombreFiscalia->find('list');
	    $situacionDenuncias = $this->Denuncia->SituacionDenuncia->find('list');
	    $this->set(compact('denuncia','modulo','modalidadDenuncias', 'fuentePrincipales', 'tipoVias', 'especificos', 'genericos', 'modalidades', 'subModalidades', 
	        'detalles', 'lugarOcurrencias', 'formaMedioUtilizados', 'presuntasCausas', 'nombreFiscalias', 'situacionDenuncias'));
	}
	
	public function victima($denuncia = null, $modulo = null) {
	    
	    $modalidad_delitos = null;
	    $especificacion_delitos = null;
	    
	    if (isset($this->request->data['moduloII']) && !empty($this->request->data['moduloII'])){
	        $this->Session->write('moduloII', $this->request->data['moduloII']);
	    }
	    
	    if (isset($this->request->data['moduloVI']) && !empty($this->request->data['moduloVI'])){
	        $this->Session->write('moduloVI', $this->request->data['moduloVI']);
	    }    
	    
	    $this->request->query['moduloIII'] = $this->request->data['moduloIII'] = $this->Session->read('moduloIII');
	    
	    if (isset($this->request->query['moduloIII']['tipo_delito_id'])){
	        $tipo_delito_id = $this->request->data['moduloIII']['tipo_delito_id'] = $this->request->query['moduloIII']['tipo_delito_id'];
	        $options = array('fields'=>array('id','nombre'),
	            'conditions' => array('tipo_delito_id' => $tipo_delito_id),
	            'recursive' => -1,
	            'order' => array('nombre'));
	        $modalidad_delitos = $this->Denuncia->ModalidadesDelito->find('list',$options);
	    }
	    
	    if (isset($this->request->query['moduloIII']['modalidades_delito_id'])){
	        $modalidades_delito_id = $this->request->data['moduloIII']['modalidades_delito_id'] = $this->request->query['moduloIII']['modalidades_delito_id'];
	        $options = array('fields'=>array('id','nombre'),
	            'conditions' => array('modalidades_delito_id' => $modalidades_delito_id),
	            'recursive' => -1,
	            'order' => array('nombre')
	        );
	        $especificacion_delitos = $this->Denuncia->EspecificacionDelito->find('list',$options);
	    }
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'tipo_documento_identidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $tipo_documento_identidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'sexo'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $sexos = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'grupo_edad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $grupo_edades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'nivel_educativo_alcanzado'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $nivel_educativo_alcanzados = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'ocupacion'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $ocupaciones = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'estado_civil'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $estado_civiles = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'nacionalidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $nacionalidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'reincidencia'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $reincidencias = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'parentesco_victimaro'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $parentesco_victimaros = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'situacion_victima'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $situacion_victimas = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'estado_encontro_victima'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $estado_encontro_victimas = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'presenta_problemas_mental'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $presenta_problemas_mentales = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'tipo_problemas_mental'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $tipo_problemas_mentales = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'presenta_discapacidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $presenta_discapacidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'tipo_discapacidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $tipo_discapacidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'situacion_denuncia'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $situacion_denuncias = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $tipo_delitos =  $this->Denuncia->TipoDelito->find('list');
	    
	    
	    $this->set(compact('denuncia','modulo','tipo_documento_identidades','sexos','grupo_edades',
	        'estado_civiles','nacionalidades','nivel_educativo_alcanzados','ocupaciones','reincidencias',
	        'parentesco_victimaros','situacion_victimas','estado_encontro_victimas','presenta_problemas_mentales',
	        'tipo_problemas_mentales','presenta_discapacidades','tipo_discapacidades','situacion_denuncias'
	        ,'tipo_delitos','modalidad_delitos','especificacion_delitos'));
	}
	
	public function victimario($denuncia = null, $modulo = null) {
	    
	    if (isset($this->request->data['moduloIII']) && !empty($this->request->data['moduloIII'])){
	        $this->Session->write('moduloIII', $this->request->data['moduloIII']);
	    }
	    
	    $this->request->query['moduloVI'] = $this->request->data['moduloVI'] = $this->Session->read('moduloVI');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'tipo_documento_identidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $tipo_documento_identidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'sexo'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $sexos = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'grupo_edad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $grupo_edades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'nivel_educativo_alcanzado'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $nivel_educativo_alcanzados = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'ocupacion'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $ocupaciones = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');	    
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'estado_civil'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $estado_civiles = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'nacionalidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $nacionalidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'reincidencia'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $reincidencias = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'parentesco_victima'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $parentesco_victimas = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'situacion_presunto_victimario'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $situacion_presunto_victimarios = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'estado_encontro_victimario'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $estado_encontro_victimarios = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'presenta_problemas_mental'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $presenta_problemas_mentales = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'tipo_problemas_mentales_victimario'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $tipo_problemas_mentales_victimarios = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');	        
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'presenta_discapacidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $presenta_discapacidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $condicion = array(
	        'fields' => array('Parametro.variable','Parametro.valor'),
	        'conditions' => array('Parametro.modulo' => 'tipo_discapacidad'));
	    $parametros = $this->Parametro->find('all',$condicion);
	    $tipo_discapacidades = Hash::combine($parametros, '{n}.Parametro.variable', '{n}.Parametro.valor');
	    
	    $this->set(compact('denuncia','modulo','tipo_documento_identidades','sexos','grupo_edades','nivel_educativo_alcanzados',
	        'estado_civiles','nacionalidades','nivel_educativo_alcanzados','ocupaciones','reincidencias', 'presenta_problemas_mentales',
	        'parentesco_victimas','situacion_presunto_victimarios','estado_encontro_victimarios','tipo_problemas_mentales_victimarios',
	        'presenta_discapacidades','tipo_discapacidades'));
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
