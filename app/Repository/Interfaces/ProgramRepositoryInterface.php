<?php
namespace App\Repository\Interfaces;

interface ProgramRepositoryInterface
{
    public function all();

    public function subscribe($request);
}