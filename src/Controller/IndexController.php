<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController{

    /**
     * @Route("/index", name="projet.index")
     * @return Response
     */
    public function index(): Response {
        $repo = $this->getDoctrine()->getRepository(Projet::class);

        $projets = $repo->findAll();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'projets' => $projets
        ]);
    }


    /**
     * @Route("/index/{id}", name="projet_show")
     * @param Projet $projet
     * @return Response
     */
    public function show(Projet $projet){
        return $this->render('index/show.html.twig', [
            'projet' =>$projet
        ]);
    }

}
