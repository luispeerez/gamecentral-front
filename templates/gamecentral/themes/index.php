<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gamecentral</title>
	<?php 
		$this->print_css_tag();
		$this->print_css_tag('animate');
		$this->print_css_tag('jquery.bxslider');
		$this->print_css_tag('supersized');
	?>
	<link href="http://static.wixstatic.com/ficons/f0ce39_5bd31518a05d46fe8f0d57b61526d03e_fi.ico" rel="icon" type="image/x-icon" />
	<script>
		<?php echo $this->uploads_dir;
		echo "var site_bg = '" . $this->config->uploads_dir . "/background/large/" .  $this->background->imagen . "';"; ?>
	</script>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=287929584699013";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="supersized"></div>
	<div id="wrap">
		<div id="topBackRepeat">	
			<div id="main" class="clearfix">
				<?php $this->include_template('header','global'); ?>
				<div id="content">
					<?php $this->include_template($this->template,$this->location);?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->include_template('footer','global'); ?>

<?php 
	$this->print_js_tag('jquery');
	$this->print_js_tag('gmaps-api');
	$this->print_js_tag('gmaps');
	$this->print_js_tag('jquery.bxslider.min');
	$this->print_js_tag('supersized.3.2.7.min');
	$this->print_js_tag('interactions');

?>
</body>
</html>