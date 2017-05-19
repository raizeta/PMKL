<?php
namespace EntitasBundle\Utils;

class Tanggal
{
	public function ThisDayStartEnd($string)
	{
		$tglsekarang    = new \DateTime($string);
        $daystart       = $tglsekarang->format('Y-m-d');
        $dayend        	= $tglsekarang->format('Y-m-d');
        return array($daystart,$dayend);
	}
	
	public function ThisWeekStartEnd($string)
	{
		$dayweek                = new \DateTime($string);
        $harike                 = $dayweek->format("w");
        $dayweek->modify('-'.$harike.' day');
        $weekawal            	= $dayweek->format('d-m-Y');
        $dayweek->modify('+6 day');
        $weekakhir           	= $dayweek->format('d-m-Y');
        return array($weekawal,$weekakhir);
	}

	public function ThisMonthStartEnd($string)
	{
		$daymonth               = new \DateTime($string);
        $bulanawal              = $daymonth->format('Y-m-01');
        $bulanakhir             = $daymonth->format('Y-m-t');
        return array($bulanawal,$bulanakhir);
	}

	public function ThisYearStartEnd($string)
	{
		$daymonth               = new \DateTime($string);
        $tahunawal              = $daymonth->format('Y-01-01');
        $tahunakhir             = $daymonth->format('Y-12-31');
        return array($tahunawal,$tahunakhir);
	}
}