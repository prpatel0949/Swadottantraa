<?php
namespace App\Repository;

use App\Support;
use App\Repository\Interfaces\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{
    private $support;

    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    public function store($data)
    {
        return $this->support->create($data);
    }

    public function all($filters = [])
    {
        if (count($filters) > 0) {
            return $this->support->where($filters)->get();
        }

        return $this->support->all();
    }
}