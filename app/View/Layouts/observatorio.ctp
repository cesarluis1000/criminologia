<!DOCTYPE html>
<html>
<head>	
	<meta charset="UTF-8">
	<!-- <?php echo $this->Html->charset(); ?> -->
	<html lang="es">
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>	
	<meta name="description" content="Compra por Internet en elmundotec.com de forma segura y fácil, encontrarás miles de productos y OFERTAS increíbles. Envíos a todo el PERÚ." />
	<meta name="keywords" content="elmundotec, comprar online, elmundotec.com, comprar por internet, comprar en peru, comprar online en peru, comprar por internet en peru" />
	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap-datetimepicker.css');
		echo $this->Html->css('elmundotec.css');
	?>
</head>
<body>
	<div id="container">
	
		<div id="header" class="page-header">		
			<h1 id="titulo" class="bg-primary"><?php    	
        	echo $this->Html->link(
        	    $this->Html->image('ODC_LOGO-v7.2_web2.png', ['alt' => 'observatorio']),
        	    '/?n='.time(),['escapeTitle' => false, 'title' =>'observatorio']
        	    );
        	?></h1>
			<?php echo $this->element('logeado'); ?>
		</div>
		
		<div id="content" class="row">
			<!-- Menu -->
			<div class="col-md-2">
				<?php echo $this->element('ecommerce_menu'); ?>
			</div>
			<!-- Vista -->
			<div class="index col-md-10">
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		
		<div id="footer" class="alert alert-info text-right">			
			<h4>
				<?php echo 'Desarrollado por el Observatoio del Delito y la Criminalidad'; ?>
			</h4>
		</div>
		
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<?php echo $this->Html->script('jquery-3.2.1.min.js'); ?>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
    <!-- Bootstrap datetimepicker Plugin -->
    <?php echo $this->Html->script('moment.min.js'); ?>
    <?php echo $this->Html->script('bootstrap-datetimepicker.min.js'); ?>
    <?php echo $this->Html->script('locale/es.js'); ?>
	<?php echo $this->Html->script('elmundotec.js'); ?>
</body>
</html>
