<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormeJuridiqueRepository")
 */
class FormeJuridique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Societe", mappedBy="forme_juridique")
     */
    private $societes;

    public function __construct()
    {
        $this->societes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getSocietes(): Collection
    {
        return $this->societes;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societes->contains($societe)) {
            $this->societes[] = $societe;
            $societe->setFormeJuridique($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societes->contains($societe)) {
            $this->societes->removeElement($societe);
            // set the owning side to null (unless already changed)
            if ($societe->getFormeJuridique() === $this) {
                $societe->setFormeJuridique(null);
            }
        }

        return $this;
    }

    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->libelle;
        // to show the id of the Category in the select
        // return $this->id;
    }    
}
