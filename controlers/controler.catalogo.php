<?php
/**
*
* Descripcion: 
* Clase Catalogo, hereda a la clase main(que a su vez hereda a la clase 
* controler).
* Define las acciones de la seccion de catalogo.
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class Catalogo extends main
{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta 
	* catalogo.
	* Se usa la funcion propia cargarProductos() para renderizar los productos
	* del catalogo.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function index()
	{
		$this->categorias = array('accesorios' => 'Accesorios',
								'juegos' => 'Juegos',
								'consolas' => 'Consolas',
								'ropa' => 'Ropa',
								'figuras' => 'Figuras',
								'otros' => 'Otros',
						);
		$this->title = 'Gamecentral';
		$this->location = 'catalogo';
		$this->template = 'index';
		$this->cargarProductos();
		$this->include_theme('index','index');
	}

	/**
	* Descripcion: funcion cargarProductos, carga los productos de la base de
	* datos, los filtra dependiendo de su categoria, categorias que estan 
	* definidas en $this->categorias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function cargarProductos(){
		foreach($this->categorias as $categoria => $categoria_label){
			$productos_query = new producto();
			$productos_query->search_clause = " tipo_producto =  '".$categoria."'";
			$productos_query->limit = 4;
			$this->$categoria = $productos_query->read('id,nombre,tipo_producto,descripcion,plataforma=>empresa,plataforma=>nombre');
		}
	}

	/**
	* Descripcion:
	* Funcion index, renderiza la vista categoria, que se encuentra en la carpeta 
	* catalogo.
	* Se usa la funcion propia cargarProductosCategoria() para renderizar los productos
	* del catalogo.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function categoria()
	{
		$this->categorias = array('accesorios' => 'Accesorios',
								'juegos' => 'Juegos',
								'consolas' => 'Consolas',
								'ropa' => 'Ropa',
								'figuras' => 'Figuras',
								'otros' => 'Otros',
						);
		$this->title = 'Gamecentral';
		$this->location = 'catalogo';
		$this->categoria = $this->get('id');
		$this->cargarProductosCategoria($this->categoria);
		$this->include_theme('index','categoria');
	}

	/**
	* Descripcion: funcion cargarProductos, carga los productos de la base de
	* datos, los filtra dependiendo de su categoria, categorias que estan 
	* definidas en $this->categorias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function cargarProductosCategoria($categoria){
		$productos_query = new producto();
		$productos_query->search_clause = " tipo_producto =  '".$categoria."'";
		$this->productos = $productos_query->read('id,nombre,tipo_producto,descripcion,plataforma=>empresa,plataforma=>nombre');
	}

	/**
	* Descripcion crearGaleria, crea una galeria con las imagenes que contiene
	* el objeto $prod, solo en caso de que este tenga imagenes.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	* @param $prod, objeto de tipo producto.
	*
	*/
	public function crearGaleria($prod){
		$producto = new producto($prod->id);
		$producto->read('imagenes=>imagen');
		if($producto->imagenes){
			foreach ($producto->imagenes as $imagen) {
				echo '<li><img src=" ' . $this->config->uploads_dir . '/productos/medium/'.$imagen->imagen.'" alt=""></li>';
			}
		}else{
			echo '<li><img src="/templates/gamecentral/img/gmc.png" alt=""></li>';
		}
	}
}
?>
