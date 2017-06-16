<div class="container">
	<?php
		$contador = 1; 
		foreach ($this->sucursales as $sucursal):
			$odd = $contador%2==0 ? '' : 'odd';
	?>
			<div class="sucursal card <?php echo $odd ?>">
				<div class="map">
					<input type="hidden" name="latitud" value="<?php echo $sucursal->latitud ?>" />	
					<input type="hidden" name="longitud" value="<?php echo $sucursal->longitud ?>" />	
					<div id="sucursal-map<?php echo $contador; ?>" class="sucursal-map"></div>		
				</div>
				<div class="text">
					<h2><?php echo $sucursal->nombre; ?></h2>
					<p><?php echo $sucursal->ciudad . ', ' . $sucursal->estado; ?></p>
					<p><?php echo $sucursal->direccion; ?></p>
					<p>Telefono: <?php echo $sucursal->telefono ?></p>
					<p><?php echo $sucursal->correo ?></p>
				</div>
				<a href="<?php echo $sucursal->facebook; ?>" class="fb"></a>
				<div class="clear"></div>
			</div>
	<?php 
			$contador++;
		endforeach;
	?>
</div>



