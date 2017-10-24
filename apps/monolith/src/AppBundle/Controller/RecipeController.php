<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Repository\CommentRepository;
use AppBundle\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RecipeController extends Controller
{
    /**
     * @Route("/recipes/{recipe}", name="recipe")
     * @ParamConverter("recipe", class="AppBundle:Recipe")
     */
    public function detailAction(Request $request, Recipe $recipe)
    {
        //$recipe = $this->getRecipeRepository()->findById($recipe);
        //$comments = $this->getCommentRepository()->findByReference('recipe', $recipe->getId());
        //$recipe->setComments($comments);

        // replace this example code with whatever you need
        return $this->render('recipe/detail.html.twig', [
            'recipe' => $recipe
        ]);
    }

    /**
     * @return RecipeRepository
     */
    private function getRecipeRepository()
    {
        return $this->container->get('repository.recipe');
    }

    /**
     * @return CommentRepository
     */
    private function getCommentRepository()
    {
        return $this->container->get('repository.comment');
    }
}
