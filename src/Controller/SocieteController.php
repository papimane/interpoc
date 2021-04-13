<?php

namespace App\Controller;

use App\Entity\Adresse;

use App\Entity\Societe;
use App\Form\AdresseType;
use App\Form\SocieteType;
use App\Entity\Historique;
use App\Form\HistoriqueType;
use App\Form\SocieteDetailType;
use App\Event\SocieteActionEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocieteController extends AbstractController
{
    /**
     * @Route("/", name="societe_list")
     */
    public function index(Request $request, EventDispatcherInterface $eventDispatcher)
    {
        $societe = new Societe();
        $frmSociete = $this->CreateForm(SocieteType::class , $societe);

		if($request)
		{
        $frmSociete->handleRequest($request);
		   if($frmSociete->isSubmitted())
		   {
               // Instancier un objet adresse 
               $adresse = new Adresse();
                // Initialiser les attributs de l'objets avec les données du formulaire envoyé
               $adresse->setNumero($frmSociete->get('numeroAdr')->getData())
                        ->setTypeVoie($frmSociete->get('typeVoieAdr')->getData())
                        ->setNomVoie($frmSociete->get('nomVoieAdr')->getData())
                        ->setVille($frmSociete->get('villeAdr')->getData())
                        ->setCp($frmSociete->get('cpAdr')->getData());
                // Initialiser l'objet société parent avec l'objet adresse qui vient d'être créé
               $societe->addAdresse($adresse);
               $adresse->addSociete($societe);

               $event = new SocieteActionEvent ($societe, $adresse);
               $eventName = SocieteActionEvent::NAME;

               $entityManager = $this->getDoctrine()->getManager();

               $entityManager->persist($adresse);
               $entityManager->persist($societe);
               $entityManager->flush();
               $eventDispatcher->dispatch($eventName, $event);
			   return $this->redirectToRoute('societe_list');

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
     * @Route("societe/detail/{id}", name="societe_detail")
     */
    public function detailSociete(Request $request, Societe $societe, EventDispatcherInterface $eventDispatcher)
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

               $societe->addAdresse($adresse);
               $adresse->addSociete($societe);

               $event = new SocieteActionEvent ($societe, $adresse);
               $eventName = SocieteActionEvent::NAME;

               $entityManager = $this->getDoctrine()->getManager();
               
               $entityManager->persist($adresse);
               $entityManager->persist($societe);
               $entityManager->flush();
               $eventDispatcher->dispatch($eventName, $event);
			   return $this->redirectToRoute('societe_list');

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

    /**
     * @Route("societe/{id}/delete", name="societe_delete", methods={"POST"})
     */
    public function delete(Request $request, Societe $societe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$societe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($societe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('societe_list');
    }
}
