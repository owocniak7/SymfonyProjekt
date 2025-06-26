<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Expense;
use App\Service\ExpenseCalculatorService;

class ExpenseCalculatorServiceTest extends TestCase
{
    public function testCalculateTotal(): void
    {
        $service = new ExpenseCalculatorService();

        $expense1 = new Expense();
        $expense1->setAmount(50);

        $expense2 = new Expense();
        $expense2->setAmount(70);

        $total = $service->calculateTotal([$expense1, $expense2]);
        $this->assertEquals(120, $total);
    }
}
