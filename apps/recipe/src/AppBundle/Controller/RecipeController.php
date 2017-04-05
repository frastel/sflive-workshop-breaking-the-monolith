<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RecipeController extends Controller
{
    /**
     * @Route("/api/recipes/{recipe}", name="recipe")
     * @ParamConverter("recipe", class="AppBundle:Recipe")
     */
    public function detailAction(Request $request, Recipe $recipe)
    {
        // replace this example code with whatever you need
        return $this->render('recipe/detail.html.twig', [
            'recipe' => $recipe
        ]);
    }
}
