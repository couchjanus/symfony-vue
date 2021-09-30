<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CustomerFixtures extends Fixture
{
    private $pHasher;
    public function __construct(UserPasswordHasherInterface $pHasher){
        $this->pHasher = $pHasher;
    }
    public function load(ObjectManager $manager)
    {
        $users = [
            0 => [
                'email' => 'cat@my.com',
                'role' => ['ROLE_USER'],
                'password' => 'test'
            ]
        ];
        foreach ($users as $data){
            $user = new Customer();
            $user->setEmail($data['email']);
            $user->setRoles($data['role']);
            $user->setPassword($this->pHasher->hashPassword($user, $data['password']));
            $manager->persist($user);
        }

         $manager->flush();
    }
}
