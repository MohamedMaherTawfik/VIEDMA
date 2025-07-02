<x-teacher-panel>
    <div class="flex justify-center items-center min-h-[70vh] mt-10">
        <div class="w-full max-w-xl bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-bold mb-6 text-center">Edit Quiz: {{ $quiz->title }}</h1>
            <form method="POST" action="{{ route('teacherDashboard.quizzes.update', [$course->slug, $quiz->slug]) }}"
                class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="block font-semibold mb-1">Title</label>
                    <input name="title" type="text" value="{{ $quiz->title }}"
                        class="w-full border px-4 py-2 rounded">
                    @error('title')
                        <span class="text-red text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Description</label>
                    <textarea name="description" class="w-full border px-4 py-2 rounded">{{ $quiz->description }}</textarea>
                    @error('description')
                        <span class="text-red text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Duration (minutes)</label>
                    <input name="duration" type="number" value="{{ $quiz->duration }}"
                        class="w-full border px-4 py-2 rounded">
                    @error('duration')
                        <span class="text-red text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Start At</label>
                    <input name="start_at" type="datetime-local"
                        value="{{ \Carbon\Carbon::parse($quiz->start_at)->format('Y-m-d\TH:i') }}"
                        class="w-full border px-4 py-2 rounded">
                    @error('strat_at')
                        <span class="text-red text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">End At</label>
                    <input name="end_at" type="datetime-local"
                        value="{{ \Carbon\Carbon::parse($quiz->end_at)->format('Y-m-d\TH:i') }}"
                        class="w-full border px-4 py-2 rounded">
                    @error('end_at')
                        <span class="text-red text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-[#79131DD5] text-white px-6 py-2 rounded hover:bg-[#79131d]">
                        Update Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-teacher-panel>
