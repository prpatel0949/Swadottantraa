<?php
namespace App\Repository\Interfaces;

interface ClientRepositoryInterface
{
    public function store($data);

    public function forgotPassword($data);

    public function resetPassword($data);

    // public function changePassword($data);
}