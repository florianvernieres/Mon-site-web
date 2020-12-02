<?php

namespace App\Controller;

use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController{

    /**
     * @var InformationRepository
     */
    private $repositoryInfos;


    /**
     * SecurityController constructor.
     * @param InformationRepository $informationRepository
     */
    public function __construct(InformationRepository $informationRepository)
    {

        $this->repositoryInfos = $informationRepository;
    }

    /**
     * @Route ("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername(); // récupère le dernier nom qui a été tapé par le user

        $informations = $this->repositoryInfos->findAll();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'informations'=>$informations,
            'error' => $error
        ]);
    }
}

