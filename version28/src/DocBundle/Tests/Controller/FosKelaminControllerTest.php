<?php

namespace DocBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FosKelaminControllerTest extends WebTestCase
{
    public function testPdf()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pdf');
    }

    public function testXls()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/xls');
    }

}
