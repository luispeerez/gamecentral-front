<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function holaAction(){
    	return new ViewModel();
    }
    public function saludoAction(){
    	return new ViewModel();
    }
    public function variableAction(){
    	$nombre = "Luis";
    	$apellido = "Perez";
    	return new ViewModel(
    		array(
    			'nom' => $nombre,
    			'ap' => $apellido
			)
    	);
    }

    public function variable2Action(){
    	$nombre = "Juan";
    	$apellido = "Perez";
    	$valores = array(
    		"nom" => $nombre,
    		"ap"  => $apellido
    	);
    	//$this->layout("application/index/variable");

    	return $valores;    	
    }

    public function parametrosAction(){
        //El 0 es por si no se pasa ningun query
        $id = $this->params()->fromQuery("id",0);
        $nombre = $this->params()->fromQuery("nombre","");
        $apellido = $this->params()->fromQuery("apellido","");

        if($nombre == "") $nombre = $this->params()->fromPost("nombre","");

        $datos = "<div> ID: ".$id." ,Nombre : ".$nombre." ,Apellido :".$apellido."</div>";
        return array("info"=>$datos);
    }

    public function setDatosAction(){
        return new ViewModel();
    }

}
