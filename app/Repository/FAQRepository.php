<?php
namespace App\Repository;

use App\Faq;
use App\Repository\Interfaces\FAQRepositoryInterface;

class FAQRepository implements FAQRepositoryInterface
{
    private $faq;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function store($data)
    {
        return $this->faq->create($data);
    }

    public function all()
    {
        return $this->faq->orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return $this->faq->find($id);
    }

    public function update($data, $id)
    {
        return $this->faq->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->faq->find($id)->delete();
    }

    public function getAll($type = '')
    {
        if (empty($type)) {
            return $this->faq->get();
        } else {
            $type = ($type == 'technical' ? 0 : 1);
            return $this->faq->where('type', $type)->get();
        }
    }
}