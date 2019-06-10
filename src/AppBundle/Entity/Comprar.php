<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comprar
 *
 * @ORM\Table(name="comprar", indexes={@ORM\Index(name="fkk_id_recambios", columns={"id_recambios"}), @ORM\Index(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Comprar {

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
     * @ORM\Column(name="estado", type="string", length=50, nullable=false)
     */
    private $estado = 'COMPRADO';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_venta", type="datetime", nullable=false)
     */
    private $fechaVenta = 'CURRENT_TIMESTAMP';

    public function __construct() {
        $this->fechaVenta = new \DateTime();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="megusta", type="integer", nullable=false)
     */
    private $megusta = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="string", length=100, nullable=false)
     */
    private $comentarios;

    /**
     * @var \AppBundle\Entity\Recambios
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Recambios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recambios", referencedColumnName="id")
     * })
     */
    private $idRecambios;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFechaVenta(): \DateTime {
        return $this->fechaVenta;
    }

    function getMegusta() {
        return $this->megusta;
    }

    function getComentarios() {
        return $this->comentarios;
    }

    function getIdRecambios() {
        return $this->idRecambios;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFechaVenta(\DateTime $fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }

    function setMegusta($megusta) {
        $this->megusta = $megusta;
    }

    function setComentarios($comentarios) {
        $this->comentarios = $comentarios;
    }

    function setIdRecambios(\AppBundle\Entity\Recambios $idRecambios) {
        $this->idRecambios = $idRecambios;
    }

    function setIdUsuario(\AppBundle\Entity\User $idUsuario) {
        $this->idUsuario = $idUsuario;
    }

}
