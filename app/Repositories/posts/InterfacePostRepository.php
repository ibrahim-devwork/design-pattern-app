<?php

namespace App\Repositories\posts;

interface InterfacePostRepository {

    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
    public function getByFilter($filter);

}