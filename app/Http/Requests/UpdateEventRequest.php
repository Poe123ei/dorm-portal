
<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\ValidatesEventSchedule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateEventRequest extends FormRequest
{
    use ValidatesEventSchedule;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'dorm' => [
                'required',
                'string',
                'max:255',
                Rule::in(config('dorms.names')),
            ],
            'date' => ['required', 'date_format:Y-m-d'],
            'session' => ['required', Rule::in(['morning', 'evening'])],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $this->validateEventSchedule($validator);
            },
        ];
    }
}
