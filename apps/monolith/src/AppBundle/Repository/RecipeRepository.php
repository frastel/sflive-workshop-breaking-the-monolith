<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Recipe;
use Doctrine\ORM\EntityRepository;

class RecipeRepository extends EntityRepository
{
    /**
     * @return Recipe[]
     */
    public function findLatest()
    {
        return $this->createQueryBuilder('r')
            ->where('r.published IS NOT NULL')
            ->orderBy('r.published', 'DESC')
            ->getQuery()
            ->execute();
    }
}
