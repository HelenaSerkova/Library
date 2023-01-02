<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IssuedbooksController extends AbstractController
{
    #[Route('/issuedbooks', name: 'app_issuedbooks')]
    public function index(): Response
    {
        return $this->render('issuedbooks/index.html.twig', [
            'controller_name' => 'IssuedbooksController',
        ]);
    }
}
