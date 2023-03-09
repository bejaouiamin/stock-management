<?php

namespace App\Controller;
use App\Repository\CategoriesRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WomanController extends AbstractController
{
    /**
     * @Route("/woman", name="app_woman")
     */
    public function index(CategoriesRepository $categoriesRepository,ProduitRepository $produitRepository): Response
    {
        return $this->render('woman/index.html.twig', [
            'categories' => $categoriesRepository->findByExampleField(),
            'produits' => $produitRepository->findAll(),
        
        ]);
    }
}
