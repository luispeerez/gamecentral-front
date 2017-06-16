<?php
/**
*
* Descripcion: 
* Clase contacto, hereda a la clase main(que a su vez hereda a la 
* clase controler). Define las acciones de la seccion de contacto.
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class Contacto extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta 
	* contacto
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function index()
	{
		if($this->get('id') == 'ok'){
			$this->message = 'Gracias por enviar tu mensaje';
		}else if($this->get('id') == 'error'){
			$this->message = 'Hubo un error, verifica tus datos e intenta de nuevo';
		}
		$this->title = 'Gamecentral';
		$this->location = 'contacto';
		$this->template = 'index';
		$this->include_theme('index','index');
	}
	public function do_contact()
	{
		if($this->post('nombre') && $this->post('email') && $this->post('mensaje')){
			header('Location: /contacto/index/ok');
		}else{
			header('Location: /contacto/index/error');			
		}
	}
}
?>
