<x-panel>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
        class="w-full max-w-sm mx-auto mt-20">
        @csrf

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Category</h2>

        <!-- Category Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#79131d]"
                placeholder="Enter category name">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="bg-[#79131d] hover:bg-[#5e0f16] text-white font-semibold px-6 py-2 rounded-lg transition">
                Create Category
            </button>
        </div>
    </form>

</x-panel>
