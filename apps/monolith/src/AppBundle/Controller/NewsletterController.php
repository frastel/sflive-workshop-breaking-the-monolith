<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Repository\RecipeRepository;
use AppBundle\Service\NewsletterService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewsletterController extends Controller
{
    /**
     * @Route("/newsletter", name="newsletter_subscription_add")
     * @Method("POST")
     */
    public function detailAction(Request $request)
    {
        $email = $request->request->get('email');

        $this->getNewsletterService()->addSubscription($email);

        return $this->redirectToRoute('newsletter_subscription_thankyou');
    }

    /**
     * @Route("/newsletter/thankyou", name="newsletter_subscription_thankyou")
     */
    public function thankyouAction()
    {
        return $this->render('newsletter/thankyou.html.twig');
    }

    /**
     * @return NewsletterService
     */
    private function getNewsletterService()
    {
        return $this->container->get('service.newsletter');
    }
}
