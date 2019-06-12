<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alquiler
 *
 * @ORM\Table(name="alquiler", indexes={@ORM\Index(name="fk_id_recambios", columns={"id_herramientas"}), @ORM\Index(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Alquiler {

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
    private $estado = 'ALQUILADO';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alquiler", type="datetime", nullable=false)
     */
    private $fechaAlquiler = 'CURRENT_TIMESTAMP';

    public function __construct() {
        $this->fechaAlquiler = new \DateTime();
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
     * @var \AppBundle\Entity\Herramientas
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Herramientas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_herramientas", referencedColumnName="id")
     * })
     */
    private $idHerramientas;

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

    function getFechaAlquiler(): \DateTime {
        return $this->fechaAlquiler;
    }

    function getMegusta() {
        return $this->megusta;
    }

    function getComentarios() {
        return $this->comentarios;
    }

    function getIdHerramientas() {
        return $this->idHerramientas;
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

    function setFechaAlquiler(\DateTime $fechaAlquiler) {
        $this->fechaAlquiler = $fechaAlquiler;
    }

    function setMegusta($megusta) {
        $this->megusta = $megusta;
    }

    function setComentarios($comentarios) {
        $this->comentarios = $comentarios;
    }

    function setIdHerramientas(\AppBundle\Entity\Herramientas $idHerramientas) {
        $this->idHerramientas = $idHerramientas;
    }

    function setIdUsuario(\AppBundle\Entity\User $idUsuario) {
        $this->idUsuario = $idUsuario;
    }

}
