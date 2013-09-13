<?php

namespace Panel\CtrlwBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity
 */
class Clientes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="apenom", type="string", length=100, nullable=false)
     */
    private $apenom;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=50, nullable=true)
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=50, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var \TiposIva
     *
     * @ORM\ManyToOne(targetEntity="TiposIva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_iva_id", referencedColumnName="id")
     * })
     */
    private $tipoIva;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set apenom
     *
     * @param string $apenom
     * @return Clientes
     */
    public function setApenom($apenom)
    {
        $this->apenom = $apenom;
    
        return $this;
    }

    /**
     * Get apenom
     *
     * @return string 
     */
    public function getApenom()
    {
        return $this->apenom;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     * @return Clientes
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    
        return $this;
    }

    /**
     * Get cuit
     *
     * @return string 
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Clientes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Clientes
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Clientes
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tipoIva
     *
     * @param \Panel\CtrlwBundle\Entity\TiposIva $tipoIva
     * @return Clientes
     */
    public function setTipoIva(\Panel\CtrlwBundle\Entity\TiposIva $tipoIva = null)
    {
        $this->tipoIva = $tipoIva;
    
        return $this;
    }

    /**
     * Get tipoIva
     *
     * @return \Panel\CtrlwBundle\Entity\TiposIva 
     */
    public function getTipoIva()
    {
        return $this->tipoIva;
    }
}