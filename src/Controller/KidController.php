<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KidController extends AbstractController
{
    /**
     * @Route("/kid", name="app_kid")
     */
    public function index(CategoriesRepository $categoriesRepository,ProduitRepository $produitRepository): Response
    {
        return $this->render('kid/index.html.twig', [
            'categories' => $categoriesRepository->findAll(),
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
