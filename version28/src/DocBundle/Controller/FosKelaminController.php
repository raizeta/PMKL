<?php

namespace DocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class FosKelaminController extends Controller
{
    public function pdfAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EntitasBundle:FosKelamin')->findAll();

        $html = $this->renderView('DocBundle:FosKelamin:pdf.html.twig',array('entities'=>$entities));
        $pdfgenerator= $this->get('knp_snappy.pdf');
        return new Response($pdfgenerator->getOutputFromHtml($html),200,
            array('Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="matapelajaran.pdf"'));
    }
    public function xlsAction()
    {
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()
          ->setCreator("Radumta Sitepu")
          ->setLastModifiedBy("Radumta Sitepu")
          ->setTitle("List Product")
          ->setSubject("List Product")
          ->setDescription("List Product")
          ->setKeywords("List Product")
          ->setCategory("List Product");

        $phpExcelObject->setActiveSheetIndex(0)
           ->setCellValue('A1', 'Nama Product')
           ->setCellValue('B1', 'Category')
           ->setCellValue('C1', 'Brand')
           ->setCellValue('D1', 'Suplier')
           ->setCellValue('E1', 'Stock')
           ->setCellValue('F1', 'Harga')
           ->setCellValue('G1', 'Total');

        $phpExcelObject->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        // $phpExcelObject->getActiveSheet()->getColumnDimension('A')->setWidth("30");
        $phpExcelObject->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $phpExcelObject->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $phpExcelObject->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $phpExcelObject->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $phpExcelObject->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $phpExcelObject->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('EntitasBundle:FosKelamin')->findAll();
        foreach($query as $key=>$value)
        {
            $i = 2 + $key;
            $phpExcelObject->getActiveSheet()
            ->setCellValue('A'.$i, 'Radumta Sitepu')
            ->setCellValue('B'.$i, 'Radumta Sitepu')
            ->setCellValue('C'.$i, 'Radumta Sitepu')
            ->setCellValue('D'.$i, 'Radumta Sitepu')
            ->setCellValue('E'.$i, 'Radumta Sitepu')
            ->setCellValue('F'.$i, 'Radumta Sitepu')
            ->setCellValue('G'.$i, 'Radumta Sitepu');
        }
       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
       $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'stream-file.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }

}
