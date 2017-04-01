<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Recipe;

class RecipeRepository
{
    public function findById($id)
    {
        $data = $this->curl('http://recipe/api/recipes/'.$id);
        if (!$data) {
            throw new \InvalidArgumentException('recipe not found');
        }

        return new Recipe($data);
    }

    /**
     * @return Recipe[]
     */
    public function findLatest()
    {
        $entries = $this->curl('http://recipe/api/recipes');
        $list = [];
        foreach ($entries as $data) {
            $list[] = new Recipe($data);  }

        return $list;
    }

    private function curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }

    /*
    public function findById($id)
    {
        $data = $this->curl('http://recipe/api/recipes/'.$id);
        if (!$data) {
            throw new \InvalidArgumentException('recipe not found');
        }

        return new Recipe($data);
    }

    public function findLatest()
    {
        $entries = $this->curl('http://recipe/api/recipes');
        $list = [];
        foreach ($entries as $data) {
            $list[] = new Recipe($data);
        }

        return $list;
    }
    */

    private function curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }

}
