<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $lesson->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800">
    @php use Illuminate\Support\Str; @endphp

    {{-- navbar --}}
    <x-navbar />

    <!-- Main Container -->
    <div class="max-w-5xl mx-auto px-4 py-10">

        <!-- Lesson Title -->
        <h1 class="text-3xl font-bold mb-4">{{ $lesson->title }}</h1>

        <!-- Description -->
        <p class="text-lg text-gray-600 mb-6">{{ $lesson->description }}</p>

        <!-- Video Section -->
        @if (Str::contains($lesson->video_url, 'youtube.com'))
            <div class="aspect-w-16 aspect-h-9 mb-10">
                <iframe class="w-full rounded-lg shadow-md"
                    src="https://www.youtube.com/embed/{{ Str::after($lesson->video_url, 'v=') }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        @else
            <div class="aspect-w-16 aspect-h-9 mb-10">
                <video controls class="w-full rounded-lg shadow-md">
                    <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        <!-- Comments Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Comments</h2>

            <!-- Add Comment Form -->
            <form method="POST" action="" class="mb-6">
                @csrf
                <textarea name="comment" rows="3" required
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#79131d] resize-none"
                    placeholder="Write your comment..."></textarea>
                <button type="submit"
                    class="mt-3 px-4 py-2 bg-[#79131d] text-[#e4ce96] rounded-md font-medium hover:bg-[#5e0f17] transition">
                    Post Comment
                </button>
            </form>

            <!-- Comment List -->
            <div class="space-y-4">
                @foreach ($lesson->comments as $comment)
                    <div class="border-t pt-4">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                            <span class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mt-2 text-gray-700">{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    {{-- footer --}}
    <x-footer />

    <!-- Aspect Ratio Fix for Tailwind v2 -->
    <style>
        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%;
        }

        .aspect-w-16 iframe,
        .aspect-w-16 video {
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
