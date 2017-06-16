<div class="container listado">
	<form action="/noticias/busqueda" method="POST">
		<?php
			$cat = $_GET['id']; 
			if($cat == 'noticia'){$sel1 = 'selected="selected"';}
			else if($cat == 'resena'){$sel2 = 'selected="selected"';}
			else if($cat == 'destacado'){$sel3 = 'selected="selected"';}

		?>
		<select name="" class="form-control navigator">
			<option value="/noticias/listado">Todas las noticias</option>
			<option <?php echo $sel1; ?> value="/noticias/categoria/noticia">Noticias</option>
			<option <?php echo $sel2; ?>  value="/noticias/categoria/resena">Reseñas</option>
			<option <?php echo $sel3; ?>  value="/noticias/categoria/destacado">Destacados</option>

		</select>
		<p><input type="text" class="form-control" placeholder="Buscar" name="s"></p>
		<div class="clear"></div>
	</form>
	<?php 
	$imagenes = array('gmc.png','gtavbg.png','titan.jpg');
	foreach($this->noticias as $noticia): 
		$imagen = $noticia->imagen ?  $this->config->uploads_dir . '/noticias/medium/' .  $noticia->imagen : '/templates/gamecentral/img/gmc.png';
	?>
		<div class="news card">
			<div class="imagenews">
				<a href="/noticias/index/<?php echo $noticia->id ?>">
					<img src="<?php echo $imagen ?>" alt="">
				</a>
			</div>
			<div class="text">
				<h2><a href="/noticias/index/<?php echo $noticia->id ?>"><?php echo $noticia->titulo_noticia; ?></a></h2>
				<h3><?php echo $noticia->fecha; ?> | Autor: <?php echo $noticia->autor; ?></h3>
				<p class="texto"><?php echo $this->truncate($noticia->contenido_noticia,220); ?></p>
			</div>
			<a class="<?php echo $noticia->tipo_noticia; ?> arrow" href="/noticias/index/<?php echo $noticia->id ?>"></a>
			<div class="clear"></div>
		</div>
	<?php	
	 	endforeach;
	?>
	<div id="pagination">
		<?php
	        $base = "/noticias/listado/";
	        $page = $this->get('p')?$this->get('p'):0;
	        $this->print_pagination( $this->total_noticias , $page , $base  );
		?>
	</div>
</div>
