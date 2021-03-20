<?php
namespace App\Repository\Interfaces;

interface ClientRepositoryInterface
{
    public function store($data);

    public function forgotPassword($data);

    public function resetPassword($data);

    public function changePassword($data);

    public function applyCode($data);

    public function update($data, $id);

    public function approveUser($id);

    public function all($filters = []);

    public function setTransaction();

    public function getTransaction();

    public function getLeaderboard();

    public function updateProfile($data);

    public function getMoodTracker();

    public function setUserInfo($data);

    public function payment($data);

    public function updateEmrgncyContactAndPayment($data);
}