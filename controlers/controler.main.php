<?php
/**
*
* Descripcion: 
* Clase Main, hereda hereda a la clase controler del framework
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class Main extends controler
{
	/**
	* Descripcion:
	* Funcion main, asigna las variables $this->config(variables de 
	* configuracion), crea la conexion a traves de la funcion dbConnect del
	* controlador y agrega el componente
	* Mobile_Detect, clase para detectar si el dispositivo es mobil o de 
	* escritorio
	* @access public
	* @param $config Objeto que contiene las variables de configuracion del 
	* projecto
	* @param $security Variable que establece si el proyecto tiene la seguridad
	* activa
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/

	public function main($config,$security = false)
	{		
		$this->config = $config;
		//$this->security = $security;
		$this->dbConnect();
		$this->add_component("Mobile_Detect");
		$this->loadBackground();	
	}

	/**
	* Descripcion: funcion loadBackground() crea un objeto de tipo background
	* y obtiene su imagen.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function loadBackground()
	{
		$this->background = new Background(1);
		$this->background->read('imagen');
	}

	/**
	* Descripcion: function truncate(), limpia un string y lo acorta,
	* removiendo etiquetas html y elementos iframe.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	* @param $string, variable de tipo string a acortar
	* @param $length, variable de tipo int, para delimitar el string
	* @param $dots, variable de tipo string.(opcional), se agrega al string en
	* caso de que esta se acorte.
	*
	*/	
	public function truncate($string, $length, $dots = "...") {
    	preg_match('@<iframe.*?>.*?</iframe>@is', $string, $matches);
    	$string = str_replace($matches[0],'',$string);
    	$string = strip_tags($string);
    	return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
	}

	/**
	* Descripcion: function print_pagination
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	* @param $total, int
	* @param $page, int pagina actual
	* @param $base
	*
	*/	
    public function print_pagination( $total , $page = 0 , $base ){
        $items = 6; //número de noticias a mostrar, siempre 8
        $show_pages = 9; //núemro de páginas a mostrar
        $current = $page;
        $pages = ceil( $total / $items );
        $end = $pages;
        $start = 1;
        $class = 'animate-BG number';
        if( $total >= $items ){
            if( $show_pages < $pages ){
                $offset = floor($show_pages/2);
                $start = $current - $offset;
                $end = $current + $offset;
                if($start <= 0){
                    $end += 1 - $start;
                    $start = 1;
                }else{
                    $previous = $current - 1;
                    if($previous <= 0)
                        $previous = 1;
                    $prev_label = '&lt;&lt;';
                    $prev_page_label = '&lt';

                    echo "<a href='{$base}p=1' class='$class first_page'>$prev_page_label</a> ";
                    echo "<a href='{$base}p=$previous' class='$class prev_page'>$prev_label</a> ";
                }
                if($end > $pages){
                    $start -= $end - $pages;
                    $end = $pages;
                    $end_print = "";
                }else{
                    $next = $current + 1;
                    if($next > $pages)
                        $next = $pages;
                    $next_label = '&gt;';
                    $next_page_label = '&gt;&gt;';
                    $end_print = "<a href='{$base}p={$next}' class='$class next_page' >$next_label</a> <a href='{$base}p={$pages}' class='$class last_page'>$next_page_label</a> ";
                }
            }
            if($pages > 1){
                for($i = $start;$i<=$end;$i++){
                    $on = $i == $current ? " on" : "";
                    $classy = $class ? "class='$class$on'" : "class='$on'";
                    echo "<a href='{$base}p=$i' $classy >$i</a> ";
                }
            }
            if($show_pages && $show_pages < $pages){
                echo $end_print;
            }
        }else{
            echo '';
        }
    }

}
?>
