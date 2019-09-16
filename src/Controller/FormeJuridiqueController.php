<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormeJuridiqueController extends AbstractController
{
    /**
     * @Route("/forme/juridique", name="forme_juridique")
     */
    public function index()
    {
        return $this->render('forme_juridique/index.html.twig', [
            'controller_name' => 'FormeJuridiqueController',
        ]);
    }
}
