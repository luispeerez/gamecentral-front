<?php
/**
*
* Descripcion: 
* Clase default_config, define variables de configuracion para el proyecto por 
* default. 
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class default_config{
	/**
	* Descripcion:
	* Funcion __construct o constructor, define las variables de configuracion 
	* del proyecto. Se define el tema a utilizar en la vista, el controlador 
	* por defecto, la accion por defecto,entre otras variables, como el 
	* lenguaje.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function __construct(){
		//system configuration
		$this->theme = 'gamecentral';
		$this->default_controler = 'home';
		$this->default_action = 'index';
		$this->security_variable = "cookie";
			
		//Sofware
		$this->document_root = $_SERVER['DOCUMENT_ROOT']."/";
		$this->lang = "es";
		$this->dev_mode = true;
	}
}
?>
