<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recambios
 *
 * @ORM\Table(name="recambios", uniqueConstraints={@ORM\UniqueConstraint(name="fecha_venta", columns={"fecha_creacion"})})
 * @ORM\Entity
 */
class Recambios {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function __toString() {
        return (string) $this->id;
    }

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
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    public function __construct() {
        $this->fechaCreacion = new \DateTime();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=20, nullable=false)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $precio;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad = '5';

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

    function getFechaCreacion(): \DateTime {
        return $this->fechaCreacion;
    }

    function getImg() {
        return $this->img;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantidad() {
        return $this->cantidad;
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

    function setFechaCreacion(\DateTime $fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

}
