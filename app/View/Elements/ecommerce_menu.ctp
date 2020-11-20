<div class="row">
	<div class="col-md-12">	
        <div class="panel panel-group" id="main">
        
        	<div class="panel-body">
        	
        		<div class="panel-collapse panel-scroll-marca" id="accordion1">
        			<div class="panel panel-default">					
        					<div class="panel-heading">
        						<h4 class="panel-title">
        							<a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
        								<span class="glyphicon glyphicon-folder-close text-primary"></span>&nbsp;Simulador
        							</a>
        						</h4>
        					</div>
        					<div id="collapse1" class="panel-collapse collapse">
        						<div class="panel-body">
        							<table class="table table-condensed">
        								<tbody>
        									<?php foreach ($a_simulador as $menu => $rows):?>
        											<tr>
                										<td>           										
                										<?php echo '&nbsp;'.'&nbsp;'.'<strong class="text-danger">'.$menu.'</strong>'; ?>
                										</td>
                									</tr>
            									<?php foreach ($rows as $app):?>
                									<tr>
                										<td>
                										<?php $modulo_app = ($app['action'] == $this->params['action'])?
                										'<strong class="text-danger">'.$app['alias'].'</strong>':
                										$app['alias'] ?>
                										<?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-list text-primary')).'&nbsp;'.$modulo_app,
                										    array('controller'=>$app['controller'], 'action'=>$app['action']),array('escape'=>false,'class'=>'menu-level2') ); ?>
                										</td>
                									</tr>
            									<?php endforeach;?>
        									<?php endforeach;?>
        									
        										<tr>
                									<td>           										
                										<?php  echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-list text-primary')).'&nbsp;'.__('Mapa criminologico'),
                										    'https://observatorio.odcpnp.org/Reportes/mapaDelito',array('target'=>'_blank','escape'=>false,'class'=>'menu-level2') ); ?>
                									</td>
                								</tr>
        									
        								</tbody>
        							</table>
        						</div>
        					</div>
        			</div>
        		</div>
        		
        		<br/>

        		<div class="panel-collapse panel-scroll-categoria" id="accordion2">        			
        			<div class="panel panel-default">					
        					<div class="panel-heading">
        						<h4 class="panel-title">
        							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
        								<span class="glyphicon glyphicon-folder-close text-primary"></span>&nbsp;Menú
        							</a>
        						</h4>
        					</div>
        					<div id="collapse2" class="panel-collapse collapse">
        						<div class="panel-body">
        							<table class="table table-condensed">
        								<tbody>
        									<?php foreach ($a_denuncias as $denuncias => $rows):?>
        											<tr>
                										<td>
                										<?php $denuncias_nombre = ($denuncias == $denuncia)?'<strong class="text-danger">'.$denuncias.'</strong>':$denuncias ?>                										
                										<?php echo '&nbsp;'.'&nbsp;'.$denuncias_nombre; ?>
                										</td>
                									</tr>
            									<?php foreach ($rows as $index => $aplicacion):?>
                									<tr>
                										<td>
                										<?php $modulo_nombre = ($denuncias == $denuncia && $index == $modulo)?
                										'<strong class="text-danger">'.$aplicacion.'</strong>':
                										          $aplicacion ?>
                										<?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-list text-primary')).'&nbsp;'.$modulo_nombre,
                										    array('controller'=>'notes', 'action'=>'denuncias',$denuncias, $index),array('escape'=>false,'class'=>'menu-level2') ); ?>
                										</td>
                									</tr>
            									<?php endforeach;?>
        									<?php endforeach;?>
        								</tbody>
        							</table>
        						</div>
        					</div>
        			</div>
        		</div>

        	</div>
        	
        </div>        
    </div>
</div>