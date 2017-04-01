<?php

namespace AppBundle\Service;

use AppBundle\Entity\NewsletterSubscription;
use Doctrine\Common\Persistence\ObjectManager;

class NewsletterService
{

    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function addSubscription($email)
    {
        $subscription = new NewsletterSubscription($email);
        $this->manager->persist($subscription);
        $this->manager->flush();
    }
}
