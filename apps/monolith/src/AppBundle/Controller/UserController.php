<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/users/{user}", name="user")
     * @ParamConverter("user", class="AppBundle:user")
     */
    public function detailAction(Request $request, User $user)
    {
        // replace this example code with whatever you need
        return $this->render('user/detail.html.twig', [
            'user' => $user
        ]);
    }
}
