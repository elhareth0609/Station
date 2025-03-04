<?php

namespace App\Repositories;

use App\Interfaces\StationRepositoryInterface;
use App\Models\Station;
use Illuminate\Support\Facades\Auth;

class StationRepository implements StationRepositoryInterface {
    private $station;
    private $user_id;

    public function __construct(Station $station) {
        $this->station = $station;
        $this->user_id = Auth::user()->id;
    }

    public function find($id) {
        return $this->station->findOrFail($id);
    }

    public function create(array $data) {
        $data['user_id'] = $this->user_id;
        return $this->station->create($data);
    }

    public function update($id, array $data) {
        $station = $this->find($id);
        $station->update($data);
        return $station;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }
}
