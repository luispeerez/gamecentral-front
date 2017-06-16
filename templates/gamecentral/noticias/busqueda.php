<div class="container listado resultados">
	<form action="/noticias/busqueda" method="POST">
		<h2>Resultados de la busqueda : '<?php echo $this->termino; ?>'</h2>
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
</div>