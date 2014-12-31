<?php  if ( ! defined('IMUSEPATH')) exit('No direct script access allowed');

class Loader
{

	// All these are set automatically. Don't mess with them.
	var $_sc_ob_level;
	var $_sc_view_path		= '';
	var $_sc_is_php5		= FALSE;
	var $_sc_is_instance 	= FALSE; // Whether we should use $this or $CI =& get_instance()
	var $_sc_cached_vars	= array();
	var $_sc_classes		= array();
	var $_sc_loaded_files	= array();
	var $_sc_models			= array();
	var $_sc_helpers		= array();
	var $_sc_plugins		= array();
	var $_sc_varmap			= array('unit_test' => 'unit', 'user_agent' => 'agent');
	

	/**
	 * Constructor
	 *
	 * Sets the path to the view files and gets the initial output buffering level
	 *
	 * @access	public
	 */
	function __construct()
	{	
		$this->_sc_is_php5 = (floor(phpversion()) >= 5) ? TRUE : FALSE;
		$this->_sc_view_path = VIEWPATH;
		$this->_sc_ob_level  = ob_get_level();
				
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Class Loader
	 *
	 * This function lets users load and instantiate classes.
	 * It is designed to be called from a user's app controllers.
	 *
	 * @access	public
	 * @param	string	the name of the class
	 * @param	mixed	the optional parameters
	 * @param	string	an optional object name
	 * @return	void
	 */	
	function library($library = '', $params = NULL, $object_name = NULL)
	{
		if ($library == '')
		{
			return FALSE;
		}

		if ( ! is_null($params) AND ! is_array($params))
		{
			$params = NULL;
		}

		if (is_array($library))
		{
			foreach ($library as $class)
			{
				$this->_sc_load_class($class, $params, $object_name);
			}
		}
		else
		{
			$this->_sc_load_class($library, $params, $object_name);
		}
		
		$this->_sc_assign_to_models();
	}

	// --------------------------------------------------------------------
	

	/**
	 * Load View
	 *
	 * This function is used to load a "view" file.  It has three parameters:
	 *
	 * 1. The name of the "view" file to be included.
	 * 2. An associative array of data to be extracted for use in the view.
	 * 3. TRUE/FALSE - whether to return the data or load it.  In
	 * some cases it's advantageous to be able to return data so that
	 * a developer can process it in some way.
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	void
	 */
	function view($view, $vars = array(), $return = FALSE)
	{
		return $this->_sc_load(array('_sc_view' => $view, '_sc_vars' => $this->_sc_object_to_array($vars), '_sc_return' => $return));
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Load File
	 *
	 * This is a generic file loader
	 *
	 * @access	public
	 * @param	string
	 * @param	bool
	 * @return	string
	 */
	function file($path, $return = FALSE)
	{
		return $this->_sc_load(array('_sc_path' => $path, '_sc_return' => $return));
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set Variables
	 *
	 * Once variables are set they become available within
	 * the controller class and its "view" files.
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function vars($vars = array(), $val = '')
	{
		if ($val != '' AND is_string($vars))
		{
			$vars = array($vars => $val);
		}
	
		$vars = $this->_sc_object_to_array($vars);
	
		if (is_array($vars) AND count($vars) > 0)
		{
			foreach ($vars as $key => $val)
			{
				$this->_sc_cached_vars[$key] = $val;
			}
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Load Helper
	 *
	 * This function loads the specified helper file.
	 *
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
	function helper($helpers = array())
	{
		if ( ! is_array($helpers))
		{
			$helpers = array($helpers);
		}
	
		foreach ($helpers as $helper)
		{		
			$helper = strtolower(str_replace(EXT, '', str_replace('_helper', '', $helper)).'_helper');

			if (isset($this->_sc_helpers[$helper]))
			{
				continue;
			}
			
			$ext_helper = APPPATH.'helpers/'.config_item('subclass_prefix').$helper.EXT;

			// Is this a helper extension request?			
			if (file_exists($ext_helper))
			{
				$base_helper = BASEPATH.'helpers/'.$helper.EXT;
				
				if ( ! file_exists($base_helper))
				{
					imuse_show_error('Unable to load the requested file: helpers/'.$helper.EXT);
				}
				
				include_once($ext_helper);
				include_once($base_helper);
			}
			elseif (file_exists(APPPATH.'helpers/'.$helper.EXT))
			{ 
				include_once(APPPATH.'helpers/'.$helper.EXT);
			}
			else
			{		
				if (file_exists(BASEPATH.'helpers/'.$helper.EXT))
				{
					include_once(BASEPATH.'helpers/'.$helper.EXT);
				}
				else
				{
					imuse_show_error('Unable to load the requested file: helpers/'.$helper.EXT);
				}
			}

			$this->_sc_helpers[$helper] = TRUE;
		}		
	}
	
	// --------------------------------------------------------------------
	
		
	/**
	 * Loader
	 *
	 * This function is used to load views and files.
	 * Variables are prefixed with _sc_ to avoid symbol collision with
	 * variables made available to view files
	 *
	 * @access	private
	 * @param	array
	 * @return	void
	 */
	function _sc_load($_sc_data)
	{
		// Set the default data variables
		foreach (array('_sc_view', '_sc_vars', '_sc_path', '_sc_return') as $_sc_val)
		{
			$$_sc_val = ( ! isset($_sc_data[$_sc_val])) ? FALSE : $_sc_data[$_sc_val];
		}

		// Set the path to the requested file
		if ($_sc_path == '')
		{
			$_sc_ext = pathinfo($_sc_view, PATHINFO_EXTENSION);
			$_sc_file = ($_sc_ext == '') ? $_sc_view.EXT : $_sc_view;
			$_sc_path = $this->_sc_view_path.$_sc_file;
		}
		else
		{
			$_sc_x = explode('/', $_sc_path);
			$_sc_file = end($_sc_x);
		}
		
		if ( ! file_exists($_sc_path))
		{
			imuse_show_error('Unable to load the requested file: '.$_sc_file);
		}
	
		/*
		 * Extract and cache variables
		 *
		 * You can either set variables using the dedicated $this->load_vars()
		 * function or via the second parameter of this function. We'll merge
		 * the two types and cache them so that views that are embedded within
		 * other views can have access to these variables.
		 */	
		if (is_array($_sc_vars))
		{
			$this->_sc_cached_vars = array_merge($this->_sc_cached_vars, $_sc_vars);
		}
		extract($this->_sc_cached_vars);
				
		/*
		 * Buffer the output
		 *
		 * We buffer the output for two reasons:
		 * 1. Speed. You get a significant speed boost.
		 * 2. So that the final rendered template can be
		 * post-processed by the output class.  Why do we
		 * need post processing?  For one thing, in order to
		 * show the elapsed page load time.  Unless we
		 * can intercept the content right before it's sent to
		 * the browser and then stop the timer it won't be accurate.
		 */
		ob_start();
				
		// If the PHP installation does not support short tags we'll
		// do a little string replacement, changing the short tags
		// to standard PHP echo statements.
		
		if ((bool) @ini_get('short_open_tag') === FALSE AND config_item('rewrite_short_tags') == TRUE)
		{
			echo eval('?>'.preg_replace("/;*\s*\?>/", "; ?>", str_replace('<?=', '<?php echo ', file_get_contents($_sc_path))));
		}
		else
		{
			include($_sc_path); // include() vs include_once() allows for multiple views with the same name
		}
		
		
		// Return the file data if requested
		if ($_sc_return === TRUE)
		{		
			$buffer = ob_get_contents();
			@ob_end_clean();
			// convert to HTML entities
			return $buffer;
		}

		/*
		 * Flush the buffer... or buff the flusher?
		 *
		 * In order to permit views to be nested within
		 * other views, we need to flush the content back out whenever
		 * we are beyond the first level of output buffering so that
		 * it can be seen and included properly by the first included
		 * template and any subsequent ones. Oy!
		 *
		 */	
		if (ob_get_level() > $this->_sc_ob_level + 1)
		{
			ob_end_flush();
		}
		else
		{
			// PHP 4 requires that we use a global
			global $OUT;
			$OUT->append_output(ob_get_contents());
			@ob_end_clean();
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Load class
	 *
	 * This function loads the requested class.
	 *
	 * @access	private
	 * @param 	string	the item that is being loaded
	 * @param	mixed	any additional parameters
	 * @param	string	an optional object name
	 * @return 	void
	 */
	function _sc_load_class($class, $params = NULL, $object_name = NULL)
	{	
		// Get the class name, and while we're at it trim any slashes.  
		// The directory path can be included as part of the class name, 
		// but we don't want a leading slash
		$class = str_replace(EXT, '', trim($class, '/'));
	
		// Was the path included with the class name?
		// We look for a slash to determine this
		$subdir = '';
		if (strpos($class, '/') !== FALSE)
		{
			// explode the path so we can separate the filename from the path
			$x = explode('/', $class);	
			
			// Reset the $class variable now that we know the actual filename
			$class = end($x);
			
			// Kill the filename from the array
			unset($x[count($x)-1]);
			
			// Glue the path back together, sans filename
			$subdir = implode($x, '/').'/';
		}

		// We'll test for both lowercase and capitalized versions of the file name
		foreach (array(ucfirst($class), strtolower($class)) as $class)
		{
			$subclass = APPPATH.'libraries/'.$subdir.config_item('subclass_prefix').$class.EXT;

			// Is this a class extension request?			
			if (file_exists($subclass))
			{
				$baseclass = BASEPATH.'libraries/'.ucfirst($class).EXT;
				
				if ( ! file_exists($baseclass))
				{
					imuse_show_error("Unable to load the requested class: ".$class);
				}

				// Safety:  Was the class already loaded by a previous call?
				if (in_array($subclass, $this->_sc_loaded_files))
				{
					// Before we deem this to be a duplicate request, let's see
					// if a custom object name is being supplied.  If so, we'll
					// return a new instance of the object
					if ( ! is_null($object_name))
					{
						$CI =& get_instance();
						if ( ! isset($CI->$object_name))
						{
							return $this->_sc_init_class($class, config_item('subclass_prefix'), $params, $object_name);			
						}
					}
					
					$is_duplicate = TRUE;
					return;
				}
	
				include_once($baseclass);				
				include_once($subclass);
				$this->_sc_loaded_files[] = $subclass;
	
				return $this->_sc_init_class($class, config_item('subclass_prefix'), $params, $object_name);			
			}
		
			// Lets search for the requested library file and load it.
			$is_duplicate = FALSE;		
			for ($i = 1; $i < 3; $i++)
			{
				$path = ($i % 2) ? APPPATH : BASEPATH;	
				$filepath = $path.'libraries/'.$subdir.$class.EXT;
				
				// Does the file exist?  No?  Bummer...
				if ( ! file_exists($filepath))
				{
					continue;
				}
				
				// Safety:  Was the class already loaded by a previous call?
				if (in_array($filepath, $this->_sc_loaded_files))
				{
					// Before we deem this to be a duplicate request, let's see
					// if a custom object name is being supplied.  If so, we'll
					// return a new instance of the object
					if ( ! is_null($object_name))
					{
						$CI =& get_instance();
						if ( ! isset($CI->$object_name))
						{
							return $this->_sc_init_class($class, '', $params, $object_name);
						}
					}
				
					$is_duplicate = TRUE;
					return;
				}
				
				include_once($filepath);
				$this->_sc_loaded_files[] = $filepath;
				return $this->_sc_init_class($class, '', $params, $object_name);
			}
		} // END FOREACH

		// One last attempt.  Maybe the library is in a subdirectory, but it wasn't specified?
		if ($subdir == '')
		{
			$path = strtolower($class).'/'.$class;
			return $this->_sc_load_class($path, $params);
		}
		
		// If we got this far we were unable to find the requested class.
		// We do not issue errors if the load call failed due to a duplicate request
		if ($is_duplicate == FALSE)
		{
			imuse_show_error("Unable to load the requested class: ".$class);
		}
	}
	
	// --------------------------------------------------------------------

	/**
	 * Instantiates a class
	 *
	 * @access	private
	 * @param	string
	 * @param	string
	 * @param	string	an optional object name
	 * @return	null
	 */
	function _sc_init_class($class, $prefix = '', $config = FALSE, $object_name = NULL)
	{	
		// Is there an associated config file for this class?
		if ($config === NULL)
		{
			// We test for both uppercase and lowercase, for servers that
			// are case-sensitive with regard to file names
			if (file_exists(APPPATH.'config/'.strtolower($class).EXT))
			{
				include_once(APPPATH.'config/'.strtolower($class).EXT);
			}			
			else
			{
				if (file_exists(APPPATH.'config/'.ucfirst(strtolower($class)).EXT))
				{
					include_once(APPPATH.'config/'.ucfirst(strtolower($class)).EXT);
				}			
			}
		}
		
		if ($prefix == '')
		{			
			if (class_exists('CI_'.$class)) 
			{
				$name = 'CI_'.$class;
			}
			elseif (class_exists(config_item('subclass_prefix').$class)) 
			{
				$name = config_item('subclass_prefix').$class;
			}
			else
			{
				$name = $class;
			}
		}
		else
		{
			$name = $prefix.$class;
		}
		
		// Is the class name valid?
		if ( ! class_exists($name))
		{
			imuse_show_error("Non-existent class: ".$class);
		}
		
		// Set the variable name we will assign the class to
		// Was a custom class name supplied?  If so we'll use it
		$class = strtolower($class);
		
		if (is_null($object_name))
		{
			$classvar = ( ! isset($this->_sc_varmap[$class])) ? $class : $this->_sc_varmap[$class];
		}
		else
		{
			$classvar = $object_name;
		}

		// Save the class name and object name		
		$this->_sc_classes[$class] = $classvar;

		// Instantiate the class		
		$CI =& get_instance();
		if ($config !== NULL)
		{
			$CI->$classvar = new $name($config);
		}
		else
		{		
			$CI->$classvar = new $name;
		}	
	} 	
	
	// --------------------------------------------------------------------
	
	/**
	 * Autoloader
	 *
	 * The config/autoload.php file contains an array that permits sub-systems,
	 * libraries, plugins, and helpers to be loaded automatically.
	 *
	 * @access	private
	 * @param	array
	 * @return	void
	 */
	function _sc_autoloader()
	{	
		include_once(APPPATH.'config/autoload'.EXT);
		
		if ( ! isset($autoload))
		{
			return FALSE;
		}
		
		// Load any custom config file
		if (count($autoload['config']) > 0)
		{			
			$CI =& get_instance();
			foreach ($autoload['config'] as $key => $val)
			{
				$CI->config->load($val);
			}
		}		

		// Autoload plugins, helpers and languages
		foreach (array('helper', 'plugin', 'language') as $type)
		{			
			if (isset($autoload[$type]) AND count($autoload[$type]) > 0)
			{
				$this->$type($autoload[$type]);
			}		
		}

		// A little tweak to remain backward compatible
		// The $autoload['core'] item was deprecated
		if ( ! isset($autoload['libraries']))
		{
			$autoload['libraries'] = $autoload['core'];
		}
		
		// Load libraries
		if (isset($autoload['libraries']) AND count($autoload['libraries']) > 0)
		{
			// Load the database driver.
			if (in_array('database', $autoload['libraries']))
			{
				$this->database();
				$autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
			}

			// Load scaffolding
			if (in_array('scaffolding', $autoload['libraries']))
			{
				$this->scaffolding();
				$autoload['libraries'] = array_diff($autoload['libraries'], array('scaffolding'));
			}
		
			// Load all other libraries
			foreach ($autoload['libraries'] as $item)
			{
				$this->library($item);
			}
		}		

		// Autoload models
		if (isset($autoload['model']))
		{
			$this->model($autoload['model']);
		}

	}
	
	// --------------------------------------------------------------------

	/**
	 * Assign to Models
	 *
	 * Makes sure that anything loaded by the loader class (libraries, plugins, etc.)
	 * will be available to models, if any exist.
	 *
	 * @access	private
	 * @param	object
	 * @return	array
	 */
	function _sc_assign_to_models()
	{
		if (count($this->_sc_models) == 0)
		{
			return;
		}
	
		if ($this->_sc_is_instance())
		{
			$CI =& get_instance();
			foreach ($this->_sc_models as $model)
			{			
				$CI->$model->_assign_libraries();
			}
		}
		else
		{		
			foreach ($this->_sc_models as $model)
			{			
				$this->$model->_assign_libraries();
			}
		}
	}  	

	// --------------------------------------------------------------------

	/**
	 * Object to Array
	 *
	 * Takes an object as input and converts the class variables to array key/vals
	 *
	 * @access	private
	 * @param	object
	 * @return	array
	 */
	function _sc_object_to_array($object)
	{
		return (is_object($object)) ? get_object_vars($object) : $object;
	}

	// --------------------------------------------------------------------

	/**
	 * Determines whether we should use the CI instance or $this
	 *
	 * @access	private
	 * @return	bool
	 */
	function _sc_is_instance()
	{
		if ($this->_sc_is_php5 == TRUE)
		{
			return TRUE;
		}
	
		global $CI;
		return (is_object($CI)) ? TRUE : FALSE;
	}

}

/* End of file Loader.php */
/* Location: ./system/libraries/Loader.php */