<?php

namespace App\Event;
use Symfony\Component\EventDispatcher\Event;
use App\Entity\Societe;
use App\Entity\Adresse;


class SocieteActionEvent extends Event
{

    private $_societe;
    private $_adresse;
    
    const NAME = "societe.update";

    public function __construct(Societe $societe, Adresse $adresse)
    {
        $this->_societe = $societe;
        $this->_adresse = $adresse;

    }

    public function getSociete()
    {
        return $this->_societe;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }    
}