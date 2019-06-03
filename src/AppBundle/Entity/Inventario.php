<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventario
 *
 * @ORM\Table(name="inventario", indexes={@ORM\Index(name="id_recambios", columns={"id_recambios"}), @ORM\Index(name="fk_id_user", columns={"id_usuario"}), @ORM\Index(name="unic_fecha_venta", columns={"fecha_venta"})})
 * @ORM\Entity
 */
class Inventario
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
     * @var integer
     *
     * @ORM\Column(name="id_recambios", type="integer", nullable=false)
     */
    private $idRecambios;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50, nullable=false)
     */
    private $estado = 'activo';

    /**
     * @var \AppBundle\Entity\Recambios
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Recambios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fecha_venta", referencedColumnName="fecha_creacion")
     * })
     */
    private $fechaVenta;

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

    function getIdRecambios() {
        return $this->idRecambios;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFechaVenta(): \AppBundle\Entity\Recambios {
        return $this->fechaVenta;
    }

    function getIdUsuario(): \AppBundle\Entity\User {
        return $this->idUsuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdRecambios($idRecambios) {
        $this->idRecambios = $idRecambios;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFechaVenta(\AppBundle\Entity\Recambios $fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }

    function setIdUsuario(\AppBundle\Entity\User $idUsuario) {
        $this->idUsuario = $idUsuario;
    }


}

