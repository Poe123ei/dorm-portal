
<x-layout title="Edit Worship Event">
    <div class="mb-6">
        <a href="{{ route('events.index') }}" class="text-sm text-blue-700 hover:underline">
            &larr; Back to Worship Events
        </a>
    </div>

    <div class="mx-auto max-w-2xl">
        <header class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Edit Worship Event
            </h1>
            <p class="mt-2 text-gray-600">
                Update the details of this worship session.
            </p>
        </header>

        <form action="{{ route('events.update', $event) }}" method="POST"
              class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            @csrf
            @method('PUT')

            <div class="border-b border-gray-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-gray-900">Event Details</h2>
            </div>

            <div class="grid gap-6 p-6">
                <div>
                    <label for="title" class="mb-2 block font-medium text-gray-700">Event Title</label>
                    <input id="title" name="title" value="{{ old('title', $event->title) }}"
                           maxlength="255" required
                           class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dorm" class="mb-2 block font-medium text-gray-700">Dorm Name</label>
                    <select id="dorm" name="dorm" required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:outline-none">
                        <option value="">Choose a dorm</option>
                        @foreach (config('dorms.names') as $dorm)
                            <option value="{{ $dorm }}" @selected(old('dorm', $event->dorm) === $dorm)>
                                {{ $dorm }}
                            </option>
                        @endforeach
                    </select>
                    @error('dorm')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date" class="mb-2 block font-medium text-gray-700">Date</label>
                    <input type="date" id="date" name="date"
                           value="{{ old('date', $event->date->format('Y-m-d')) }}" required
                           class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                    @error('date')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="session" class="mb-2 block font-medium text-gray-700">Session</label>
                    <select id="session" name="session" required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:outline-none">
                        <option value="">Choose a session</option>
                        <option value="morning" @selected(old('session', $event->session) === 'morning')>
                            Morning (Tuesday–Friday)
                        </option>
                        <option value="evening" @selected(old('session', $event->session) === 'evening')>
                            Evening (Monday)
                        </option>
                    </select>
                    @error('session')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-4 border-t border-gray-200 bg-gray-50 px-6 py-5">
                <a href="{{ route('events.index') }}" class="font-medium text-gray-600 hover:underline">
                    Cancel
                </a>
                <button type="submit" class="rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-layout>
