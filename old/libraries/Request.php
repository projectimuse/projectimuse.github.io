<?php defined('IMUSEPATH') or die('No direct script access allowed.');
/**
 * Request and response wrapper
 *
 * Part of the Auriga Framework, this class encapsulates an
 * incoming HTTP Request into a usable object.This file has
 * been modified and stripped for standalone use for IMUSE.
 * 
 * @package    Auriga
 * @author     Philip Ramirez
 * @copyright  (c) 2009 Savant Coding
 */
class Auriga_Request 
{
	// HTTP status codes and messages
	public static $messages = array(
		// Informational 1xx
		100 => 'Continue',
		101 => 'Switching Protocols',

		// Success 2xx
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',

		// Redirection 3xx
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found', // 1.1
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		// 306 is deprecated but reserved
		307 => 'Temporary Redirect',

		// Client Error 4xx
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',

		// Server Error 5xx
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		509 => 'Bandwidth Limit Exceeded'
	);

	/**
	 * @var  string  method: GET, POST, PUT, DELETE, etc
	 */
	public static $method = 'GET';

	/**
	 * @var  string  protocol: http, https, ftp, cli, etc
	 */
	public static $protocol = 'http';

	/**
	 * @var  string  referring URL
	 */
	public static $referrer;

	/**
	 * @var  string  client user agent
	 */
	public static $user_agent = '';

	/**
	 * @var  string  client IP address
	 */
	public static $client_ip = '0.0.0.0';

	/**
	 * @var  boolean  AJAX-generated request
	 */
	public static $is_ajax = FALSE;
	
	/**
	 * @var  string  base URL to the application
	 */
	public static $base_url = '/';
	
	/**
	 * @var  string  application index file
	 */
	public static $index_file = 'index.php';

	/**
	 * Main request singleton instance. If no URI is provided, the URI will
	 * be automatically detected using PATH_INFO, REQUEST_URI, or PHP_SELF.
	 *
	 * @param   string   URI of the request
	 * @return  Auriga_Request
	 */
	public static function instance( & $uri = TRUE)
	{
		static $instance;

		if ($instance === NULL)
		{
			if ($uri === TRUE) {
				if (isset($_SERVER['PATH_INFO'])) {
					$uri = $_SERVER['PATH_INFO'];
				}
				else {
					if (isset($_SERVER['REQUEST_URI'])) {
						$uri = $_SERVER['REQUEST_URI'];
					}
					elseif (isset($_SERVER['PHP_SELF'])) {
						$uri = $_SERVER['PHP_SELF'];
					}
					else {
						throw new Exception('Unable to detect the URI using PATH_INFO, REQUEST_URI, or PHP_SELF');
					}
					$base_url = parse_url(Auriga_Request::$base_url.Auriga_Request::$index_file, PHP_URL_PATH);
					for ($i = 0, $max = strlen($base_url); $i < $max; $i++) {
						if ( ! isset($uri[$i]) OR $base_url[$i] !== $uri[$i]) {
							break;
						}
					}
					$uri = substr($uri, $i);
				}
			}
			$uri = preg_replace('#//+#', '/', $uri);
			$uri = preg_replace('#\.[\s./]*/#', '', $uri);
			$instance = new Auriga_Request($uri);
		}

		return $instance;
	}

	/**
	 * @var  Auriga_Route route matched for this request
	 */
	public $route;

	/**
	 * @var  integer  HTTP response code: 200, 404, 500, etc
	 */
	public $status = 200;

	/**
	 * @var  string  response body
	 */
	public $response = '';

	/**
	 * @var  array  headers to send with the response body
	 */
	public $headers = array('Content-Type' => 'text/html; charset=utf-8');

	/**
	 * @var  string  controller directory
	 */
	public $directory = '';

	/**
	 * @var  string  controller to be executed
	 */
	public $controller;

	/**
	 * @var  string  action to be executed in the controller
	 */
	public $action;

	/**
	 * @var  string  the URI of the request
	 */
	public $uri;

	// Parameters extracted from the route
	protected $_params;

	/**
	 * Creates a new request object for the given URI. Global GET and POST data
	 * can be overloaded by setting "get" and "post" in the parameters.
	 * Throws an exception when no route can be found for the URI.
	 *
	 * @throws  Auriga_Request_Exception
	 * @param   string  URI of the request
	 * @return  void
	 */
	public function __construct($uri)
	{
		// Remove trailing slashes from the URI and set URI
		$this->uri = trim($uri, '/');

		/**
		 * MODIFICATION:
		 * - Removed route matching as IMUSE doesn't need routes
		 * - Removed setting status after no route matched
		 * - Removed exception on exit
		 */
		
		return;
	}

	
	/**
	 * Sends the response status and all set headers.
	 *
	 * @return  Auriga_Request
	 */
	public function send_headers()
	{
		if ( ! headers_sent())
		{
			foreach ($this->headers as $name => $value)
			{
				if (is_string($name))
				{
					// Combine the name and value to make a raw header
					$value = "{$name}: {$value}";
				}

				// Send the raw header
				header($value, TRUE, $this->status);
			}
		}
		return $this;
	}

} // End Request
