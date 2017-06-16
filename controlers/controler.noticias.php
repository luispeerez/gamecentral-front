<?php
/**
*
* Descripcion: 
* Clase noticias, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class Noticias extends main
{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta
	* noticias, llama a la funcion interna $this->getNoticia()
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function index()
	{
		$this->title = 'Gamecentral';
		$this->location = 'noticias';
		$this->template = 'index';
		$this->getNoticia();
		$this->include_theme('index','index');
	}

	/**
	* Descripcion:
	* Funcion getNoticia, consulta a la base de datos por un registro en la
	* tabla noticia, el registro a buscar esta basado en la variable id que se
	* obtiene mediante get, el registro se almacena en la variable $this->noticia
	* Se manda a llamar al autor con la funcion interna $this->getAutor
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function getNoticia()
	{
		$id = $this->get('id');
		$noticia = new Noticia($id);
		$noticia->read('titulo_noticia, tipo_noticia, contenido_noticia, fecha, autor_id, imagen');
		$this->noticia = $noticia;
		$this->getAutor($this->noticia->autor_id);
	}

	/**
	* Descripcion: funcion getAutor, obtiene los datos del autor dependiendo de su id
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	* @param $autor_id, identificador del autor en la base 
	*
	*/	
	public function getAutor($autor_id)
	{
		$autor = new Usuario($autor_id);
		$autor->read('email,nombre,imagen,informacion');
		$this->autor = $autor;
	}

	/**
	* Descripcion:
	* Funcion listado,consulta a la base de datos por todos los registros en la
	* tabla noticia, los resultados de la busqueda se almacenan en 
	* la variable $this->noticias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function listado()
	{
		$this->title = 'Gamecentral';
		$this->location = 'noticias';
		
		$noticias_total = new Noticia();
		$noticias_total->search_clause = "1";
		$noticias_total = $noticias_total->read('id');
		$this->total_noticias = count($noticias_total);

		$noticias = new Noticia();
		$noticias->search_clause = "1";
		$noticias->order_by = " fecha_publicacion DESC";
		$this->pagination = new pagination('Noticia',6,$noticias->search_clause);
		$noticias->limit = $this->pagination->limit;
		$this->noticias = $noticias->read('id, titulo_noticia, tipo_noticia, contenido_noticia, fecha, autor, imagen');
		$this->include_theme('index','listado');
	}

	/**
	* Descripcion:
	* Funcion categoria,consulta a la base de datos por todos los registros en 
	* la tabla noticia que cumplan con la categoria, los resultados de la 
	* busqueda se almacenan en 
	* la variable $this->noticias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function categoria()
	{
		$this->cat = $this->get('id');
		$this->title = 'Gamecentral';
		$this->location = 'noticias';

		$noticias_total = new Noticia();
		$noticias_total->search_clause = "1";
		$noticias_total = $noticias_total->read('id');
		$this->total_noticias = count($noticias_total);

		$noticias = new Noticia();
		$noticias->search_clause = "tipo_noticia = '" . $this->cat . "'";
		$noticias->order_by = " fecha_publicacion DESC";		
		$this->pagination = new pagination('Noticia',6,$noticias->search_clause);
		$noticias->limit = $this->pagination->limit;
		$this->noticias = $noticias->read('id, titulo_noticia, tipo_noticia, contenido_noticia, fecha, autor, imagen');
		$this->include_theme('index','listado');
	}

	/**
	* Descripcion:
	* Funcion busqueda,consulta a la base de datos por todos los registros en la
	* tabla noticia, dependiendo del termino especificado en 's' los resultados 
	* de la busqueda se almacenan en la variable $this->noticias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function busqueda()
	{
		$this->termino = $this->post('s');
		$this->title = 'Gamecentral';
		$this->location = 'noticias';
		$noticias = new Noticia();
		$noticias->search_clause = "titulo_noticia LIKE '%".$this->termino."%' OR contenido_noticia LIKE '%".$this->termino."%'";
		$noticias->order_by = " fecha DESC";		
		$this->noticias = $noticias->read('id, titulo_noticia, tipo_noticia, contenido_noticia, fecha, autor, imagen');
		
		$this->include_theme('index','busqueda');
	}

}
?>
