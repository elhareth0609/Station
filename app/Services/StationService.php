<?php

namespace App\Services;

use App\Interfaces\StationRepositoryInterface;

class StationService {
    private $stationRepository;

    public function __construct(StationRepositoryInterface $stationRepository) {
        $this->stationRepository = $stationRepository;
    }

    public function getStation($id) {
        return $this->stationRepository->find($id);
    }

    public function createStation(array $data) {
        return $this->stationRepository->create($data);
    }

    public function updateStation($id, array $data) {
        return $this->stationRepository->update($id, $data);
    }

    public function deleteStation($id) {
        return $this->stationRepository->delete($id);
    }
}
