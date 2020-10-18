<?php
namespace App\Repository\Interfaces;

interface WorkoutRepositoryInterface
{
    public function create($data);

    public function all();

    public function find($id);

    public function update($data, $id);
}