<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserServiceTest extends TestCase
{
    public function testCreateUser(): void
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $hasher = $this->createMock(UserPasswordHasherInterface::class);

        $hasher->method('hashPassword')->willReturn('hashed123');

        $service = new UserService($entityManager, $hasher);
        $user = $service->createUser('antek@test.com', 'password');

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('antek@test.com', $user->getEmail());
        $this->assertEquals('hashed123', $user->getPassword());
    }
}