<?php

namespace App\Services;

use App\Interfaces\SimRepositoryInterface;

class SimService {
    private $simRepository;


    public function __construct(SimRepositoryInterface $simRepository) {
        $this->simRepository = $simRepository;
    }

    public function getSim($id) {
        return $this->simRepository->find($id);
    }

    // public function allSim() {
    //     return $this->simRepository->all();
    // }

    // public function activedSim() {
    //     return $this->simRepository->actived();
    // }

    public function createSim(array $data) {
        return $this->simRepository->create($data);
    }

    public function updateSim($id, array $data) {
        return $this->simRepository->update($id, $data);
    }

    public function deleteSim($id) {
        return $this->simRepository->delete($id);
    }
}
