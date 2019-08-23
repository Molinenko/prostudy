<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CursoRepository")
 */
class Curso
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Estudio", inversedBy="cursos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estudio;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Materia", mappedBy="curso")
     */
    private $materias;

    public function __construct()
    {
        $this->materias = new ArrayCollection();
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

    public function getEstudio(): ?Estudio
    {
        return $this->estudio;
    }

    public function setEstudio(?Estudio $estudio): self
    {
        $this->estudio = $estudio;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * @return Collection|Materia[]
     */
    public function getMaterias(): Collection
    {
        return $this->materias;
    }

    public function addMateria(Materia $materia): self
    {
        if (!$this->materias->contains($materia)) {
            $this->materias[] = $materia;
            $materia->setCurso($this);
        }

        return $this;
    }

    public function removeMateria(Materia $materia): self
    {
        if ($this->materias->contains($materia)) {
            $this->materias->removeElement($materia);
            // set the owning side to null (unless already changed)
            if ($materia->getCurso() === $this) {
                $materia->setCurso(null);
            }
        }

        return $this;
    }
}
