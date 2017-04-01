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
     * @Route("/recipes/{recipe}", name="recipe")
     */
    public function detailAction(Request $request, $recipe)
    {
        $recipe = $this->getRecipeRepository()->findById($recipe);
        $comments = $this->getCommentRepository()->findByReference('recipe', $recipe->getId());

        // replace this example code with whatever you need
        return $this->render(
            'recipe/detail.html.twig',
            [
                'recipe' => $recipe,
                'comments' => $comments,
            ]
        );
    }

    /**
     * @return CommentRepository
     */
    private function getCommentRepository()
    {
        return $this->container->get('repository.comment');
    }

    /**
     * @return RecipeRepository
     */
    private function getRecipeRepository()
    {
        return $this->container->get('repository.recipe');
    }
}
