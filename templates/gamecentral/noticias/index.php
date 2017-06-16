
<div class="container">
	<div class="review card">
		<?php 
			$imagen = $this->noticia->imagen ?  $this->config->uploads_dir . '/noticias/large/' .  $this->noticia->imagen : '/templates/gamecentral/img/gta.jpg';
		?>

 		<div class="imagepost" style="background: url(<?php echo $imagen ?>)">
 			<div class="overlay"></div>
			<!--<?php $this->print_img_tag('gta.jpg'); ?>-->
			<!--<img src="<?php echo $imagen ?>" alt="">-->
 		</div>
		<section class="singlepost">
	 		<div class="postTitle">
		 		<h2><?php echo $this->noticia->tipo_noticia ?></h2>
		 		<h1><?php echo $this->noticia->titulo_noticia ?></h1>
	 		</div>
	 		<div class="post-content">
				<p><?php echo $this->noticia->contenido_noticia; ?></p>
			</div>
		</section>
		<div class="card author">
			<div class="avatar">
				<?php 
					$avatar = $this->autor->imagen ?  $this->config->uploads_dir . '/usuarios/tiny/' .  $this->autor->imagen : '/templates/gamecentral/img/gmc.png';
				?>
				<img src="<?php echo $avatar; ?>" alt="">
			</div>
			<div class="info">
				<p><small>Autor de la nota:</small></p>
				<p><strong><?php echo $this->autor->nombre; ?></strong></p>
				<p><?php echo $this->autor->informacion; ?></p>				
			</div>
			<div class="clear"></div>
		</div>

		<div class="fb-comments" data-href="http://www.gc.com/" data-width="890" data-numposts="5" data-colorscheme="light"></div>
	</div>
</div>



