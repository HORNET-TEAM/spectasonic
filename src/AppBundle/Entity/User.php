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
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="integer", nullable=true)
     */
    private $gender;

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

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param \int $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        if(!($gender === self::GENDER_MALE || self::GENDER_FEMALE)) {
          throw new Exception("Civilité Invalide");

        }

        return $this;
    }

    /**
     * Get gender
     *
     * @return \int
     */
    public function getGender()
    {
        return $this->gender;
    }
}
