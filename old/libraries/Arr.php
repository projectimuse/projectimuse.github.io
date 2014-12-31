<?php defined('IMUSEPATH') OR die('No direct access allowed.');
/**
 * Array helper.
 *
 * Part of the Auriga Framework, this class encapsulates an incoming
 * HTTP Request into a usable object. This file has been stripped down
 * for use by IMUSE.
 * 
 * @package    Auriga
 * @author     Philip Ramirez
 * @copyright  (c) 2009 Savant Coding
 */
class Auriga_Arr {

	public static function get(array $array, $key, $default = NULL)
	{
		return isset($array[$key]) ? $array[$key] : $default;
	}

	/**
	 * Retrieves multiple keys from an array. If the key does not exist in the
	 * array, the default value will be added instead (NULL by default).
	 *
	 * @param   array   array to extract keys from
	 * @param   array   list of keys
	 * @param   mixed   default value
	 */
	public static function extract(array $array, array $keys, $default = NULL)
	{
		$found = array();
		foreach ($keys as $key)
		{
			$found[$key] = isset($array[$key]) ? $array[$key] : $default;
		}

		return $found;
	}

		/**
	 * Adds a value to the beginning of an associative array.
	 *
	 * @param   array   array to modify
	 * @param   string  array key name
	 * @param   mixed   array value
	 * @return  array
	 */
	public static function unshift( array & $array, $key, $val)
	{
		$array = array_reverse($array, TRUE);
		$array[$key] = $val;
		$array = array_reverse($array, TRUE);

		return $array;
	}

	/**
	 * Overwrites an array with values from input array(s).
	 * Non-existing keys will not be appended!
	 *
	 * @param   array   key array
	 * @param   array   input array(s) that will overwrite key array values
	 * @return  array
	 */
	public static function overwrite($array1, $array2)
	{
		foreach (array_intersect_key($array2, $array1) as $key => $value)
		{
			$array1[$key] = $value;
		}

		if (func_num_args() > 2)
		{
			foreach (array_slice(func_get_args(), 2) as $array2)
			{
				foreach (array_intersect_key($array2, $array1) as $key => $value)
				{
					$array1[$key] = $value;
				}
			}
		}

		return $array1;
	}

} // End arr
