<?php
/*
*
* Descripcion: 
* Clase sucursales, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class Sucursales extends main
{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta 
	* sucursales, manda a llamar la funcion interna $this->cargarSucursales()
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/		
	public function index()
	{
		$this->title = 'Gamecentral';
		$this->location = 'sucursales';
		$this->template = 'index';
		$this->cargarSucursales();
		$this->include_theme('index','index');
	}

	/**
	* Descripcion: cargarSucursales, hace una consulta a la tabla sucursal
	* todos los registros los almacena en la variable $this->sucursales
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/		
	public function cargarSucursales()
	{
		$sucursales_query = new sucursal();
		$sucursales_query->search_clause = " 1 ";
		$this->sucursales =  $sucursales_query->read('nombre,ciudad,estado,direccion,telefono,correo,latitud,longitud,facebook');
	}
}
?>
