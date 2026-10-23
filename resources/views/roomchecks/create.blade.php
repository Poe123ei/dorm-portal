
<x-layout title="Create Room Inspection">
    <div class="mb-6">
        <a href="{{ route('roomcheck.index') }}"
           class="text-sm text-blue-700 hover:underline">
            &larr; Back to Room Inspections
        </a>
    </div>

    <div class="mx-auto max-w-2xl">
        <header class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Create Room Inspection
            </h1>
            <p class="mt-2 text-gray-600">
                Enter the room and student information below.
            </p>
        </header>

        <form action="{{ route('roomcheck.store') }}"
              method="POST"
              class="space-y-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="room_id" class="mb-2 block font-medium text-gray-700">
                    Room ID
                </label>
                <input type="number" id="room_id" name="room_id"
                       value="{{ old('room_id') }}" step="1" required
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                @error('room_id')
                    <p role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="student_id" class="mb-2 block font-medium text-gray-700">
                    Student ID
                </label>
                <input type="number" id="student_id" name="student_id"
                       value="{{ old('student_id') }}" step="1" required
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                @error('student_id')
                    <p role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="student_name" class="mb-2 block font-medium text-gray-700">
                    Student Name
                </label>
                <input type="text" id="student_name" name="student_name"
                       value="{{ old('student_name') }}" maxlength="255" required
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                @error('student_name')
                    <p role="alert" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3 border-t border-gray-100 pt-5">
                <button type="submit"
                        class="rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
                    Save Room Inspection
                </button>

                <a href="{{ route('roomcheck.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-3 font-semibold text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>
