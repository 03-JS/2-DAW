<?php

// USAMOS ATRIBUTOS, en lugar de anotaciones, ya que es
// lo que prefiere PHP 8 con versiones de DOCTRINE superiores
// a la 3.0, que es nuestro caso

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'Jugador')] // Aquí indicamos el nombre correcto de la tabla
class Jugador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $apellidos = null;

    #[ORM\Column(type: 'integer')] // Corregido: faltaba un paréntesis de cierre
    private ?int $edad = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $equipo = null;

// Getter y Setter para el ID
    public function getId(): ?int
    {
        return $this->id;
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

// Getter y Setter para los apellidos
    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

// Getter y Setter para los apellidos
    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }

// Getter y Setter para la edad
    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;
        return $this;
    }

// Getter y Setter para el equipo
    public function getEquipo(): ?string
    {
        return $this->equipo;
    }

    public function setEquipo(string $equipo): self
    {
        $this->equipo = $equipo;
        return $this;
    }
}
