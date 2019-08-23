<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MateriaRepository")
 */
class Materia
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $horas_estimadas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profesor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Curso", inversedBy="materias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $curso;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tema", mappedBy="materia")
     */
    private $temas;

    public function __construct()
    {
        $this->temas = new ArrayCollection();
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

    public function getHorasEstimadas(): ?int
    {
        return $this->horas_estimadas;
    }

    public function setHorasEstimadas(?int $horas_estimadas): self
    {
        $this->horas_estimadas = $horas_estimadas;

        return $this;
    }

    public function getProfesor(): ?string
    {
        return $this->profesor;
    }

    public function setProfesor(?string $profesor): self
    {
        $this->profesor = $profesor;

        return $this;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * @return Collection|Tema[]
     */
    public function getTemas(): Collection
    {
        return $this->temas;
    }

    public function addTema(Tema $tema): self
    {
        if (!$this->temas->contains($tema)) {
            $this->temas[] = $tema;
            $tema->setMateria($this);
        }

        return $this;
    }

    public function removeTema(Tema $tema): self
    {
        if ($this->temas->contains($tema)) {
            $this->temas->removeElement($tema);
            // set the owning side to null (unless already changed)
            if ($tema->getMateria() === $this) {
                $tema->setMateria(null);
            }
        }

        return $this;
    }
}
