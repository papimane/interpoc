<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Entity\Adresse;
use App\Form\AdresseType;
use App\Event\SocieteActionEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AdresseController extends AbstractController
{
    /**
     * @Route("/adresse", name="adresse")
     */
    public function index()
    {
        return $this->render('adresse/index.html.twig', [
            'controller_name' => 'AdresseController',
        ]);
    }

    /**
     * @Route("/adresse/add", name="adresse_add")
     */
    public function addAdresse(Request $request, EntityManagerInterface $manager, EventDispatcherInterface $eventDispatcher)
    {
        
        $adresse = new Adresse();
        $frmAdresse = $this->CreateForm(AdresseType::class , $adresse);
	
		if($request)
		{
        $frmAdresse->handleRequest($request);
		   if($frmAdresse->isSubmitted())
		   {
               $idSoc = $request->request->get('idSocAdr');

               $societe = $this->getDoctrine()
               ->getRepository(Societe::class)
               ->find($idSoc);

               $event = new SocieteActionEvent ($societe,$adresse);
               $eventName = SocieteActionEvent::NAME;               
               $idSociete = $societe->getId();
               $societe->addAdresse($adresse);
               $adresse->addSociete($societe);
               $manager->persist($adresse);
               $manager->persist($societe);
               $manager->flush();
               $eventDispatcher->dispatch($eventName, $event);
			   return $this->redirectToRoute('societe_detail',["id"=>$idSociete]);

		   }		
		}

		$repo = $this->getDoctrine()->getRepository(Societe::class);
        $societes = $repo->findAll();
		
		return $this->render('societe/index.html.twig', [
            'societes' => $societes,
            'frmSociete' => $frmSociete->createView(),
        ]); 
    }
}
