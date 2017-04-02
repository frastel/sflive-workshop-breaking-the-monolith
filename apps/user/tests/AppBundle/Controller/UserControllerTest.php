<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testDetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users/11111111-1111-1111-1111-111111111111');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Chefkoch', $crawler->filter('container h2')->text());
    }
}
