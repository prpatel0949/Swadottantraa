<?php
namespace App\Repository\Interfaces;

interface TransactionRepositoryInterface
{
    public function all();

    public function getMonthlyTotal($filters = []);
}