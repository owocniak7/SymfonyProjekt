<?php

namespace App\Tests\Service;

use App\Entity\Expense;
use App\Service\ExpenseService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class ExpenseServiceTest extends TestCase
{
    public function testCreateExpense(): void
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $em->expects($this->once())->method('persist');
        $em->expects($this->once())->method('flush');

        $service = new ExpenseService($em);

        $expense = $service->createExpense(200, 'Transport', new \DateTime());

        $this->assertInstanceOf(Expense::class, $expense);
        $this->assertEquals(200, $expense->getAmount());
    }
}