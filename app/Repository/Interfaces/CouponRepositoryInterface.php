<?php
namespace App\Repository\Interfaces;

interface CouponRepositoryInterface
{
    public function store($data);

    public function all($filters = []);

    public function findorfail($id);

    public function update($data, $id);

    public function applyCode($data);
}