<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Actualite", mappedBy="auteur")
    *
    */
    protected $actualites;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add actualite
     *
     * @param \AppBundle\Entity\Actualite $actualite
     *
     * @return User
     */
    public function addActualite(\AppBundle\Entity\Actualite $actualite)
    {
        $this->actualites[] = $actualite;
        $actualite->setAuthor($this);

        return $this;
    }

    /**
     * Remove actualite
     *
     * @param \AppBundle\Entity\Actualite $actualite
     */
    public function removeActualite(\AppBundle\Entity\Actualite $actualite)
    {
        $this->actualites->removeElement($actualite);
    }

    /**
     * Get actualites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActualites()
    {
        return $this->actualites;
    }
}
