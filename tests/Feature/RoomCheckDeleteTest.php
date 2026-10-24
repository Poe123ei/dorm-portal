<?php

use App\Models\RoomCheck;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Feature tests for deleting room inspections. RefreshDatabase gives each test an empty
 * in-memory SQLite database (see phpunit.xml).
 */
uses(RefreshDatabase::class);

it('deletes only the selected room check and redirects to the list', function () {
    $records = collect([101, 102])->map(
        fn ($roomId) => RoomCheck::factory()->create([
            'room_id' => $roomId,
            'student_id' => 42,
            'student_name' => 'Jane Doe',
        ])
    );

    $this->get(route('roomcheck.index'))
        ->assertOk()
        ->assertSee(route('roomcheck.destroy', $records[0]->id), false)
        ->assertSee('value="DELETE"', false);

    $this->delete(route('roomcheck.destroy', $records[0]->id))
        ->assertRedirect(route('roomcheck.index'));

    $this->assertDatabaseMissing('room_checks', ['id' => $records[0]->id]);
    $this->assertDatabaseHas('room_checks', ['id' => $records[1]->id]);
    $this->assertDatabaseCount('room_checks', 1);
});

it('returns 404 when deleting a missing room check', function () {
    $this->delete(route('roomcheck.destroy', 999))->assertNotFound();
});
