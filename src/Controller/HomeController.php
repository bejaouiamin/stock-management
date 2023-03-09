<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Form\SearchProduitType;
use App\Repository\CategoriesRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


 

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     * @Route("/home", name="app_home")
     * @return Response
     */
    
    public function index(ProduitRepository $produitRepository, CategoriesRepository $categoriesRepository,Request $request): Response
    {
        $produit = $produitRepository->findBy(['active' => true], ['updated_at' => 'desc'], 5);
        
        $form = $this->createForm(SearchProduitType::class);

        $search = $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
            // On recherche les annonces correspondant aux mots clés
                $produit = $produitRepository->search(
                    $search->get('mots')->getData(),

                );

            }


            return $this->render('home/index.html.twig', [
                'categories' => $categoriesRepository->findByExampleField(),
                'produits' => $produitRepository->findAll(),
                'form' => $form->createView(),
                'produit' => $produit
            

        ]);
    }
}
