<?php

namespace App\Entity;

use App\Entity\Adresses;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SocietesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=SocietesRepository::class)
 */
class Societes
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
     * @ORM\Column(type="string", length=255)
     */
    private $villeimmatriculation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateimmatriculation;

    /**
     * @ORM\Column(type="integer")
     */
    private $capital;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Adresses::class, mappedBy="societe", cascade="all", orphanRemoval=true)
     * @ORM\JoinColumn(name="societe_id" , referencedColumnName="id")
     */
    private $adresses;

    public function __construct()
    {
        $this->adresses = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNom();
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

    public function getVilleimmatriculation(): ?string
    {
        return $this->villeimmatriculation;
    }

    public function setVilleimmatriculation(string $villeimmatriculation): self
    {
        $this->villeimmatriculation = $villeimmatriculation;

        return $this;
    }

    public function getDateimmatriculation(): ?\DateTimeInterface
    {
        return $this->dateimmatriculation;
    }

    public function setDateimmatriculation(\DateTimeInterface $dateimmatriculation): self
    {
        $this->dateimmatriculation = $dateimmatriculation;

        return $this;
    }

    public function getCapital(): ?int
    {
        return $this->capital;
    }

    public function setCapital(int $capital): self
    {
        $this->capital = $capital;

        return $this;
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
     * @return Collection|Adresses[]
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adresses $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses[] = $adress;
            $adress->setSociete($this);
        }

        return $this;
    }

    public function removeAdress(Adresses $adress): self
    {
        if ($this->adresses->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getSociete() === $this) {
                $adress->setSociete(null);
            }
        }

        return $this;
    }
}
