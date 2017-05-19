<?php
namespace EntitasBundle\Utils;

class ArraySumColumAssoc
{
	//$arrays       = multidimensional array associate
    //$keytoremove  = array numeric key to remove
    //$results      = multidimensioanal array associative
    public function RemoveKeyFromMultiArrayAssocByFilter($arrays,$keytoremove)
    {
        $results        = array();
        $arrays         = $arrays;
        $keytoremove    = $keytoremove;
        foreach ($arrays as $array) 
        {
            $result     = array();
            foreach ($array as $key => $value) 
            {
                if(!in_array($key,$keytoremove))
                {
                    $result[$key] = $value; 
                }
            }
            $results[] = $result;
        }
        return $results;
    }
    public function SumColumAssocArray($arrays,$skipkey)
	{
		$arrays 	= $arrays;
		$skipkey 	= $skipkey;
		$results 	= array();
        foreach ($arrays as $array) 
        {
            foreach ($array as $key => $value) 
            {
                if(!in_array($key,$skipkey))
                {
                   $r = array_key_exists($key, $results);
                    if($r)
                    {
                        $results[$key] = $results[$key] + $value;
                    }
                    else
                    {
                       $results[$key] = $value; 
                    }  
                }
            }
        }
        return $results;
	}
}