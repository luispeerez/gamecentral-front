			<div class="product card">
				<div class="console">
					<div class="imagepost"><div class="overlay"></div><?php $this->print_img_tag($this->bg,'') ?></div>
					<section class="singlepost">
						<div class="postTitle">
							<h2><?php echo $this->producto->plataforma->nombre ?></h2>
							<h1><?php echo $this->producto->nombre; ?></h1>

							<section class="gallery">
								<ul class="bxslider product-slider">
								  <?php $this->crearGaleria($this->producto); ?>
								</ul>
							</section>
							<p><?php echo $this->producto->descripcion; ?></p>
						</div>
					</section>
				</div>
			</div>