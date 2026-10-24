<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCheckRequest;
use App\Models\RoomCheck;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoomCheckController extends Controller
{
    public function index(): View
    {
        $rooms = RoomCheck::paginate(10);

        return view('roomchecks.index', compact('rooms'));
    }

    public function create(): View
    {
        return view('roomchecks.create');
    }

    public function store(RoomCheckRequest $request): RedirectResponse
    {
        RoomCheck::create($request->validated());

        return redirect()->route('roomcheck.index');
    }

    public function show(RoomCheck $roomCheck): View
    {
        return view('roomchecks.show', compact('roomCheck'));
    }

    public function edit(RoomCheck $roomcheck): View
    {
        return view('roomchecks.edit', [
            'roomCheck' => $roomcheck,
        ]);
    }

    public function update(
        RoomCheckRequest $request,
        RoomCheck $roomcheck
    ): RedirectResponse {
        $roomcheck->update($request->validated());

        return redirect()->route('roomcheck.index');
    }

    public function destroy(RoomCheck $roomcheck): RedirectResponse
    {
        $roomcheck->delete();

        return redirect()->route('roomcheck.index');
    }
}
