<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Site',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading directories
	'import'=>require_once(dirname(__FILE__).'/import.php'),

	'modules'=>ENV_DEV ? require_once(dirname(__FILE__).'/modules.dev.php') : require_once(dirname(__FILE__).'/modules.php'),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'WebUser',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			//'showScriptName'=>ENV_DEV ? false : false,
			'rules'=>array(
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>ENV_DEV ? require_once(dirname(__FILE__).'/dbconfig.dev.php') : require_once(dirname(__FILE__).'/dbconfig.php'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'error/index',
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
	'params'=>require_once(dirname(__FILE__).'/params.php'),
);
