<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PagesTest extends WebTestCase
{
    /**
     * @dataProvider providePaths
     */
    public function testPagesThrowNoError($path, $expectedContent)
    {
        $client = static::createClient();

        $client->request('GET', $path);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains($expectedContent, $client->getResponse()->getContent());
    }

    public function providePaths()
    {
        return [
            ['/', 'Home of the demo application'],
            ['/users/11111111-1111-1111-1111-111111111111', 'Chefkoch.de - Biggest cooking platform in Europe'],
            ['/recipes/33333333-3333-3333-3333-333333333333', 'Pangalaktischer Donnergurgler']
        ];
    }
}
