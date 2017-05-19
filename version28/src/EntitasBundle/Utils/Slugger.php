<?php
namespace EntitasBundle\Utils;

class Slugger
{
	public function slugify($string)
	{
		$separator = '-';//bahasa indonesianya 'pemisah'
		// $separator = '.';
		// $separator = '_';
		// return preg_replace('/[^a-z0-9]/', '-', strtolower(trim(strip_tags($string))));
		// return preg_replace('/[^a-z0-9]/', '.', strtolower(trim(strip_tags($string))));
		// return preg_replace('/[^a-z0-9]/', '_', strtolower(trim(strip_tags($string))));
		return preg_replace('/[^a-z0-9]/', $separator , strtolower(trim(strip_tags($string))));
	}
	
    public function canonicalize($string)
    {
        return null === $string ? null : mb_convert_case($string, MB_CASE_LOWER, mb_detect_encoding($string));
    }

    public function Terbilang($x)
	{
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		if ($x < 12)
		{
			return " " . $abil[$x];
		}
		
		elseif ($x < 20)
		{
			return $this->Terbilang($x - 10) . "belas";
		}
		
		elseif ($x < 100)
		
		{
			return $this->Terbilang($x / 10) . " puluh" . $this->Terbilang($x % 10);
		}
		elseif ($x < 200)
		{
			return " seratus" . $this->Terbilang($x - 100);
		}
		elseif ($x < 1000)
		
		{
			return $this->Terbilang($x / 100) . " ratus" . $this->Terbilang($x % 100);
		}
		elseif ($x < 2000)
		{
			return " seribu" . $this->Terbilang($x - 1000);
		}

		elseif ($x < 1000000)
		
		{
			return $this->Terbilang($x / 1000) . " ribu" . $this->Terbilang($x % 1000);
		}
		elseif ($x < 1000000000)
		{
			return $this->Terbilang($x / 1000000) . " juta" . $this->Terbilang($x % 1000000);
		}
	}

	public function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2) 
	{
	    $theta = $longitude1 - $longitude2;
	    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
	    $miles = acos($miles);
	    $miles = rad2deg($miles);
	    $miles = $miles * 60 * 1.1515;
	    $feet = $miles * 5280;
	    $yards = $feet / 3;
	    $kilometers = $miles * 1.609344;
	    $meters = $kilometers * 1000;
	    return compact('miles','feet','yards','kilometers','meters'); 
	}

	public function secsToStr($secs) 
	{
		if($secs>=86400)
		{
			$days=floor($secs/86400);
			$secs=$secs%86400;
			$r=$days.' day';
			if($days<>1)
			{
				$r.='s';
			}
			if($secs>0)
			{
				$r.=', ';
			}
		}
		if($secs>=3600)
		{
			$hours=floor($secs/3600);
			$secs=$secs%3600;
			$r.=$hours.' hour';
			if($hours<>1)
			{
				$r.='s';
			}
			if($secs>0)
			{
				$r.=', ';
			}
		}
		if($secs>=60)
		{
			$minutes=floor($secs/60);
			$secs=$secs%60;
			$r.=$minutes.' minute';
			if($minutes<>1)
			{
				$r.='s';
			}
			if($secs>0)
			{
				$r.=', ';
			}
		}
		$r.=$secs.' second';
		if($secs<>1)
		{
			$r.='s';
		}
		return $r;
	}

	public function productSKU($id)
	{
		/* 
		* $ID = 1; 		=> BRG-0001
		* $ID = 11; 	=> BRG-0011
		* $ID = 111; 	=> BRG-0111
		* $ID = 1111; 	=> BRG-1111
		* $ID = 11111; 	=> BRG-11111
		*/
		$sku = "BRG-".str_pad($id, "4", "0", STR_PAD_LEFT );
		return $sku;
	}
}