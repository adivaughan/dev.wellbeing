<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="groupevent")
*/
class GroupEvent
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\ManyToOne(targetEntity="GroupType")
   * @ORM\JoinColumn(nullable=false)
   */
  private $grouptype;
  /**
   * @ORM\ManyToOne(targetEntity="Venue")
   * @ORM\JoinColumn(nullable=false)
   */
  private $venue;
    /**
   * @ORM\Column(type="datetime")
   * @Assert\DateTime()
   */
  private $date;
      /**
   * @ORM\Column(type="boolean")
   */
  private $active;

  public function getId()
  {
      return $this->id;
  }

  public function getDate()
  {
      return $this->date;
  }

  public function setDate($date)
  {
      $this->date = $date;
      return $this;
  }


  public function getGroupType()
  {
      return $this->grouptype;
  }

  public function setGroupType($grouptype)
  {
      $this->grouptype = $grouptype;
      return $this;
  }

  public function getVenue()
  {
      return $this->venue;
  }

  public function setVenue($venue)
  {
      $this->venue = $venue;
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

}




