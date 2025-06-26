<?php

namespace App\Tests\Repository;

use App\Repository\ExpenseRepository;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

class ExpenseRepositoryTest extends TestCase
{
    public function testSearchReturnsArray(): void
    {
        $registry = $this->createMock(ManagerRegistry::class);
        $repository = new ExpenseRepository($registry);

        $this->assertIsArray($repository->search([]));
    }
}