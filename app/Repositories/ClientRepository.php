<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\User;

class ClientRepository implements ClientRepositoryInterface {
    private $client;


    public function __construct(User $client) {
        $this->client = $client;
    }

    public function find($id) {
        return $this->client->findOrFail($id);
    }

    public function create(array $data) {
        return $this->client->create($data);
    }

    public function update($id, array $data) {
        $client = $this->find($id);
        $client->update($data);
        return $client;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }

    public function all() {
        return $this->client->whereHas('role', function($query) {
            $query->where('name', 'client');
        })->get();
    }

    public function actived() {
        return $this->client->where('status', 'active')->get();
    }
}
