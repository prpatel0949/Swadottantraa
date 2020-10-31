<?php

namespace App\Repository\Interfaces;

interface UserRepositoryInterface
{
    public function update($data, $id);

    public function invite($data);

    public function clients($perPage, $filters);

    public function store($data);

    public function all($filters);

}