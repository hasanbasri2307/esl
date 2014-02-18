<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
    'timeZone'=>'Asia/Jakarta',
     'defaultController' => 'skin',
	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		 
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=c1_esc',
			'emulatePrepare' => true,
			'username' => 'c1_esc',
			'password' => 'KORRNER123',
			'charset' => 'utf8',
			'tablePrefix' => 'esc_',
		),
		 
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
	'modules'=>array(

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
);