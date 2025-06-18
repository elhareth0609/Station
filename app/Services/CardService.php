<?php

namespace App\Services;

use App\Interfaces\CardRepositoryInterface;

class CardService {
    private $CardRepository;

    public function __construct(CardRepositoryInterface $CardRepository) {
        $this->CardRepository = $CardRepository;
    }

    public function getCard($id) {
        return $this->CardRepository->find($id);
    }

    public function allCards() {
        return $this->CardRepository->all();
    }

    public function activedCards() {
        return $this->CardRepository->actived();
    }

    public function createCard(array $data) {
        return $this->CardRepository->create($data);
    }

    public function updateCard($id, array $data) {
        return $this->CardRepository->update($id, $data);
    }

    public function deleteCard($id) {
        return $this->CardRepository->delete($id);
    }
}