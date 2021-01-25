<?php
namespace App\Repository\Interfaces;

interface FAQRepositoryInterface
{
    public function store($data);

    public function all();

    public function find($id);

    public function update($data, $id);

    public function delete($id);

    public function getAll($type = '');
}