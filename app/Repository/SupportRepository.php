<?php
namespace App\Repository;

use App\Faq;
use App\Support;
use App\Repository\Interfaces\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{
    private $support, $faq;

    public function __construct(Support $support, Faq $faq)
    {
        $this->support = $support;
        $this->faq = $faq;
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

    public function addToFAQ($id)
    {
        $support = $this->support->find($id);
        $faq = new $this->faq;
        $faq->question = $support->description;
        $faq->answer = $support->answer;
        $faq->type = $support->type;
        $faq->save();

        return true;
    }
}