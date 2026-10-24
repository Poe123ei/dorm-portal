
<x-layout title="Worship Event Details">
    <div class="mb-6">
        <a href="{{ route('events.index') }}"
           class="text-sm text-blue-700 hover:underline">
            &larr; Back to Worship Events
        </a>
    </div>

    <div class="mx-auto max-w-2xl">
        <header class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Worship Event Details
            </h1>
            <p class="mt-2 text-gray-600">
                View the details of this worship event.
            </p>
        </header>

        <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="grid gap-6 p-6">
                <div>
                    <p class="text-sm font-medium text-gray-500">Event Title</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900">
                        {{ $event->title }}
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Dorm</p>
                    <p class="mt-1 text-gray-900">{{ $event->dorm }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Date</p>
                    <p class="mt-1 text-gray-900">
                        {{ $event->date->format('F j, Y') }}
                        ({{ $event->date->format('l') }})
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Session</p>
                    <p class="mt-1 text-gray-900">
                        {{ ucfirst($event->session) }}
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-200 bg-gray-50 px-6 py-4">
                <a href="{{ route('events.edit', $event) }}"
                   class="inline-flex rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
                    Edit Event
                </a>
            </div>
        </section>
    </div>
</x-layout>
