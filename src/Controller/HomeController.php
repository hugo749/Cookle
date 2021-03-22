<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
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
            $recipeOfTheDay->setTitle('Vous n\'avez pas encore entré de recettes');
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


}
