<?php

// USAMOS ATRIBUTOS, en lugar de anotaciones, ya que es lo
// que prefiere PHP 8 con versiones de DOCTRINE superiores
// a la 3.0, que es nuestro caso

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'Equipo')] // Aquí indicamos el nombre correcto de la tabla
class Equipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(type: 'integer')]
    private ?int $socios = null;

    #[ORM\Column(type: 'integer')]
    private ?int $fundacion = null;

    #[ORM\Column(type: 'string', length: 10)]
    private ?string $ciudad = null;

// Getter y Setter para el ID
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

// Getter y Setter para el nombre
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

// Getter y Setter para los socios
    public function getSocios(): ?int
    {
        return $this->socios;
    }

    public function setSocios(int $socios): self
    {
        $this->socios = $socios;
        return $this;
    }

// Getter y Setter para la fundación
    public function getFundacion(): ?int
    {
        return $this->fundacion;
    }

    public function setFundacion(int $fundacion): self
    {
        $this->fundacion = $fundacion;
        return $this;
    }

// Getter y Setter para la ciudad
    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;
        return $this;
    }

}
