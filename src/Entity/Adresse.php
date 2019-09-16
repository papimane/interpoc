<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdresseRepository")
 */
class Adresse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type_voie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_voie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $cp;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Societe", inversedBy="adresses")
     */
    private $societe;

    public function __construct()
    {
        $this->societe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->type_voie;
    }

    public function setTypeVoie(string $type_voie): self
    {
        $this->type_voie = $type_voie;

        return $this;
    }

    public function getNomVoie(): ?string
    {
        return $this->nom_voie;
    }

    public function setNomVoie(string $nom_voie): self
    {
        $this->nom_voie = $nom_voie;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getSociete(): Collection
    {
        return $this->societe;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societe->contains($societe)) {
            $this->societe[] = $societe;
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societe->contains($societe)) {
            $this->societe->removeElement($societe);
        }

        return $this;
    }

    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        $adresseComplete = $this->numero. ", ".$this->type_voie. " ".$this->nom_voie. " - ".$this-> ville. " ".$this-> cp;
        return $adresseComplete;
        // to show the id of the Category in the select
        // return $this->id;
    }  
}
