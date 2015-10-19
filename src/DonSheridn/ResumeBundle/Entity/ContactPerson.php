<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 6/23/2015
 * Time: 2:25 PM
 */

// src/ResumeBundle/Entity/ContactPerson.php

namespace DonSheridn\ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="DonSheridn\ResumeBundle\Repository\ContactRepository")
 * @ORM\Table(name="contactPerson")
 * @ORM\HasLifecycleCallbacks()
 */
class ContactPerson
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $state;

    /**
     * @ORM\Column(type="integer")
     */
    protected $zip;

    /**
     * @ORM\Column(type="string")
     */
    protected $phone;

    /**
     * @OneToMany(targetEntity="ContactMessage", mappedBy="contactPerson", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $messages;

    /**
     * created Time/Date
     *
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * updated Time/Date
     *
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    protected $updatedAt;



    public function __construct()
    {
        $this->messages = new ArrayCollection(); //An ArrayCollection class is an OOP replacement for the traditional array data structure.
                                            //An ArrayCollection is better at handling objects than regular arrays.
    }                                       //I use it here as $messages will contain a ContactMessage object


//Getter and Setter methods

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages->toArray();          //Gets the PHP array representation of the Array Collection.
    }

    /**
     * @param mixed $messages
     */
    public function setMessages(ContactMessage $messages)    //ths method takes the ContactMessage object passed
    {                                                        //from the controller
        if (!$this->messages->contains($messages)) {         //contains() is a method of the Collection interface
            $this->messages->add($messages);           //add() is a method of the collection interface.
            $messages->setContactPerson($this);        //sets the Person object in the $contactperson property
        }                                              //of the ContactMessage object

        return $this;       //adding return @this here allows you to chain function calls in the controller
    }


    /**
     * Set createdAt
     *
     * @ORM\PrePersist
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @ORM\PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }



}

