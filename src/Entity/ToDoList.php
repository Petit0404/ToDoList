<?php

namespace App\Entity; 

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="list")
 */

class ToDoList {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @Assert\NotBlank(message="veuillez renseigner un nom")
     * @Assert\Length(
     *  min=2,
     *  max=80,
     *  minMessage="le nom est trop court",
     *  maxMessage="le nom est trop long"
     * )
     * @ORM\Column(type="string", length=80)
     */
    private $name;
    /**
     * @Assert\NotBlank(message="veuillez renseigner une couleur")
     * @Assert\Length(
     * min=2,
     * max=10,
     * minMessage="le couleur est trop courte",
     * maxMessage="le couleur est trop longue"
     * )
     * @ORM\Column(type="string", length=10)
     */
    private $color; 

    /**
     * @ORM\OneToMany(targetEntity=Task::class, mappedBy="list", orphanRemoval=true)
     */
    private $tasks;

    public function __construct(){
        $this->tasks = new ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
