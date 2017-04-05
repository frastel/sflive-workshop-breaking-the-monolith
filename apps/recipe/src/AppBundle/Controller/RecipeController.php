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
        return $this->render(
            'recipe/detail.html.twig',
            [
                'recipe' => $recipe,
            ]
        );
    }

    /**
     * @Route("/api/recipes", name="recipe_index")
     */
    public function indexAction(Request $request)
    {
        $queryParams = [
            'author_id' => null,
        ];

        foreach ($queryParams as $key => $dummy) {
            $queryParams[$key] = $request->query->get('author_id', null);
        }

        $recipes = $this->getRecipeRepository()->findLatest($queryParams);

        return new Response(
            $this->get('serializer')->serialize($recipes, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * @return RecipeRepository
     */
    private function getRecipeRepository()
    {
        return $this->container->get('repository.recipe');
    }
}
