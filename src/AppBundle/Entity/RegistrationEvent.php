<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="registrationevent")
*/
class RegistrationEvent
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
  private $firstname;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $lastname;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $gender;
   /**
   * @ORM\Column(type="date")
   */
  private $dateofbirth;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $contactnumber;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $emailaddress;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $homeaddress;
   /**
   * @ORM\Column(type="string", length=255)
   */
  private $postcode;
  /**
   * @ORM\Column(type="datetime")
   * @Assert\DateTime()
   */
  private $datestamp;
 /**
   * @ORM\ManyToOne(targetEntity="GroupEvent")
   * @ORM\JoinColumn(nullable=false)
   */
  private $GroupEvent;


    public function getId()
  {
      return $this->id;
  }
 
  public function getFirstName()
  {
      return $this->firstname;
  }

  public function setFirstName($firstname)
  {
      $this->firstname = $firstname;
      return $this;
  }

  public function getLastName()
  {
      return $this->lastname;
  }
  public function setLastName($lastname)
  {
      $this->lastname = $lastname;
      return $this;
  }

  public function getGender()
  {
      return $this->gender;
  }
  public function setGender($gender)
  {
      $this->gender = $gender;
      return $this;
  }

  public function getDateOfBirth()
  {
      return $this->dateofbirth;
  }
  public function setDateOfBirth($dateofbirth)
  {
      $this->dateofbirth = $dateofbirth;
      return $this;
  }

  public function getContactNumber()
  {
      return $this->contactnumber;
  }
  public function setContactNumber($contactnumber)
  {
      $this->contactnumber = $contactnumber;
      return $this;
  }

  public function getEmailAddress()
  {
      return $this->emailaddress;
  }
  public function setEmailAddress($emailaddress)
  {
      $this->emailaddress = $emailaddress;
      return $this;
  }

  public function getHomeAddress()
  {
      return $this->homeaddress;
  }
  public function setHomeAddress($homeaddress)
  {
      $this->homeaddress = $homeaddress;
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

  public function getDateStamp()
  {
      return $this->datestamp;
  }
  public function setDateStamp($datestamp)
  {
      $this->datestamp = $datestamp;
      return $this;
  }

  public function getGroupEvent()
  {
      return $this->GroupEvent;
  }
  public function setGroupEvent($groupevent)
  {
      $this->GroupEvent = $groupevent;
      return $this;
  }


}