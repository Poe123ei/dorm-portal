
<x-layout title="Room Inspections">
    <header class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Room Inspections
            </h1>
            <p class="mt-2 text-gray-600">
                Manage student room inspection records.
            </p>
        </div>

        <a href="{{ route('roomcheck.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
            + Add Inspection
        </a>
    </header>

    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 px-6 py-5">
            <h2 class="text-lg font-semibold text-gray-900">
                All Room Inspections
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[580px] text-left">
                <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Room ID</th>
                        <th class="px-6 py-4">Student ID</th>
                        <th class="px-6 py-4">Student Name</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($rooms as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $row->room_id }}</td>
                            <td class="px-6 py-4">{{ $row->student_id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $row->student_name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('roomcheck.edit', $row->id) }}"
                                       class="font-medium text-blue-700 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('roomcheck.destroy', $row->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this room inspection?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="font-medium text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <p class="font-semibold text-gray-800">
                                    No room inspections yet.
                                </p>
                                <p class="mt-2 text-gray-600">
                                    Add your first inspection to get started.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    {{ $rooms->links() }}
</x-layout>
