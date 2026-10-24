
<x-layout title="Create Worship Event">
    <div class="mb-6">
        <a href="{{ route('events.index') }}" class="text-sm text-blue-700 hover:underline">
            &larr; Back to Worship Events
        </a>
    </div>

    <div class="mx-auto max-w-2xl">
        <header class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Create Worship Event
            </h1>
            <p class="mt-2 text-gray-600">
                Plan a worship session for your dorm.
            </p>
        </header>

        <form action="{{ route('events.store') }}" method="POST"
              aria-labelledby="details-heading"
              class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            @csrf

            <div class="border-b border-gray-200 px-6 py-5">
                <h2 id="details-heading" class="text-lg font-semibold text-gray-900">
                    Event Details
                </h2>
            </div>

            <div class="grid gap-6 p-6">
                <div>
                    <label for="title" class="mb-2 block font-medium text-gray-700">
                        Event Title
                    </label>
                    <input id="title" name="title" value="{{ old('title', 'Worship') }}"
                           maxlength="255" required
                           class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dorm" class="mb-2 block font-medium text-gray-700">
                        Dorm Name
                    </label>
                    <select id="dorm" name="dorm" required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:outline-none">
                        <option value="">Choose a dorm</option>
                        @foreach (config('dorms.names') as $dorm)
                            <option value="{{ $dorm }}" @selected(old('dorm') === $dorm)>
                                {{ $dorm }}
                            </option>
                        @endforeach
                    </select>
                    @error('dorm')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date" class="mb-2 block font-medium text-gray-700">
                        Date
                    </label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}"
                           required
                           class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                    @error('date')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="session" class="mb-2 block font-medium text-gray-700">
                        Session
                    </label>
                    <select id="session" name="session" required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:outline-none">
                        <option value="">Choose a session</option>
                        <option value="morning" @selected(old('session') === 'morning')>
                            Morning (Tuesday–Friday)
                        </option>
                        <option value="evening" @selected(old('session') === 'evening')>
                            Evening (Monday)
                        </option>
                    </select>
                    @error('session')
                        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-4 border-t border-gray-200 bg-gray-50 px-6 py-5">
                <a href="{{ route('events.index') }}"
                   class="font-medium text-gray-600 hover:underline">
                    Cancel
                </a>
                <button type="submit"
                        class="rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
                    Create Event
                </button>
            </div>
        </form>

        <p class="mt-5 text-sm text-gray-500">
            Monday evenings &middot; Tuesday–Friday mornings &middot; No weekend check-in
        </p>
    </div>
</x-layout>
