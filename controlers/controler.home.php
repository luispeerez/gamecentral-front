<?php
/**
*
* Descripcion: 
* Clase Home, hereda a la clase main(que a su vez hereda a la clase
* controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class Home extends main
{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta
	* home, llama a las funciones internas $this->getNoticias y 
	* $this->getPromociones
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/		
	public function index()
	{
		$this->title = 'Gamecentral';
		$this->location = 'home';
		$this->template = 'index';
		$this->getNoticias();
		$this->getPromociones();
		$this->include_theme('index','index');
	}

	/**
	* Descripcion:
	* Funcion getNoticias, realiza una consulta a la base de datos y
	* las asigna a la variable $this->noticias, solo en caso de que sean
	* de tipo destacado.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function getNoticias()
	{
		$noticias = new Noticia();
		$noticias->search_clause = " 1 and tipo_noticia = 'destacado'";
		$this->noticias = $noticias->read('id, titulo_noticia, tipo_noticia, contenido_noticia,imagen, fecha, autor');
	}
	/**
	* Descripcion:
	* Funcion getPromociones, realiza una consulta a la base de datos y
	* las asigna a la variable $this->promociones, solo en caso de que no esten
	* expiradas.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function getPromociones()
	{
		$promociones = new Promocion();
		$promociones->search_clause = "fecha_limite >= NOW()";
		$this->promociones = $promociones->read('id, nombre, imagen,fecha_limite');

	}
}
?>
