<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(RecipeRepository $recipeRepository): Response
    {
        $allrecipes = $recipeRepository->findAll();
        if ($allrecipes != null)
        {
            $randonrecipeindex = array_rand($allrecipes, 1);
            $recipeOfTheDay = $allrecipes[$randonrecipeindex];
        }
        else
        {
            $recipeOfTheDay = new Recipe();
            $recipeOfTheDay->setName('oups');
        }
        return $this->render('home/index.html.twig', [
            'reciperandom' => $recipeOfTheDay,
            'recipe_list' => $allrecipes
        ]);
    }
}
