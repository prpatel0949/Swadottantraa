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
            return $this->support->where($filters)->orderBy('id', 'DESC')->get();
        }

        return $this->support->orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return $this->support->findorfail($id);
    }

    public function update($data, $id)
    {
        $support = $this->support->find($id);
        $support->answer = $data['answer'];
        $support->status = $data['status'];
        $support->save();

        return true;
    }
}