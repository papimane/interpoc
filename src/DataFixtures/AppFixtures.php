<?php

namespace App\DataFixtures;

use App\Entity\FormeJuridique;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // Chargement des données de tests
    public function load(ObjectManager $manager)
    {
        // Chargement du User de test
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@rcgroup.com');
        $user->setName('Jean Dupont');

        $password = $this->encoder->encodePassword($user, 'demo123');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        // Chargement des Formes juridiques dans le référentiel

        $formeJuridiques = [
         'Societe de Participations Financieres de Profession Liberale Societe a responsabilite limitee (SPFPL SARL)',
         'Societe d\'exercice liberal a responsabilite limitee',
         'SARL unipersonnelle',
         'Societe a responsabilite limitee (sans autre indication)',
         'Societe Anonyme',
         'SA a participation ouvriere a conseil d\'administration',
         'SA nationale a conseil d\'administration',
         'SA d\'economie mixte a conseil d\'administration',
         'Societe d\'investissement a capital variable (SICAV) a conseil d\'administration',
         'SA immobiliere pour le commerce et l\'industrie (SICOMI) a conseil d\'administration',
         'SA immobiliere d\'investissement a conseil d\'administration',
         'SA d\'amenagement foncier et d\'equipement rural (SAFER) a conseil d\'administration',
         'Societe anonyme mixte d\'interat agricole (SMIA) a conseil d\'administration',
         'SA d\'interat collectif agricole (SICA) a conseil d\'administration',
         'SA d\'attribution a conseil d\'administration'
        ];

        foreach ($formeJuridiques as $forme) {
            $formeJuridique = new FormeJuridique;
            $formeJuridique->setLibelle($forme);
            $manager->persist($formeJuridique);
        }

        $manager->flush();
    }
}
