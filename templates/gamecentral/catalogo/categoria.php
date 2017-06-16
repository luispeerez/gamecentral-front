<div class="container">
	<?php
		if($this->productos):
	?>
		<div class="brand card">
			<h1><?php echo $this->categorias[$this->categoria] ?></h1>
			<?php 
			foreach ($this->productos as $this->producto): ?>
				<?php $bg = $this->producto->plataforma->empresa;
					$extension = $this->producto->plataforma->empresa == 'Sony' ? '.png' : '.jpg';
					$this->bg = $bg . $extension;
					$this->include_template('product_card','catalogo');
				?>
					
			<?php endforeach; ?>
			<div class="clear"></div>
		</div>
	<?php
		else:
			echo "<h1>No se encontraron productos en esta categoria</h1>";
		endif;
	?>
	<div class="clear"></div>
</div>