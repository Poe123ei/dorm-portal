<?php

namespace App\Http\Requests\Concerns;

use App\Models\Event;
use App\Support\ThailandHolidays;
use Carbon\CarbonImmutable;
use Illuminate\Validation\Validator;

trait ValidatesEventSchedule
{
    public function validateEventSchedule(Validator $validator): void
    {
        if (
            $validator->errors()->has('date') ||
            $validator->errors()->has('session')
        ) {
            return;
        }

        $date = $this->input('date');
        $session = $this->input('session');
        $day = CarbonImmutable::parse($date)->dayOfWeekIso;

        if (ThailandHolidays::isHoliday($date)) {
            $holiday = ThailandHolidays::DATES[$date];

            $validator->errors()->add(
                'date',
                "No worship on holidays: {$holiday}."
            );

            return;
        }

        if ($day >= 6) {
            $validator->errors()->add(
                'date',
                'There is no worship check-in on Saturday or Sunday.'
            );
        } elseif (
            ($day === 1 && $session !== 'evening') ||
            ($day >= 2 && $session !== 'morning')
        ) {
            $validator->errors()->add(
                'session',
                'Choose evening on Monday or morning on Tuesday through Friday.'
            );
        }

        if ($validator->errors()->isEmpty()) {
            $query = Event::query()
                ->where('dorm', $this->input('dorm'))
                ->whereDate('date', $date);

            $event = $this->route('event');

            if ($event instanceof Event) {
                $query->where('id', '!=', $event->id);
            }

            if ($query->exists()) {
                $validator->errors()->add(
                    'date',
                    'This dorm already has a worship event on this date.'
                );
            }
        }
    }
}
