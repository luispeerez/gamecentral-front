<?php

/*class meal extends table{
	function info(){
		$this->table_name = 'meals';
		$this->has_many['products'] = 'product_meal';
		$this->has_many_keys['products'] = 'meal';
		
		//Scafolding Countructs
		$this->menu = 'management';
		$this->inputs = array(
			"name" => "Nombre,text,required",
			"description" => 'Description,textarea'
		);
		$this->sections = array(
			"Datos" => 'name,description'
		);
	}
}
*/
class Noticia extends table
{
	function info()
	{
		$this->table_name = 'noticia';
	}
}
class Sucursal extends table
{
	function info()
	{
		$this->table_name = 'sucursal';

	}
}

class producto extends table{
	function info(){
		$this->table_name = 'producto';
		$this->has_many['imagenes'] = 'imagen_producto';
		$this->has_many_keys['imagenes'] = 'producto';
		$this->objects['plataforma'] = 'plataforma';
	}
}

class imagen_producto extends table{
	function info(){
		$this->table_name = 'imagenes_productos';
		$this->objects['producto'] = 'producto';
	}
}

class Plataforma extends table
{
	function info(){
		$this->table_name = 'plataforma';
	}
}

class Promocion extends table
{
	function info(){
		$this->table_name = 'promocion';
	}
}

class Background extends table{
	function info(){
		$this->table_name = 'background';
	}
}

class Usuario extends table{
	function info(){
		$this->table_name = "usuarios";
	}	
}

?>