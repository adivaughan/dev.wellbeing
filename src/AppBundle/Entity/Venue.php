<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="venue")
*/
class Venue
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=255)
   */
  private $venue;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $location;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $postcode;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $busroutes;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $trainstations;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $sitenotes;
   /**
   * @ORM\Column(type="boolean")
   */
  private $active;

  
  public function getId()
  {
      return $this->id;
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

  public function getLocation()
  {
      return $this->location;
  }

  public function setLocation($location)
  {
      $this->location = $location;
      return $this;
  }

  public function getPostCode()
  {
      return $this->postcode;
  }

  public function setPostCode($postcode)
  {
      $this->postcode = $postcode;
      return $this;
  }

  public function getBusRoutes()
  {
      return $this->busroutes;
  }

  public function setBusRoutes($busroutes)
  {
      $this->busroutes = $busroutes;
      return $this;
  }

  public function getTrainStations()
  {
      return $this->trainstations;
  }

  public function setTrainStations($trainstations)
  {
      $this->trainstations = $trainstations;
      return $this;
  }

  public function getSiteNotes()
  {
      return $this->sitenotes;
  }

  public function setSiteNotes($sitenotes)
  {
      $this->sitenotes = $sitenotes;
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
        return $this->getVenue();
    }
  

}