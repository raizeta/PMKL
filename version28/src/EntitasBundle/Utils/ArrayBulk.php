<?php
namespace EntitasBundle\Utils;

class ArrayBulk
{
	public function BulkArrayProduct()
	{
		$arrays     = array();
        $arrays[]   = array('product'=>'Product I','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product II','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product III','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product IV','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product V','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product VI','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product VII','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product VIII','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product IX','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
        $arrays[]   = array('product'=>'Product X','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
                
        return $arrays;
	}

    public function BulkArrayCustomer()
    {
            $arrays     = array();
            $arrays[]   = array('customer'=>'Customer I','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer II','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer III','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer IV','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer V','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer VI','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer VII','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer VIII','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer IX','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('customer'=>'Customer X','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            
            return $arrays;
    }
    public function BulkArraySuplier()
    {
            $arrays     = array();
            $arrays[]   = array('suplier'=>'Suplier I','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('suplier'=>'Suplier II','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('suplier'=>'Suplier III','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('suplier'=>'Suplier IV','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            $arrays[]   = array('suplier'=>'Suplier V','Jan'=>20,'Feb'=>30,'Mar'=>40,'Apr'=>50,'Mei'=>60,'Jun'=>70,'Jul'=>80,'Jul'=>90,'Aug'=>100,'Sep'=>110,'Okt'=>120,'Nov'=>130,'Des'=>140);
            
            return $arrays;
    }

    public function BulkArrayWeeklyProduct()
    {
            $arrays     = array();
            for($i=1; $i <= 20; $i++)
            {
                    $arrays[]   = array
                            (
                                    'product'=>'Product '.$i,
                                    'W1'=>20,'W2'=>30,'W3'=>40,
                                    'W4'=>50,'W5'=>60,'W6'=>70,
                                    'W7'=>80,'W8'=>90,'W9'=>100,
                                    'W10'=>110,'W11'=>120,'W12'=>130,
                                    'W13'=>140,'W14'=>120,'W15'=>130,
                                    'W16'=>140,'W17'=>120,'W18'=>130,
                                    'W19'=>140,'W20'=>120,'W21'=>130,
                                    'W22'=>140,'W23'=>120,'W24'=>130,
                                    'W25'=>140,'W26'=>120,'W27'=>130,
                                    'W28'=>140,'W29'=>120,'W30'=>130,
                                    'W31'=>140,'W32'=>120,'W33'=>130,
                                    'W34'=>140,'W35'=>120,'W36'=>130,
                                    'W37'=>140,'W38'=>120,'W39'=>130,
                                    'W40'=>140,'W41'=>120,'W42'=>130,
                                    'W40'=>143,'W44'=>120,'W45'=>130,
                                    'W40'=>146,'W47'=>120,'W48'=>130,
                                    'W40'=>149,'W50'=>120,'W51'=>130,
                                    'W52'=>149,'W53'=>120
                            );
            }

            return $arrays;
    }
}