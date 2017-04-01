<?php

namespace AppBundle\Controller;

use AppBundle\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {

        $recipes = $this->getRecipeRepository()->findLatest();

        // replace this example code with whatever you need
        return $this->render('page/home.html.twig', [
            'recipes' => $recipes
        ]);
    }

    /**
     * @return RecipeRepository
     */
    private function getRecipeRepository()
    {
        return $this->container->get('repository.recipe');
    }
}
