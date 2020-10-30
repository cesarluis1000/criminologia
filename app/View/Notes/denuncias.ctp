<div class="row">
    <div class="col-md-12">
    	<?php if (empty($denuncia)){ ?>
    		<?php echo $this->Html->image('Delitos/Home Page.png', ['class' => 'img-responsive center-block d-block mx-auto','alt' => 'observatorio']);?>
    	<?php }else{ ?>
    		<?php echo $this->Html->image($denuncia.'/'.$modulo.'.png', ['class' => 'img-responsive center-block d-block mx-auto','alt' => 'observatorio']);?>
    	<?php } ?>
    	
    </div>
</div>