<?php
namespace App\Repository\Interfaces;

interface SupportRepositoryInterface
{
    public function store($data);
    
    public function all($filters = []);

    public function find($id);

    public function update($data, $id);
}