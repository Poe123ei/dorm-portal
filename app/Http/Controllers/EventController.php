<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        return view('events.index', [
            'events' => Event::query()
                ->orderByDesc('date')
                ->orderBy('dorm')
                ->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        Event::create($request->validated());

        return redirect()->route('events.index')
            ->with('status', 'Worship event created.');
    }

    public function show(Event $event): View
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        return view('events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->validated());

        return redirect()->route('events.index')
            ->with('status', 'Worship event updated.');
    }
}

