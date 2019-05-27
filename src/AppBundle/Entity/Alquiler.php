<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alquiler
 *
 * @ORM\Table(name="alquiler", indexes={@ORM\Index(name="fk_id_recambios", columns={"id_recambios"})})
 * @ORM\Entity
 */
class Alquiler
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
     * @ORM\Column(name="estado", type="string", length=50, nullable=false)
     */
    private $estado;

    /**
     * @var \AppBundle\Entity\Recambios
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Recambios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recambios", referencedColumnName="id")
     * })
     */
    private $idRecambios;

    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdRecambios(): \AppBundle\Entity\Recambios {
        return $this->idRecambios;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdRecambios(\AppBundle\Entity\Recambios $idRecambios) {
        $this->idRecambios = $idRecambios;
    }


}

