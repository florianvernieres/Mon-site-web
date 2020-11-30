<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++ ){
            $projet = new Projet();
            $projet->setNom("Mon projet n°$i")
                   ->setDescription("La description de mon projet N° $i")
                   ->setCategorie("La catégorie de mon projet $i")
                   ->setLienLinkedin("Lien linkedIn de mon projet")
                   ->setLienGit("Lien github de mon projet");

            $manager->persist($projet);
        }

        $manager->flush();
    }
}
