<?php
namespace EntitasBundle\Utils;

class ArrayFlatten
{
	public function array_flatten($array, $prefix = '')
	{
	    $result = array();

	    foreach ($array as $key => $value)
	    {
	        $new_key = $prefix . (empty($prefix) ? '' : '_') . $key; //Ubah '_' dengan pemisah yang anda inginkan

	        if (is_array($value))
	        {
	            $result = array_merge($result, $this->array_flatten($value, $new_key));
	        }
	        else
	        {
	            $result[$new_key] = $value;
	        }
	    }

	    return $result;
	}
}