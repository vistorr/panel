<?php

namespace Panel\CtrlwBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuarios extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
     
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    
}
