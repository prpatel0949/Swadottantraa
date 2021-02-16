<?php
namespace App\Repository\Interfaces;

interface ScaleRepositoryInterface
{
    public function create($data);

    public function all();

    public function findorfail($id);

    public function update($data, $id);

    public function destroy($id);

    public function interpretation($data, $id);
}