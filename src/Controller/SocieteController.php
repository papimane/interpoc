<?php

namespace App\Controller;

use App\Entity\Adresse;

use App\Entity\Societe;
use App\Form\SocieteType;
use App\Form\SocieteDetailType;
use App\Entity\Historique;
use App\Form\HistoriqueType;
use App\Form\AdresseType;
use App\Event\SocieteActionEvent;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocieteController extends AbstractController
{
    /**
     * @Route("/societe", name="societe")
     */
    public function index(Request $request, ObjectManager $manager, EventDispatcherInterface $eventDispatcher)
    {
        $societe = new Societe();
        $frmSociete = $this->CreateForm(SocieteType::class , $societe);

		if($request)
		{
        $frmSociete->handleRequest($request);
		   if($frmSociete->isSubmitted())
		   {
               $adresse = new Adresse();

               $adresse->setNumero($frmSociete->get('numeroAdr')->getData())
                        ->setTypeVoie($frmSociete->get('typeVoieAdr')->getData())
                        ->setNomVoie($frmSociete->get('nomVoieAdr')->getData())
                        ->setVille($frmSociete->get('villeAdr')->getData())
                        ->setCp($frmSociete->get('cpAdr')->getData());

               $societe->addAdresse($adresse);
               $adresse->addSociete($societe);

               $event = new SocieteActionEvent ($societe, $adresse);
               $eventName = SocieteActionEvent::NAME;

               $manager->persist($adresse);
               $manager->persist($societe);
               $manager->flush();
               $eventDispatcher->dispatch($eventName, $event);
			   return $this->redirectToRoute('societe');

		   }		
		}

		$repo = $this->getDoctrine()->getRepository(Societe::class);
        $societes = $repo->findAll();
		
		return $this->render('societe/index.html.twig', [
            'societes' => $societes,
            'frmSociete' => $frmSociete->createView(),
        ]);       

    }

    /**
     * @Route("/societe/detail/{id}", name="societe_detail")
     */
    public function detailSociete(Request $request, ObjectManager $manager, Societe $societe, EventDispatcherInterface $eventDispatcher)
    {


        $frmSociete = $this->CreateForm(SocieteDetailType::class , $societe);
        if($request)
		{
        $frmSociete->handleRequest($request);
		   if($frmSociete->isSubmitted())
		   {
                $adresse = new Adresse(); 

                $idAdrDefaut = $request->request->get('idAdrDefaut');

                $adresse = $this->getDoctrine()
                ->getRepository(Adresse::class)
                ->find($idAdrDefaut);

               /*$adresse->setNumero($frmSociete->get('numeroAdr')->getData())
                        ->setTypeVoie($frmSociete->get('typeVoieAdr')->getData())
                        ->setNomVoie($frmSociete->get('nomVoieAdr')->getData())
                        ->setVille($frmSociete->get('villeAdr')->getData())
                        ->setCp($frmSociete->get('cpAdr')->getData());*/

               $societe->addAdresse($adresse);
               $adresse->addSociete($societe);

               $event = new SocieteActionEvent ($societe, $adresse);
               $eventName = SocieteActionEvent::NAME;

               $manager->persist($adresse);
               $manager->persist($societe);
               $manager->flush();
               $eventDispatcher->dispatch($eventName, $event);
			   return $this->redirectToRoute('societe');

		   }		
		}         
       
        
        $adresse = new Adresse();
        $adresses = $societe->getAdresses();
        $adresse->addSociete($societe);
        $frmAdresse = $this->CreateForm(AdresseType::class , $adresse, ['action' => $this->generateUrl('adresse_add')]);

        $historique = new Historique();
        $historique->setSociete($societe);

        $frmHistorique = $this->CreateForm(HistoriqueType::class , $historique, ['action' => $this->generateUrl('historique')]);

        return $this->render('societe/detail.html.twig', [
            'frmSociete' => $frmSociete->createView(),
            'frmAdresse' => $frmAdresse->createView(),
            'frmHistorique' => $frmHistorique->createView(),
            'societe'=>$societe,
            'adresses'=> $adresses,
        ]);    


    }
}
