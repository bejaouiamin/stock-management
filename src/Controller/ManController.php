<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\CategoriesRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManController extends AbstractController
{
    /**
     * @Route("/man", name="app_man")
     */
    public function index(CategoriesRepository $categoriesRepository,ProduitRepository $produitRepository): Response
    {
        
       
        


        return $this->render('man/index.html.twig', [
            'categories' => $categoriesRepository->findByExampleField1(),
            'produits' => $produitRepository->findAll(),



        ]);
    }
}
