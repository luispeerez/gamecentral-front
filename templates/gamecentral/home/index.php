<div class="container home">
	<div class="column left"> 	
		<section class="message card promos">
			<section class="singlepost home">
		 		<div class="postTitle">
			 		<h1>Promociones</h1>
		 		</div>
				<ul class="bxslider">
					<?php foreach ($this->promociones as $promocion) { ?>
						<li><img src="<?php echo $this->config->uploads_dir ?>/promociones/medium/<?php echo $promocion->imagen ?>" alt=""></li>
					<?php } ?>
				</ul>
				<div class="clear"></div>
			</section>
		</section>
		<section class="message card">
 			<div class="imagepost"><div class="overlay"></div><?php $this->print_img_tag('tienda_atras.png','GTA V'); ?></div><div class="clear"></div>
			<section class="singlepost home">
		 		<div class="postTitle">
			 		<h1>¿Quieres tener tu propia tienda de videojuegos?</h1>
		 		</div>
				<p>Conoce nuestro novedoso sistema de trabajo y forma parte de la industria de los  video juegos. Tenemos todo lo que necesitas. Muchas gracias  a nuestro amigo MYM ALK4PON3 por el apoyo.</p>
				<div class="videobox"><div class="video_container"><iframe width="560" height="315" src="//www.youtube.com/embed/L-qgVMH_P0g"  allowfullscreen></iframe></div></div>
				<div class="clear"></div>
			</section>
		</section>
		<section class="notices">
			<?php 
			$i = 1;
			foreach ($this->noticias as $noticia): 
			?>
				<div class="box card">
					<?php 
						$imagen = $noticia->imagen ?  $this->config->uploads_dir . '/noticias/large/' .  $noticia->imagen : '/templates/gamecentral/img/gta.jpg';
					?>
			 		<div class="imagepost" style="background: url(<?php echo $imagen ?>)">
			 			<div class="overlay"></div>
			 		</div>
					<section class="singlepost">
				 		<div class="postTitle">
					 		<h2>Destacados</h2>
					 		<h1><a href="/noticias/index/<?php echo $noticia->id ?>"><?php echo $noticia->titulo_noticia; ?></a></h1>
				 		</div>
						<p><?php echo $this->truncate($noticia->contenido_noticia,220); ?></p>
					</section>
				</div>
				<?php if($i%2 == 0): ?>
					<div class="clear"></div>
				<?php endif; ?>			
			<? 
			$i++;
			endforeach; 
			?>
		</section>
	</div>
	<div class="column right">
		<section class="gallery card">
			<h1>Galeria</h1><hr>
			<ul class="bxslider">
			  <li><?php $this->print_img_tag('slide4.jpg',''); ?></li>
			  <li><?php $this->print_img_tag('slide3.jpg',''); ?></li>
			  <li><?php $this->print_img_tag('slide2.jpg',''); ?></li>
			  <li><?php $this->print_img_tag('slide1.jpg',''); ?></li>
			</ul>
		</section>
		<section class="twitterfeed card">
			<a class="twitter-timeline" href="https://twitter.com/GameCentral_" data-widget-id="443082860828717056">Tweets por @GameCentral_</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</section>
	</div>
	<div class="clear"></div>
</div>

