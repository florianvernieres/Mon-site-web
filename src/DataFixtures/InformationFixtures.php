<?php

namespace App\DataFixtures;

use App\Entity\Information;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InformationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $information = new Information();
        $information->setNom("Nom de mon information")
                    ->setDescription("Ma description personnelle")
                    ->setAdresse("Mon adresse perso")
                    ->setCv("mon cv")
                    ->setFacebook("ma page facebook")
                    ->setGithub("mon compte github")
                    ->setLinkedIn("Mon Compte linkedIn")
                    ->setStatut("Statut etudiant alternant");

        $manager->persist($information);
        $manager->flush();
    }
}

