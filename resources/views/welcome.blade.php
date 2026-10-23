
<x-layout title="Dorm Portal">
    <section class="rounded-2xl border border-gray-200 bg-white px-8 py-12 shadow-sm sm:px-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-blue-700">
            Welcome
        </p>

        <h1 class="text-4xl font-bold tracking-tight text-gray-900">
            Welcome to Dorm Portal
        </h1>

        <p class="mt-4 max-w-2xl text-lg text-gray-600">
            Manage room inspections and organize worship events in one place.
        </p>

        <div class="mt-8 grid gap-5 sm:grid-cols-2">
            <a href="{{ route('roomcheck.index') }}"
               class="rounded-xl border border-gray-200 p-6 transition hover:border-blue-400 hover:bg-blue-50">
                <h2 class="text-xl font-semibold text-gray-900">
                    Room Inspections
                </h2>
                <p class="mt-2 text-gray-600">
                    View and manage student room inspection records.
                </p>
                <span class="mt-4 inline-block font-semibold text-blue-700">
                    Open Room Inspections &rarr;
                </span>
            </a>

            <a href="{{ route('events.index') }}"
               class="rounded-xl border border-gray-200 p-6 transition hover:border-blue-400 hover:bg-blue-50">
                <h2 class="text-xl font-semibold text-gray-900">
                    Worship Events
                </h2>
                <p class="mt-2 text-gray-600">
                    View and manage worship events.
                </p>
                <span class="mt-4 inline-block font-semibold text-blue-700">
                    Open Worship Events &rarr;
                </span>
            </a>
        </div>
    </section>
</x-layout>
