<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private $pHasher;
    public function __construct(UserPasswordHasherInterface $pHasher){
        $this->pHasher = $pHasher;
    }
    public function load(ObjectManager $manager)
    {
        $users = [
            0 => [
                'email' => 'admin@my.com',
                'role' => ['ROLE_ADMIN'],
                'password' => 123456
            ]
        ];
        foreach ($users as $data){
            $user = new Admin();
            $user->setEmail($data['email']);
            $user->setRoles($data['role']);
            $user->setPassword($this->pHasher->hashPassword($user, $data['password']));
            $manager->persist($user);
        }

         $manager->flush();
    }
}
