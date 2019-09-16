<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Societe;
use App\Entity\Historique;
use App\Form\HistoriqueType;



class HistoriqueController extends AbstractController
{

    /**
     * @Route("/historique", name="historique")
     */
    public function getSocieteHistorique(Request $request)
    {
        $historique = new Historique();
        $frmHistorique = $this->CreateForm(HistoriqueType::class , $historique);

		if($request)
		{
        $frmHistorique->handleRequest($request);
		   if($frmHistorique->isSubmitted())
		   {
            $dateHisto = $frmHistorique->get('date')->getData();
            $idSoc = $request->request->get('idSoc');

            $societe = $this->getDoctrine()
            ->getRepository(Societe::class)
            ->find($idSoc);

            $listeHisto= $this->getDoctrine()
            ->getRepository(Historique::class)
            ->findSocieteHistorique($dateHisto, $idSoc);

            return $this->render('historique/index.html.twig', [
                'societe' => $societe,
                'dateHisto' => $dateHisto,
                'listeHisto' => $listeHisto,
            ]); 
		   }		
		}

            return $this->render('historique/index.html.twig', [
                'societe' => $societe]);
    }
}
