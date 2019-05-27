<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recambios
 *
 * @ORM\Table(name="recambios", uniqueConstraints={@ORM\UniqueConstraint(name="fecha_venta", columns={"fecha_venta"})})
 * @ORM\Entity
 */
class Recambios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text", length=65535, nullable=false)
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=50, nullable=false)
     */
    private $marca;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_venta", type="datetime", nullable=false)
     */
    private $fechaVenta;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=10, nullable=false)
     */
    private $img;
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getMarca() {
        return $this->marca;
    }

    function getFechaVenta(): \DateTime {
        return $this->fechaVenta;
    }

    function getImg() {
        return $this->img;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setFechaVenta(\DateTime $fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }

    function setImg($img) {
        $this->img = $img;
    }



}

