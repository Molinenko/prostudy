<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TemaRepository")
 */
class Tema
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     */
    private $orden;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Materia", inversedBy="temas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $materia;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sesion", mappedBy="tema")
     */
    private $sesiones;

    public function __construct()
    {
        $this->sesiones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getMateria(): ?Materia
    {
        return $this->materia;
    }

    public function setMateria(?Materia $materia): self
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * @return Collection|Sesion[]
     */
    public function getSesiones(): Collection
    {
        return $this->sesiones;
    }

    public function addSesion(Sesion $sesion): self
    {
        if (!$this->sesiones->contains($sesion)) {
            $this->sesiones[] = $sesion;
            $sesion->setTema($this);
        }

        return $this;
    }

    public function removeSesion(Sesion $sesion): self
    {
        if ($this->sesiones->contains($sesion)) {
            $this->sesiones->removeElement($sesion);
            // set the owning side to null (unless already changed)
            if ($sesion->getTema() === $this) {
                $sesion->setTema(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->nombre;
    }
}
