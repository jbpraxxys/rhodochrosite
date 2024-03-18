<?php

namespace App\Http\Controllers\Admin\Modular;

use Inertia\Inertia;
use App\Models\Modular\Frame;
use App\Models\Modular\Card;
use App\Http\Controllers\Controller;
use App\Http\Processors\FrameProcessor;
use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;

class FrameController extends Controller
{
    protected $frameProcessor;

    public function __construct(FrameProcessor $frameProcessor)
    {
        $this->frameProcessor = $frameProcessor;
    }

    public function storeCard(CardRequest $request, Frame $frame, Card $card)
    {

        $this->frameProcessor->storeCard($request, $frame);

        return redirect()
            ->route('admin.pages.parent.edit-frame', $frame->id)
            ->with('success', 'Saved!');
    }
    

    public function createCard(Frame $frame)
    {
        return Inertia::render('Admin/Modular/Frames/Cards/Create', [
            'frame_id' => $frame->id,
        ]);
    }

    public function editCard(Card $card)
    {
        return Inertia::render('Admin/Modular/Frames/Cards/Edit', [
            'item' => $card,
        ]);
    }

    public function updateCard(CardRequest $request, Card $card)
    {

        $this->frameProcessor->updateCard($request, $card);

        return redirect()
            ->route('admin.pages.parent.edit-frame', $card->frame_id)
            ->with('success', 'Saved!');
    }
}