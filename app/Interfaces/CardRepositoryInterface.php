<?php

namespace App\Interfaces;

interface CardRepositoryInterface {
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function actived();
    public function all();
}