<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alquiler
 *
 * @ORM\Table(name="alquiler", indexes={@ORM\Index(name="fk_id_recambios", columns={"id_herramientas"})})
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
     * @var \AppBundle\Entity\Herramientas
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Herramientas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_herramientas", referencedColumnName="id")
     * })
     */
    private $idHerramientas;

    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFechaAlquiler(): \DateTime {
        return $this->fechaAlquiler;
    }

    function getIdHerramientas() {
        return $this->idHerramientas;
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

    function setIdHerramientas(\AppBundle\Entity\Herramientas $idHerramientas) {
        $this->idHerramientas = $idHerramientas;
    }

}
