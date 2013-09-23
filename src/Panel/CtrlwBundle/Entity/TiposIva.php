<?php

namespace Panel\CtrlwBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposIva
 *
 * @ORM\Table(name="tipos_iva")
 * @ORM\Entity
 */
class TiposIva
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
     * @ORM\Column(name="tipos", type="string", length=20, nullable=false)
     */
    private $tipos;



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
     * Set tipos
     *
     * @param string $tipos
     * @return TiposIva
     */
    public function setTipos($tipos)
    {
        $this->tipos = $tipos;
    
        return $this;
    }

    /**
     * Get tipos
     *
     * @return string 
     */
    public function getTipos()
    {
        return $this->tipos;
    }
}
