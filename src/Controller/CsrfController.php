<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CsrfController extends AbstractController
{
    /**
     * @Route("/test")
     */
    public function __invoke(Request $request): Response
    {
        $tokenValid = $this->isCsrfTokenValid('id', $request->request->get('token'));

        return new Response($tokenValid ? 'valid' : 'invalid');
    }
}
