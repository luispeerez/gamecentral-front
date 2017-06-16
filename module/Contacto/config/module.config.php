<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            //Se borra todo el segmento de home que es una ruta defualt
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'contacto' => array( //poner los nombres de nuestro modulo
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/contacto',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Contacto\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    //Se remueve la configuracion del service manager y del translator
    'controllers' => array(
        'invokables' => array(//Cambiar al nombre del modulo
            'Contacto\Controller\Index' => 'Contacto\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        //Se borran las configuraciones por default hasta que dondoe aparace template_path...
        //Template path, debe apuntar hacia la carpeta de vistas  de nuestro modulo, y para
        //que no choque con el template_path de otros modulos
        //Se debe crear una llavae con el nombre del modulo
        'template_path_stack' => array(
            'contacto' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Model/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Model\Entity' => __NAMESPACE__ . '_driver',
                ),
            ),
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
