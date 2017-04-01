<?php

namespace AppBundle\Entity;

class Recipe
{

    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    private function get($key)
    {
        return isset($this->data[$key])? $this->data[$key] : null;
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
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->get('subtitle');
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->get('rating');
    }

    /**
     * @return string
     */
    public function getInstructions()
    {
        return $this->get('instructions');
    }

    /**
     * @return \DateTime
     */
    public function getPublished()
    {
        return new \DateTime($this->get('published'));
    }

    /**
     * @return int
     */
    public function getCookingTime()
    {
        return $this->get('cookingTime');
    }

    /**
     * @return int
     */
    public function getRestingTime()
    {
        return $this->get('restingTime');
    }

    /**
     * @return int
     */
    public function getPreparationTime()
    {
        return $this->get('preparationTime');
    }

    /**
     * @return string
     */
    public function getDifficulty()
    {
        return $this->get('difficulty');
    }

    /**
     * @return Ingredient[]
     */
    public function getIngredients()
    {
        $raw = $this->get('ingredients');

        $list = [];
        foreach ($raw as $data) {
            $list[] = new Ingredient($data);
        }

        return $list;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return new Author(
            [
                'id' => $this->get('author_id'),
                'name' => $this->get('author_name')
            ]
        );
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->get('image');
    }
}
