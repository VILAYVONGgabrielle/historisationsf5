<?php

namespace App\Entity;

use App\Entity\Societes;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdressesRepository;

/**
 * @ORM\Entity(repositoryClass=AdressesRepository::class)
 */
class Adresses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $typevoie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomvoie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdat;

    /**
     * @ORM\ManyToOne(targetEntity=Societes::class, inversedBy="adresses", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $societe;


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

    public function getTypevoie(): ?string
    {
        return $this->typevoie;
    }

    public function setTypevoie(string $typevoie): self
    {
        $this->typevoie = $typevoie;

        return $this;
    }

    public function getNomvoie(): ?string
    {
        return $this->nomvoie;
    }

    public function setNomvoie(string $nomvoie): self
    {
        $this->nomvoie = $nomvoie;

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

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getSociete(): ?Societes
    {
        return $this->societe;
    }

    public function setSociete(?Societes $societe): self
    {
        $this->societe = $societe;

        return $this;
    }
}
