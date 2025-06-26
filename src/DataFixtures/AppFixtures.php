<?php

namespace App\DataFixtures;

use App\Entity\Expense;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher) {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('demo@example.com');
        $user->setPassword($this->hasher->hashPassword($user, 'demo123'));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        foreach (['Food', 'Transport', 'Shopping'] as $category) {
            for ($i = 1; $i <= 3; $i++) {
                $expense = new Expense();
                $expense->setUser($user);
                $expense->setAmount(rand(10, 100));
                $expense->setCategory($category);
                $expense->setDate(new \DateTime(sprintf('- %d days', rand(1, 10))));
                $manager->persist($expense);
            }
        }

        $manager->flush();
    }
}
