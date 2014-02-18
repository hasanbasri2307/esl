<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$root_path = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']);
$path_app = str_replace("\\", "/", dirname(dirname(dirname(__FILE__))));
$abs_path = explode($root_path, $path_app);
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ESC Application',

        'timeZone'=>'Asia/Jakarta',
        'defaultController' => 'site',
	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.modules.rights.*', 
		'application.modules.rights.components.*',
		'application.modules.skin.*', 
		'application.modules.skin.models.*',
		'application.modules.skin.components.*',
                'application.modules.admin.*', 
		'application.modules.admin.models*',
		'application.modules.admin.components*',
                'application.modules.accounting.*', 
		'application.modules.accounting.models*',
		'application.modules.accounting.components*',
                'application.modules.service.*', 
		'application.modules.service.models*',
		'application.modules.service.components*',
                'ext.giix-components.*', 

	),

	'modules'=>array(
		'skin',
                'admin',
                 'accounting',
            'service',
                'consultant',
		// uncomment the following to enable the Gii tool
		 'rights'=>array( 
			'superuserName'=>'Administrator',      // Name of the role with super user privileges. 
		   'authenticatedName'=>'Authenticated',    // Name of the authenticated user role. 
		   'userIdColumn'=>'id',       // Name of the user id column in the database. 
		   'userNameColumn'=>'username',     // Name of the user name column in the database. 
		   'enableBizRule'=>true,       // Whether to enable authorization item business rules. 
		   'enableBizRuleData'=>false,       // Whether to enable data for business rules. 
		   'displayDescription'=>true,     // Whether to use item description instead of name. 
		   'flashSuccessKey'=>'RightsSuccess',    // Key to use for setting success flash messages. 
		   'flashErrorKey'=>'RightsError',    // Key to use for setting error flash messages. 
		   'install'=>true,        // Whether to install rights. 
		   'baseUrl'=>'/rights',      // Base URL for Rights. Change if module is nested. 
		   'layout'=>'rights.views.layouts.main',    // Layout to use for displaying Rights. 
		   'appLayout'=>'application.views.layouts.main',  // Application layout. 
		   'cssFile'=>'rights.css',      // Style sheet file to use for Rights. 
		   'install'=>false,       // Whether to enable installer. 
		   'debug'=>false,        // Whether to enable debug mode.     
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'eri321',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                 'ext.giix-core', 
            ),
		),
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/user/profile'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
	),

	// application components
	'components'=>array(
    'widgetFactory' => array(
        'widgets' => array(
          'CJuiAutoComplete' => array(
               'themeUrl' => $abs_path[1].'/themes/ace/assets/css/jqueryui',
              'theme' => 'ace',
          ),
          'CJuiDialog' => array(
              'themeUrl' => $abs_path[1].'/themes/ace/assets/css/jqueryui',
              'theme' => 'ace',
          ),
          'CJuiDatePicker' => array(
              'themeUrl' => $abs_path[1].'/themes/ace/assets/css/jqueryui',
              'theme' => 'ace',
          ),
             
      ),
     ),
		'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
		'authManager'=>array( 
			'class'=>'RDbAuthManager', 
		), 
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		 
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=c1_esc',
			'emulatePrepare' => true,
			'username' => 'c1_esc',
			'password' => 'KORRNER123',
			'charset' => 'utf8',
			'tablePrefix' => 'esc_',
		),
		'user'=>array(
            'class'=>'RWebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
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
		'adminEmail'=>'webmaster@example.com',
	),
	'theme'=>'ace',
);