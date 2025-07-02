<x-teacher-panel>
    <div class="max-w-5xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Create Quiz Questions</h1>
        @php
            $courseSlug = request('course');
        @endphp
        <form method="POST" action="{{ route('questions.store', [$courseSlug, $quiz->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div id="questions-container" class="space-y-8">

                <div class="question-block border p-4 rounded bg-gray-50">
                    <label class="block font-semibold mb-2">Question</label>
                    <input type="text" name="questions[0][text]" class="w-full border px-4 py-3 rounded text-lg mb-1">
                    @error('questions.0.text')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="grid grid-cols-2 gap-4 mt-4">
                        @for ($i = 0; $i < 4; $i++)
                            <div>
                                <label class="block font-medium mb-1">Option {{ $i + 1 }}</label>
                                <input type="text" name="questions[0][options][{{ $i }}][text]"
                                    class="w-full border px-4 py-3 rounded text-lg mb-1">
                                @error("questions.0.options.$i.text")
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror

                                <label class="block font-medium mb-1 text-sm mt-2">Is Correct?</label>
                                <select name="questions[0][options][{{ $i }}][is_correct]"
                                    class="border px-3 py-2 rounded w-1/3 text-sm">
                                    <option value="false" selected>False</option>
                                    <option value="true">True</option>
                                </select>
                                @error("questions.0.options.$i.is_correct")
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        @endfor
                    </div>
                </div>

            </div>

            <!-- زرار الحفظ -->
            <div class="mt-8">
                <button type="submit" class="bg-[#79131DD7] text-[#e4ce96] px-6 py-2 rounded hover:bg-[#79131D]">
                    Save Questions
                </button>
            </div>
        </form>
    </div>
</x-teacher-panel>
