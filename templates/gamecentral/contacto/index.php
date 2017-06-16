
	<div class="container">
		<div class="contactbox card">
			<h1>Nos interesa tu opinion</h1><hr>
			<h3><strong><?php echo $this->message; ?></strong></h3>
			<h3>Es muy importante que dejes tu numero telefonico para que nos pongamos en contacto contigo.</h3>
			
			<form action="/contacto/do_contact" method="POST">
			
				<p><label for="nombre">Nombre</label><p>
				<p><input required type="text" name="nombre" class="form-control" placeholder="Ingresa aqui tu Nombre"></p>
				<p><label for="email">Email</label></p>
				<p><input required type="email" name="email" class="form-control" placeholder="Ingresa aqui tu Email"></p>
				<p><label for="telefono">Telefono</label></p>
				<p><input type="text" name="telefono" class="form-control" placeholder="Ingresa tu numero de telefono"></p>
				<p><label for="asunto">Asunto</label></p>
				<p><input required type="text" name="asunto" class="form-control"  placeholder="Asunto" ></p>
				<p><label for="mensaje">Mensaje</label></p>					
				<p><textarea required name="mensaje" placeholder="Mensaje" id="" cols="30" rows="10"></textarea>

				<div align ="center">
				  <input type="submit" value="ENVIAR" class="boton">
				  </form>
				</div>
			</form>
</div>

