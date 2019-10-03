<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="grouptype")
*/
class GroupType
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="text")
   */
  private $description;
  /**
   * @ORM\Column(type="string", length=255)
   */
  private $name;
    /**
   * @ORM\Column(type="string", length=255)
   */
  private $frequency;
   /**
   * @ORM\Column(type="boolean")
   */
  private $active;

  public function getId()
  {
      return $this->id;
  }

  public function getDescription()
  {
      return $this->description;
  }

  public function setDescription($description)
  {
      $this->description = $description;
      return $this;
  }

  public function getName()
  {
      return $this->name;
  }

  public function setName($name)
  {
      $this->name = $name;
      return $this;
  }

  public function getFrequency()
  {
      return $this->frequency;
  }

  public function setFrequency($frequency)
  {
      $this->frequency = $frequency;
      return $this;
  }

  public function getActive()
  {
      return $this->active;
  }

  public function setActive($active)
  {
      $this->active = $active;
      return $this;
  }

    #this is what determines the column that the form returns across a join

    public function __toString()
    {
      return $this->getName();
    }

}