<x-layout title="Worship Events">
    <div class="mb-6">
        <a href="{{ route('roomcheck.index') }}" class="text-sm text-blue-700 hover:underline">
            &larr; Room Inspections
        </a>
    </div>

    <header class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Worship Events</h1>
            <p class="mt-2 text-gray-600">A simple overview of worship across your dorms.</p>
        </div>
        <a href="{{ route('events.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
            + Create worship event
        </a>
    </header>

    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm"
             aria-labelledby="events-heading">
        <div class="flex items-center justify-between gap-4 border-b border-gray-200 px-6 py-5">
            <h2 id="events-heading" class="text-lg font-semibold">All events</h2>
            <span class="text-sm text-gray-500">
                {{ $events->total() }}
                {{ $events->total() === 1 ? 'event' : 'events' }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[580px] text-left">
                <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Dorm</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Session</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($events as $event)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $event->title }}</td>
                            <td class="px-6 py-4">{{ $event->dorm }}</td>
                            <td class="px-6 py-4">
                                {{ $event->date->format('M j, Y') }}
                                <span class="mt-1 block text-xs text-gray-500">
                                    {{ $event->date->format('l') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span @class([
                                    'inline-flex rounded-full px-3 py-1 text-xs font-semibold',
                                    'bg-amber-100 text-amber-800' => $event->session === 'morning',
                                    'bg-purple-100 text-purple-800' => $event->session !== 'morning',
                                ])>
                                    {{ ucfirst($event->session) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <strong class="text-gray-800">No worship events yet.</strong>
                                <p class="my-3 text-gray-600">
                                    Create your first event to start organizing dorm worship.
                                </p>
                                <a href="{{ route('events.create') }}"
                                   class="inline-flex rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
                                    Create worship event
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($events->hasPages())
            <div class="border-t border-gray-200 px-6 py-4">
                {{ $events->links('pagination::simple-tailwind') }}
            </div>
        @endif
    </section>

    <p class="mt-5 text-sm text-gray-500">
        Monday evenings &middot; Tuesday–Friday mornings &middot; No weekend check-in
    </p>
</x-layout>