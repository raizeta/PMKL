<?php
namespace EntitasBundle\Utils;

class Waktu
{
	public function ThisDayStartEnd($string,$minus)
	{
		$tglsekarang    = new \DateTime($string);
						  $tglsekarang->modify('+'.$minus.' day');

        $daystart       = $tglsekarang->format('Y-m-d 00:00:00');
        $dayend        	= $tglsekarang->format('Y-m-d 23:59:59');
        return array($daystart,$dayend);
	}
	
	public function ThisWeekStartEnd($string,$minus)
	{
		$dayweek                = new \DateTime($string);
								  $dayweek->modify('+'.$minus.' day');
        $harike                 = $dayweek->format("w");
        $dayweek->modify('-'.$harike.' day');
        $weekawal            	= $dayweek->format('Y-m-d 00:00:00');
        $dayweek->modify('+6 day');
        $weekakhir           	= $dayweek->format('Y-m-d 23:59:59');
        return array($weekawal,$weekakhir);
	}

	public function ThisMonthStartEnd($string,$minus)
	{
		$daymonth               = new \DateTime($string);
								  $daymonth->modify('+'.$minus.' month');

        $bulanawal              = $daymonth->format('Y-m-01 00:00:00');
        $bulanakhir             = $daymonth->format('Y-m-t 23:59:59');
        return array($bulanawal,$bulanakhir);
	}

	public function ThisYearStartEnd($string,$minus)
	{
		$daymonth               = new \DateTime($string);
							      $daymonth->modify('+'.$minus.' year');
        $tahunawal              = $daymonth->format('Y-01-01 00:00:00');
        $tahunakhir             = $daymonth->format('Y-12-31 23:59:59');
        return array($tahunawal,$tahunakhir);
	}
}