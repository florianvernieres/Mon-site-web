<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProjetFixtures extends Fixture{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){

        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $projet = new Projet();
        $projet->setCategorie("Web");
        $projet->setDescription("La description de mon projet");
        $projet->setLienGit("le lien git");
        $projet->setFilename("270.png");
        $projet->setLienLinkedin("le lien linkedin");
        $projet->setMiniDescription("mini description");
        $projet->setNom("Mon premier projet");
        $manager->persist($projet);
        $manager->flush();
    }
}
