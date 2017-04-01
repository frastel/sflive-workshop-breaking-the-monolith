<?php

namespace AppBundle\Entity;

class Ingredient
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
     * @return string
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->get('info');
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->get('unit');
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->get('amount');
    }
}
