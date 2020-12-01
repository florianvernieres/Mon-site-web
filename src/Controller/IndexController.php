<?php

namespace App\Controller;

use App\Entity\Information;
use App\Entity\Projet;
use App\Form\ProjetType;
use App\Repository\ProjetRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController{

    /**
     * @var ProjetRepository
     */
    private $repository;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * IndexController constructor.
     * @param ProjetRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct(ProjetRepository $repository, EntityManagerInterface $em){
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * page index du site
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
     * création d'un nouveau projet
     * @Route ("admin/projet/create", name="admin.projet.new")
     * @param Request $request
     * @return Response
     * @throws ORMException
     */
    public function new(Request $request){
        $projet = new Projet();
        $form = $this->createForm(ProjetType::class,$projet);
        $form->handleRequest($request); //permet de gérer la requête, compare le nouvelle valeur par rapport à l'ancienne

        /* si le formulaire a été changé et qu'il est valide */
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($projet);
            if (isset($this)) {
                try {
                    $this->em->flush();
                } catch (OptimisticLockException $e) {
                } catch (ORMException $e) {
                }
            }
            $this->addFlash('success', 'Votre projet a été crée avec succès');
            return $this->redirectToRoute('admin.projet.index');
        }
        return $this->render('admin/projet/new.html.twig',[
            'projet' => $projet,
            'form'=> $form->createView()
        ]);
    }


    /**
     * Permet de voir en détail un projet
     * @Route("/index/projet/{id}", name="projet_show")
     * @param Projet $projet
     * @return Response
     */
    public function show(Projet $projet){
        return $this->render('index/show.html.twig', [
            'projet' =>$projet
        ]);
    }



    /**
     * Page admin, permet d'administrer le site
     * @Route("/admin", name="admin.projet.index", methods="GET|POST")
     * @return Response
     */
    public function admin(){
        $projets = $this->repository->findAll();

        return $this->render('admin/projet/index.html.twig',[
            'projets'=>$projets
        ]);
    }

    /**
     * Permet d'éditer un projet
     * @Route ("/admin/projet/{id}", name="admin.projet.edit", methods="GET|POST")
     * @param Projet $projet
     * @param Request $request
     * @return Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit(Projet $projet, Request $request){
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request); //permet de gérer la requête, compare le nouvelle valeur par rapport à l'ancienne

        /* si le formulaire a été changé et qu'il est valide */
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'Votre bien a été modifié avec succès');

            return $this->redirectToRoute('admin.projet.index');
        }

        return $this->render('admin/projet/edit.html.twig', [
            'projet' =>$projet,
            'form' => $form->createView()
        ]);
    }


    /**
     * permet de supprimer un projet
     * @Route ("/admin/projet/{id}", name="admin.projet.delete", methods="DELETE")
     * @param Projet $projet
     * @param Request $request
     * @return Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(Projet $projet, Request $request){
        if ($this->isCsrfTokenValid('delete'. $projet->getId(), $request->get('_token'))){
            $this->em->remove($projet);
            $this->em->flush(); // porte les informations à la base de données
            $this->addFlash('success', 'Votre projet a été supprimé avec succès');

        }
        return $this->redirectToRoute('admin.projet.index');
    }



}
