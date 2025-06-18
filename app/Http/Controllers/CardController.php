<?php

namespace App\Http\Controllers;

use App\Http\Requests\Card\App\CardRequest;
use App\Http\Resources\Card\App\CardResource;
use App\Models\Card;
use App\Services\CardService;
use App\Traits\ApiResponder;

class CardController extends Controller {
    use ApiResponder;

    private $CardService;

    public function __construct(CardService $CardService) {
        $this->CardService = $CardService;
    }

    public function index(){
        return view('content.dashboard.cards.index');
    }

    // Provide data for the DataTable
    public function data()
    {
        $cards = Card::query();
        return datatables()->of($cards)->toJson();
    }

    public function all() {
        return $this->success(CardResource::collection($this->CardService->allCards()));
    }

    public function get($id) {
        return $this->success(new CardResource($this->CardService->getCard($id)));
    }

    public function create(CardRequest $request) {
        return $this->success(new CardResource($this->CardService->createCard($request->validated())), __('Created Successfully.'));
    }

    public function update(CardRequest $request, $id) {
        return $this->success(new CardResource($this->CardService->updateCard($id, $request->validated())), __('Updated Successfully.'));
    }

    public function delete($id) {
        $this->CardService->deleteCard($id);
        return $this->success(null, __('Deleted Successfully.'));
    }
}
