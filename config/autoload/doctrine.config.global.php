<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'localhost',  //cambiar la url del gestor de base de datos si es necesario
                    'port'     => '3306',
                    'user'     => 'root',	//poner el usuario con el que se accede al gestor de bd
                    'password' => '1234',	//poner la contrasena
                    'dbname'   => 'directorio', //poner el nombre de la bd a utilizar
                )
            )
        )
    ),
);
