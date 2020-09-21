<?php
namespace App\Repository\Interfaces;

interface ProgramRepositoryInterface
{
    public function all();

    public function subscribe($request);

    public function findorfail($id);

    public function storeAnswer($data, $id);
}