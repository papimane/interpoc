<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoriqueRepository")
 */
class Historique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type_crud;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_forme_juridique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=3, nullable=true)
     */
    private $capital;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Societe", inversedBy="historiques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTypeCrud(): ?string
    {
        return $this->type_crud;
    }

    public function setTypeCrud(string $type_crud): self
    {
        $this->type_crud = $type_crud;

        return $this;
    }

    public function getIdAdresse(): ?int
    {
        return $this->id_adresse;
    }

    public function setIdAdresse(?int $id_adresse): self
    {
        $this->id_adresse = $id_adresse;

        return $this;
    }

    public function getIdFormeJuridique(): ?int
    {
        return $this->id_forme_juridique;
    }

    public function setIdFormeJuridique(?int $id_forme_juridique): self
    {
        $this->id_forme_juridique = $id_forme_juridique;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(?string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;

        return $this;
    }
}
