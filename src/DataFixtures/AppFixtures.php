<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
           // CREATION Users fake
        UserFactory::new()
           ->withAttributes([
               'email' => 'superadmin@example.com',
               'password' => 'adminpass',
               'id_hotel' => '1',
               'firstName' => 'Tisha',
               'lastName' => 'The Cat',
               'roles' => 'gerant'
           ])
           ->promoteRole('ROLE_SUPER_ADMIN')
           ->create();
       UserFactory::new()
           ->withAttributes([
               'email' => 'admin@example.com',
               'password' => 'adminpass',
               'id_hotel' => '1',
               'firstName' => 'Tisha',
               'lastName' => 'The Cat',
               'roles' => 'gerant'
           ])
           ->promoteRole('ROLE_ADMIN')
           ->create();
       UserFactory::new()
           ->withAttributes([
               'email' => 'tisha@symfonycasts.com',
               'password' => 'tishapass',
               'firstName' => 'Tisha',
               'lastName' => 'The Cat',
               'avatar' => 'tisha.png',
           ])
           ->create();

        $manager->flush();
    }
}
