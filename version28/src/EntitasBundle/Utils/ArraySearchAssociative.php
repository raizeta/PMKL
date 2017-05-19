<?php
namespace EntitasBundle\Utils;

class ArraySearchAssociative
{
	public function SearchByKeyValue($array, $key, $value) 
	{ 
	    $results = array(); 

	    if (is_array($array)) 
	    { 
	        if (isset($array[$key]) && $array[$key] == $value)
	        {
	        	$results[] = $array;
	        } 
	             
	        foreach ($array as $subarray)
	        {
	        	$results = array_merge($results, $this->SearchByKeyValue($subarray, $key, $value));
	        } 
	             
	    } 

	    return $results; 
	}
	public function MultiDimensionalSearch($parents, $searched) 
	{ 
		if (empty($searched) || empty($parents)) 
		{ 
			return false; 
		} 

		foreach ($parents as $key => $value) 
		{ 
			$exists = true; 
			foreach ($searched as $skey => $svalue) 
			{ 
		 		$exists = ($exists && IsSet($parents[$key][$skey]) && $parents[$key][$skey] == $svalue); 
			} 
			if($exists)
			{ 
				return $key; 
			} 
		} 

		return false; 
	}
}