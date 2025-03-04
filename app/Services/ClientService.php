<?php

namespace App\Services;

use App\Interfaces\ClientRepositoryInterface;

class ClientService {
    private $clientRepository;


    public function __construct(ClientRepositoryInterface $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function getClient($id) {
        return $this->clientRepository->find($id);
    }

    public function allClients() {
        return $this->clientRepository->all();
    }

    public function activedClients() {
        return $this->clientRepository->actived();
    }

    public function createClient(array $data) {
        return $this->clientRepository->create($data);
    }

    public function updateClient($id, array $data) {
        return $this->clientRepository->update($id, $data);
    }

    public function deleteClient($id) {
        return $this->clientRepository->delete($id);
    }
}
