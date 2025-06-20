<?php

namespace App\Interfaces;

interface ClientRepositoryInterface {
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function actived();
    public function all();
}
