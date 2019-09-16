<?php
namespace App\Event;

use DateTimeInterface;
use App\Entity\Historique;
use Doctrine\ORM\EntityManagerInterface;
use App\Event\SocieteActionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SocieteActionSubscriber implements EventSubscriberInterface
{
    private $_histo;
    private $_manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $histo = new Historique();
        $this->_histo = $histo;
        $this->_manager = $manager;
    }
    
    public static function getSubscribedEvents()
    {
        return [SocieteActionEvent::NAME => 'onSocietedUpdated'];
    }

    public function onSocietedUpdated(SocieteActionEvent $event)
    {
        $societe = $event->getSociete();
        $adresse = $event->getAdresse();
        $histo = new Historique();
        $currDate = new \DateTime();

        // Setting de l'objet historique
        $histo->setDate(new \DateTime())
            ->setTypeCrud('create')
            ->setSociete($societe)
            ->setNom($societe->getNom())
            ->setCapital($societe->getCapital())
            ->setIdAdresse($adresse->getId())
            ->setIdFormeJuridique($societe->getFormeJuridique()->getId());

        // Persistence de l'objet Historique dans la base    
        $this->_manager->persist($histo);
        $this->_manager->flush();        
    }
    
}