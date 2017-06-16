<div class="container">
	<?php foreach($this->categorias as $categoria => $categoria_label): 
		if($this->$categoria):
	?>

			<div class="brand card">
				<h1><?php echo $categoria_label; ?></h1>
				<?php 
				foreach ($this->$categoria as $this->producto): ?>
					<?php $bg = $this->producto->plataforma->empresa;
						$extension = $this->producto->plataforma->empresa == 'Sony' ? '.png' : '.jpg';
						$this->bg = $bg . $extension;
						$this->include_template('product_card','catalogo');
					?>
						
				<?php endforeach; ?>
				<div class="clear"></div>
				<a href="/catalogo/categoria/<?=$categoria?>" class="view-more">+Ver más</a>
				<div class="clear"></div>
			</div>
	<?php 
		endif;
	endforeach; ?>
	<div class="clear"></div>
</div>
