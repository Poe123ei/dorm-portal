
<?php

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function createTestEvent(array $overrides = []): Event
{
    return Event::create(array_merge([
        'title' => 'Dorm Worship',
        'dorm' => 'Eve Hall',
        'date' => '2026-10-20',
        'session' => 'morning',
    ], $overrides));
}

it('shows an event detail page', function () {
    $event = createTestEvent();

    $this->get(route('events.show', $event))
        ->assertOk()
        ->assertSee('Dorm Worship')
        ->assertSee('Eve Hall');
});

it('returns 404 when the event does not exist', function () {
    $this->get(route('events.show', 99999))
        ->assertNotFound();
});

it('updates an event', function () {
    $event = createTestEvent();

    $this->put(route('events.update', $event), [
        'title' => 'Updated Worship',
        'dorm' => 'Ruth Hall',
        'date' => '2026-10-21',
        'session' => 'morning',
    ])
        ->assertRedirect(route('events.index'))
        ->assertSessionHas('status', 'Worship event updated.');

    $this->assertDatabaseHas('events', [
        'id' => $event->id,
        'title' => 'Updated Worship',
        'dorm' => 'Ruth Hall',
        'date' => '2026-10-21 00:00:00',
        'session' => 'morning',
    ]);
});

it('does not update an event with invalid schedule details', function () {
    $event = createTestEvent();

    $this->put(route('events.update', $event), [
        'title' => 'Updated Worship',
        'dorm' => 'Eve Hall',
        'date' => '2026-10-24',
        'session' => 'morning',
    ])->assertSessionHasErrors('date');

    $this->assertDatabaseHas('events', [
        'id' => $event->id,
        'title' => 'Dorm Worship',
        'date' => '2026-10-20 00:00:00',
    ]);
});

it('deletes an event', function () {
    $event = createTestEvent();

    $this->delete(route('events.destroy', $event))
        ->assertRedirect(route('events.index'))
        ->assertSessionHas('status', 'Worship event deleted.');

    $this->assertDatabaseMissing('events', [
        'id' => $event->id,
    ]);
});

it('returns 404 when deleting an event that does not exist', function () {
    $this->delete(route('events.destroy', 99999))
        ->assertNotFound();
});
