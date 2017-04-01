<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Comment;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    /**
     * @param string $type
     * @param string $reference
     *
     * @return Comment[]
     */
    /*
    public function findByReference($type, $reference)
    {
        return $this->findBy(
            [
                'type' => $type,
                'reference' => $reference,
            ],
            ['created' => 'DESC']
        );
    }
    */
}
