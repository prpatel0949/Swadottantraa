<?php
namespace App\Repository;

use Hash;
use App\Client;
use App\Repository\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->client->insert($data);
    }
}