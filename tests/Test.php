<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Test extends WebTestCase
{
    public function test(): void
    {
        $client = self::createClient();
        $token = self::getContainer()->get('security.csrf.token_manager')->getToken('id')->getValue();
        $client->request('POST', '/test', ['token' => $token]);
        self::assertSame('valid', $client->getResponse()->getContent());
    }
}
