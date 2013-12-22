<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Система дистанционного сопровождения кафедры физвоспитания ВолГУ',
	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
                        'generatorPaths'=>array('bootstrap.gii'),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('217.149.179.66','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'class'         => 'WebUser',
		),
        'session' => array(
            'class' => 'CDbHttpSession',
            'autoStart' => false,
            'connectionID' => 'db',
            'sessionTableName' => 'ph_YiiSession',
            'autoCreateSessionTable' => false    // for performance reasons
        ),
        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap',
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=physumkadb',
			'emulatePrepare' => true,
			'username' => 'physumka',
			'password' => 'f52md8',
			'charset' => 'utf8',
            'tablePrefix'=>'ph_',
            //'enableParamLogging'=>true,
            //'enableProfiling'=>true,

		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
                /*
				array(
					'class'=>'CWebLogRoute',
				),
                  */
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'vuylov@gmail.com',
	),
);