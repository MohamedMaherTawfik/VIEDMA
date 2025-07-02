<x-teacher-panel>
    <div class="flex justify-center items-center min-h-[70vh] mt-8">
        <div class="w-full max-w-xl bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-bold mb-6 text-center">Create New Quiz in {{ $course->title }}</h1>
            <form method="POST" action="{{ route('teacherDashboard.quizzes.store', $course->slug) }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block font-semibold mb-1">Title</label>
                    <input name="title" type="text" class="w-full border px-4 py-2 rounded">
                    @error('title')
                        <span class="text-sm text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Description</label>
                    <textarea name="description" class="w-full border px-4 py-2 rounded"></textarea>
                    @error('description')
                        <span class="text-sm text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Duration (minutes)</label>
                    <input name="duration" type="number" class="w-full border px-4 py-2 rounded">
                    @error('duration')
                        <span class="text-sm text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Start At</label>
                    <input name="start_at" type="datetime-local" class="w-full border px-4 py-2 rounded">
                    @error('start_at')
                        <span class="text-sm text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">End At</label>
                    <input name="end_at" type="datetime-local" class="w-full border px-4 py-2 rounded">
                    @error('end_at')
                        <span class="text-sm text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Create Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-teacher-panel>
