<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserProperties(): void
    {
        $user = new User();
        $user->setEmail('antek2@test.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('secret');

        $this->assertEquals('antek2@test.com', $user->getEmail());
        $this->assertContains('ROLE_USER', $user->getRoles());
        $this->assertEquals('secret', $user->getPassword());
    }
}
