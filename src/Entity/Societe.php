<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\SocieteRepository")
 * 
 * @ApiResource(
 *  collectionOperations={"get"},
 *  itemOperations={"get"},
 *  order={"date"="ASC"},
 *  paginationEnabled=false * 
 * )  * 
 * 
 * 
 * @ApiFilter(PropertyFilter::class)
 */


class Societe
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
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $siren;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ville_immat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_immat;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=3)
     * @Assert\Positive
     */     
    private $capital;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FormeJuridique", inversedBy="societes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $forme_juridique;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Adresse", mappedBy="societe")
     */
    private $adresses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Historique", mappedBy="societe")
     */
    private $historiques;

    public $numeroAdr;

    public $typeVoieAdr;

    public $nomVoieAdr;

    public $villeAdr;

    public $cpAdr;



    public function __construct()
    {
        $this->adresses = new ArrayCollection();
        $this->historiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSiren(): ?int
    {
        return $this->siren;
    }

    public function setSiren(int $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getVilleImmat(): ?string
    {
        return $this->ville_immat;
    }

    public function setVilleImmat(string $ville_immat): self
    {
        $this->ville_immat = $ville_immat;

        return $this;
    }

    public function getDateImmat(): ?\DateTimeInterface
    {
        return $this->date_immat;
    }

    public function setDateImmat(\DateTimeInterface $date_immat): self
    {
        $this->date_immat = $date_immat;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getFormeJuridique(): ?FormeJuridique
    {
        return $this->forme_juridique;
    }

    public function setFormeJuridique(?FormeJuridique $forme_juridique): self
    {
        $this->forme_juridique = $forme_juridique;

        return $this;
    }

    /**
     * @return Collection|Adresse[]
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdresse(Adresse $adresse): self
    {
       
        if (!$this->adresses->contains($adresse)) {
            $this->adresses[] = $adresse;
            $adresse->addSociete($this);
        }

        return $this;
    }

    public function removeAdresse(Adresse $adresse): self
    {
        if ($this->adresses->contains($adresse)) {
            $this->adresses->removeElement($adresse);
            $adresse->removeSociete($this);
        }

        return $this;
    }

    /**
     * @return Collection|Historique[]
     */
    public function getHistoriques(): Collection
    {
        return $this->historiques;
    }

    public function addHistorique(Historique $historique): self
    {
        if (!$this->historiques->contains($historique)) {
            $this->historiques[] = $historique;
            $historique->setSociete($this);
        }

        return $this;
    }

    public function removeHistorique(Historique $historique): self
    {
        if ($this->historiques->contains($historique)) {
            $this->historiques->removeElement($historique);
            // set the owning side to null (unless already changed)
            if ($historique->getSociete() === $this) {
                $historique->setSociete(null);
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
        $nomSociete = $this->nom;
        return $nomSociete;
        // to show the id of the Category in the select
        // return $this->id;
    }     
}
