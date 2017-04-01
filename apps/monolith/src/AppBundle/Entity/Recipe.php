<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeRepository")
 * @ORM\Table(name="recipe")
 */
class Recipe
{
    /**
     * @var string
     *
     * @ORM\Column(type="uuid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="AppBundle\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $image;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    private $instructions;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="recipes")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * "Koch-/Backzeit"
     *
     * @var int
     *
     * @ORM\Column(type="integer", name="cooking_time")
     */
    private $cookingTime;

    /**
     * "Ruhezeit"
     *
     * @var int
     *
     * @ORM\Column(type="integer", name="resting_time")
     */
    private $restingTime;

    /**
     * "Arbeitszeit"
     *
     * @var int
     *
     * @ORM\Column(type="integer", name="preparation_time")
     */
    private $preparationTime;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="difficulty")
     */
    private $difficulty;

    /**
     *
     * One Recipe has many Ingredients.
     *
     * @ORM\OneToMany(targetEntity="Ingredient", mappedBy="recipe", cascade={"persist", "remove"})
     * @var ArrayCollection
     */
    private $ingredients;

    /**
     *
     * One Recipe has many Comments.
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="recipe", cascade={"persist", "remove"})
     * @var ArrayCollection
     */
    private $comments;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $published;

    /**
     * Recipe constructor.
     */
    public function __construct()
    {
        $this->cookingTime = 0;
        $this->restingTime = 0;
        $this->difficulty = 'simple';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return \DateTime
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @return int
     */
    public function getCookingTime()
    {
        return $this->cookingTime;
    }

    /**
     * @return int
     */
    public function getRestingTime()
    {
        return $this->restingTime;
    }

    /**
     * @return int
     */
    public function getPreparationTime()
    {
        return $this->preparationTime;
    }

    /**
     * @return string
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @return Ingredients[]
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @return Comments[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
