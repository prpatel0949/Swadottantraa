<?php
namespace App\Repository\Interfaces;

interface SupportRepositoryInterface
{
    public function store($data);
    
    public function all($filters = []);
}