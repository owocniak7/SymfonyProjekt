<?php

namespace App\Tests\Entity;

use App\Entity\Expense;
use DateTime;
use PHPUnit\Framework\TestCase;

class ExpenseTest extends TestCase
{
    public function testExpenseSettersAndGetters(): void
    {
        $expense = new Expense();
        $expense->setAmount(123.45);
        $expense->setCategory('Jedzenie');
        $expense->setDate(new DateTime('2024-06-21'));

        $this->assertEquals(123.45, $expense->getAmount());
        $this->assertEquals('Jedzenie', $expense->getCategory());
        $this->assertEquals('2024-06-21', $expense->getDate()->format('Y-m-d'));
    }
}
