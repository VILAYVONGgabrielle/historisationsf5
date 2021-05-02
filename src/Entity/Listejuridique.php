<?php

namespace App\Entity;

use App\Repository\ListejuridiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListejuridiqueRepository::class)
 */
class Listejuridique
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
    private $libelles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelles(): ?string
    {
        return $this->libelles;
    }

    public function setLibelles(string $libelles): self
    {
        $this->libelles = $libelles;

        return $this;
    }
}
