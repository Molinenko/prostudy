<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SesionRepository")
 */
class Sesion
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
    private $inicio;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tiempo_total;

    /**
     * @ORM\Column(type="integer")
     */
    private $tiempo_efectivo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rendimiento;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tema", inversedBy="sesiones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tema;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInicio(): ?\DateTimeInterface
    {
        return $this->inicio;
    }

    public function setInicio(\DateTimeInterface $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getTiempoTotal(): ?int
    {
        return $this->tiempo_total;
    }

    public function setTiempoTotal(?int $tiempo_total): self
    {
        $this->tiempo_total = $tiempo_total;

        return $this;
    }

    public function getTiempoEfectivo(): ?int
    {
        return $this->tiempo_efectivo;
    }

    public function setTiempoEfectivo(int $tiempo_efectivo): self
    {
        $this->tiempo_efectivo = $tiempo_efectivo;

        return $this;
    }

    public function getRendimiento(): ?int
    {
        return $this->rendimiento;
    }

    public function setRendimiento(?int $rendimiento): self
    {
        $this->rendimiento = $rendimiento;

        return $this;
    }

    public function getTema(): ?Tema
    {
        return $this->tema;
    }

    public function setTema(?Tema $tema): self
    {
        $this->tema = $tema;

        return $this;
    }

    public function __toString()
    {
        return 'SES'.str_pad($this->id, 4, '0', STR_PAD_LEFT);
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
}
