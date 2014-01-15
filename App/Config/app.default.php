<?php
$config = [
/**
 * Debug Level:
 *
 * Production Mode:
 * 0: No error messages, errors, or warnings shown. Flash messages redirect.
 *
 * Development Mode:
 * 1: Errors and warnings shown, model caches refreshed, flash messages halted.
 * 2: As in 1, but also with full debug messages and SQL output.
 *
 */
	'debug' => 2,

/**
 * Configure basic information about the application.
 *
 * - namespace - The namespace to find app classes under.
 * - encoding - The encoding used for HTML + database connections.
 * - base - The base directory the app resides in. If false this
 *   will be auto detected.
 * - dir - Name of app directory.
 * - webroot - The webroot directory.
 * - www_root - The file path to webroot.
 * - baseUrl - To configure CakePHP *not* to use mod_rewrite and to
 *   use CakePHP pretty URLs, remove these .htaccess
 *   files:
 *      /.htaccess
 *      /app/.htaccess
 *      /app/webroot/.htaccess
 *   And uncomment the baseUrl key below.
 * - imageBaseUrl - Web path to the public images directory under webroot.
 * - cssBaseUrl - Web path to the public css directory under webroot.
 * - jsBaseUrl - Web path to the public js directory under webroot.
 * - paths - Configure paths for non class based resources. Supports the `plugins` and `templates`
 *   subkeys, which allow the definition of paths for plugins and view templates respectively.
 */
	'App' => [
		'namespace' => 'App',
		'encoding' => 'UTF-8',
		'base' => false,
		'dir' => 'App',
		'webroot' => 'webroot',
		'www_root' => WWW_ROOT,
		// 'baseUrl' => env('SCRIPT_NAME'),
		'fullBaseUrl' => false,
		'imageBaseUrl' => 'img/',
		'cssBaseUrl' => 'css/',
		'jsBaseUrl' => 'js/',
		'paths' => [
			'plugins' => [ROOT . '/Plugin/'],
			'templates' => [APP . 'Template/'],
		],
	],

/**
 * Security and encryption configuration
 *
 * - salt - A random string used in security hashing methods.
 *   The salt value is also used as the encryption key.
 *   You should treat it as extremely sensitive data.
 */
	'Security' => [
		'salt' => '__SALT__',
	],

/**
 * Apply timestamps with the last modified time to static assets (js, css, images).
 * Will append a querystring parameter containing the time the file was modified. This is
 * useful for invalidating browser caches.
 *
 * Set to `true` to apply timestamps when debug > 0. Set to 'force' to always enable
 * timestamping regardless of debug value.
 */
	'Asset' => [
		// 'timestamp' => true,
	],

/**
 * The classname and database used in CakePHP's
 * access control lists.
 */
	'Acl' => [
		'database' => 'default',
		'classname' => 'DbAcl',
	],

/**
 * Configure the cache adapters.
 */
	'Cache' => [
		'default' => [
			'engine' => 'File',
		],

	/**
	 * Configure the cache used for general framework caching.  Path information,
	 * object listings, and translation cache files are stored with this configuration.
	 */
		'_cake_core_' => [
			'className' => 'File',
			'prefix' => 'myapp_cake_core_',
			'path' => CACHE . 'persistent/',
			'serialize' => true,
			'duration' => '+10 seconds',
		],

	/**
	 * Configure the cache for model and datasource caches.  This cache configuration
	 * is used to store schema descriptions, and table listings in connections.
	 */
		'_cake_model_' => [
			'className' => 'File',
			'prefix' => 'my_app_cake_model_',
			'path' => CACHE . 'models/',
			'serialize' => 'File',
			'duration' => '+10 seconds',
		],
	],

/**
 * Configure the Error and Exception handlers used by your application.
 *
 * By default errors are displayed using Debugger, when debug > 0 and logged by
 * Cake\Log\Log when debug = 0.
 *
 * In CLI environments exceptions will be printed to stderr with a backtrace.
 * In web environments an HTML page will be displayed for the exception.
 * While debug > 0, framework errors like Missing Controller will be displayed.
 * When debug = 0, framework errors will be coerced into generic HTTP errors.
 *
 * Options:
 *
 * - `errorLevel` - int - The level of errors you are interested in capturing.
 * - `trace` - boolean - Whether or not backtraces should be included in
 *   logged errors/exceptions.
 * - `log` - boolean - Whether or not you want exceptions logged.
 * - `exceptionRenderer` - string - The class responsible for rendering
 *   uncaught exceptions.  If you choose a custom class you should place
 *   the file for that class in app/Lib/Error. This class needs to implement a render method.
 * - `skipLog` - array - List of exceptions to skip for logging. Exceptions that
 *   extend one of the listed exceptions will also be skipped for logging.
 *   Example: `'skipLog' => array('Cake\Error\NotFoundException', 'Cake\Error\UnauthorizedException')`
 */
	'Error' => [
		'errorLevel' => E_ALL & ~E_DEPRECATED,
		'exceptionRenderer' => 'Cake\Error\ExceptionRenderer',
		'skipLog' => [],
		'log' => true,
		'trace' => true,
	],

/**
 * Email configuration.
 *
 * You can configure email transports and email delivery profiles here.
 *
 * By defining transports separately from delivery profiles you can eaisly re-use transport
 * configuration across multiple profiles.
 *
 * You can specify multiple configurations for production, development and testing.
 *
 * ### Configuring transports
 *
 * Each transport needs a `className`. Valid options are as follows:
 *
 *  Mail   - Send using PHP mail function
 *  Smtp   - Send using SMTP
 *  Debug  - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email.  Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * ### Configuring delivery profiles
 *
 * Delivery profiles allow you to predefine various properties about email messages
 * from your application and give the settings a name. This saves duplication across your
 * application and makes maintenance and development easier. Each profile accepts a number of keys
 * See Cake\Network\Email\Email for more information.
 */
	'EmailTransport' => [
		'default' => [
			'className' => 'Mail',
			// The following keys are used in SMTP transports
			'host' => 'localhost',
			'port' => 25,
			'timeout' => 30,
			'username' => 'user',
			'password' => 'secret',
			'client' => null,
			'tls' => null,
		],
	],

	'Email' => [
		'default' => [
			'transport' => 'default',
			'from' => 'you@localhost',
			//'charset' => 'utf-8',
			//'headerCharset' => 'utf-8',
		],
	],

/**
 * Connection information used by the ORM to connect
 * to your application's datastores.
 */
	'Datasources' => [
		'default' => [
			'className' => 'Cake\\Database\\Driver\\Mysql',
			'persistent' => false,
			'host' => 'localhost',
			'login' => 'my_app',
			'password' => 'secret',
			'database' => 'my_app',
			'prefix' => false,
			'encoding' => 'utf8',
		],

		/**
		 * The test connection is used during the test suite.
		 */
		'test' => [
			'className' => 'Cake\\Database\\Driver\\Mysql',
			'persistent' => false,
			'host' => 'localhost',
			'login' => 'my_app',
			'password' => 'secret',
			'database' => 'test_myapp',
			'prefix' => false,
			'encoding' => 'utf8',
		],
	],

/**
 * Configures logging options
 */
	'Log' => [
		'debug' => [
			'className' => 'Cake\\Log\\Engine\\FileLog',
			'file' => 'debug',
			'levels' => ['notice', 'info', 'debug'],
		],
		'error' => [
			'className' => 'Cake\\Log\\Engine\\FileLog',
			'file' => 'error',
			'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
		],
	],

/**
 *
 * Session configuration.
 *
 * Contains an array of settings to use for session configuration. The defaults key is
 * used to define a default preset to use for sessions, any settings declared here will override
 * the settings of the default config.
 *
 * ## Options
 *
 * - `cookie` - The name of the cookie to use. Defaults to 'CAKEPHP'
 * - `timeout` - The number of minutes you want sessions to live for. This timeout is handled by CakePHP
 * - `cookieTimeout` - The number of minutes you want session cookies to live for.
 * - `checkAgent` - Do you want the user agent to be checked when starting sessions? You might want to set the
 *    value to false, when dealing with older versions of IE, Chrome Frame or certain web-browsing devices and AJAX
 * - `defaults` - The default configuration set to use as a basis for your session.
 *    There are four builtins: php, cake, cache, database.
 * - `handler` - Can be used to enable a custom session handler.  Expects an array of of callables,
 *    that can be used with `session_save_handler`.  Using this option will automatically add `session.save_handler`
 *    to the ini array.
 * - `autoRegenerate` - Enabling this setting, turns on automatic renewal of sessions, and
 *    sessionids that change frequently.
 * - `requestCountdown` - Number of requests that can occur during a session time
 *    without the session being renewed. Only used when config value `autoRegenerate`
 *    is set to true. Default to 10.
 * - `ini` - An associative array of additional ini values to set.
 *
 * The built in defaults are:
 *
 * - 'php' - Uses settings defined in your php.ini.
 * - 'cake' - Saves session files in CakePHP's /tmp directory.
 * - 'database' - Uses CakePHP's database sessions.
 * - 'cache' - Use the Cache class to save sessions.
 *
 * To define a custom session handler, save it at /app/Network/Session/<name>.php.
 * Make sure the class implements PHP's `SessionHandlerInterface` and se
 * Session.handler to <name>
 *
 * To use database sessions, run the app/Config/Schema/sessions.php schema using
 * the cake shell command: cake schema create Sessions
 */
	'Session' => [
		'defaults' => 'php',
	],

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By Default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', [
 *   'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *   'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *   ['callable' => $aFunction, 'on' => 'before', 'priority' => 9], // A valid PHP callback type to be called on beforeDispatch
 *   ['callable' => $anotherMethod, 'on' => 'after'], // A valid PHP callback type to be called on afterDispatch
 * ]);
 */
	'Dispatcher' => [
		'filters' => ['AssetDispatcher', 'CacheDispatcher'],
	],

];
