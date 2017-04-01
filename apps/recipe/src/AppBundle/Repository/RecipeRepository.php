<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Recipe;
use Doctrine\ORM\EntityRepository;

class RecipeRepository extends EntityRepository
{
    /**
     * @return Recipe[]
     */
    public function findLatest($queryParams)
    {
        $qb = $this->createQueryBuilder('r')
            ->where('r.published IS NOT NULL')
            ->orderBy('r.published', 'DESC');

        if (isset($queryParams['author_id'])) {
            $qb->andWhere('r.authorId = :author_id')
                ->setParameter('author_id', $queryParams['author_id']);
        }

        return $qb->getQuery()
            ->execute();
    }
}
