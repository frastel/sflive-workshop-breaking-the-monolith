<?php

namespace AppBundle\Doctrine;

use Doctrine\ORM\EntityManager;
use Ramsey\Uuid\Doctrine\UuidGenerator as ParentUuidGenerator;

/**
 * Class UuidGenerator
 * Needed to store faked id in an Entity.
 */
class UuidGenerator extends ParentUuidGenerator
{
    public function generate(EntityManager $em, $entity)
    {
        if (method_exists($entity, 'getId')) {
            $existingId = $entity->getId();
            if ($existingId) {
                return $existingId;
            }
        }

        return \Ramsey\Uuid\Uuid::uuid4();
    }
}
