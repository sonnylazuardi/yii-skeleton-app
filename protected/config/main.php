<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'Yii Skeleton Application',
	'defaultController'=>'site',
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
		'application.components.behaviors.*',
		'application.components.widgets.*',
		'application.extensions.*',
	),
	'preload'=>array('log'),
	'modules'=>array(
		'textedit',
		'email' => array(
			'delivery'=>'debug',
		)
	),
	// application components
	'components'=>array(
//		'session' => array(
//			'class' => 'system.web.CDbHttpSession',
//			'connectionID' => 'db',
//		),
		'db'=>array(
			'class'=>'CDbConnection',
			'connectionString'=>'mysql:host=localhost;dbname=yiitestdrive',
			'username'=>'root',
			'password'=>'',
		),
		'user'=>array(
			'class'=>'application.components.WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('user/login'),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				'web'=>array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace, info, error, warning, application',
					'categories'=>'system.db.*',
					'showInFireBug'=>true //firebug only - turn off otherwise
				),
				'file'=>array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, watch',
					'categories'=>'system.*',
				),
			),
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			//'caseSensitive'=>false,
			'rules'=>array(
				'user/register/*'=>'user/create',
				'user/settings/*'=>'user/update',
			),
		),
		'CLinkPager' => array(
			'class'=>'CLinkPager',
			'cssFile'=>false,
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'example@example.com',
	),
);