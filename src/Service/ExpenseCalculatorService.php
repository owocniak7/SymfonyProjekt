<?php

namespace App\Service;

use App\Entity\Expense;

class ExpenseCalculatorService
{
    public function calculateTotal(array $expenses): float
    {
        return array_reduce($expenses, fn($sum, Expense $e) => $sum + $e->getAmount(), 0);
    }
}
