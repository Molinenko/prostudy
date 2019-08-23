<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstudioRepository")
 */
class Estudio
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
    private $organismo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Curso", mappedBy="estudio")
     */
    private $cursos;

    public function __construct()
    {
        $this->cursos = new ArrayCollection();
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

    public function getOrganismo(): ?string
    {
        return $this->organismo;
    }

    public function setOrganismo(?string $organismo): self
    {
        $this->organismo = $organismo;

        return $this;
    }

    /**
     * @return Collection|Curso[]
     */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function addCurso(Curso $curso): self
    {
        if (!$this->cursos->contains($curso)) {
            $this->cursos[] = $curso;
            $curso->setEstudio($this);
        }

        return $this;
    }

    public function removeCurso(Curso $curso): self
    {
        if ($this->cursos->contains($curso)) {
            $this->cursos->removeElement($curso);
            // set the owning side to null (unless already changed)
            if ($curso->getEstudio() === $this) {
                $curso->setEstudio(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
