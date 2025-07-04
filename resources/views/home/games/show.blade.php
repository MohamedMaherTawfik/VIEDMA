<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->title }} - Game Store</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideInFromRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-in-right {
            animation: slideInFromRight 0.5s ease-out forwards;
        }

        .slide-in-left {
            animation: slideInFromLeft 0.5s ease-out forwards;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .game-cover {
            transition: all 0.3s ease;
        }

        .game-cover:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            background-color: #176B98;
            color: #FEBE35;
        }

        .btn-primary:hover {
            background-color: #135a80;
        }

        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #176B98;
        }
    </style>
</head>

<body class="bg-white text-gray-800 font-sans">
    <div x-data="gamePage()" class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-bold text-[#176B98] hover:text-[#135a80] transition">GameHub</a>
                <div class="flex space-x-4">
                    <button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition">Browse Games</button>
                    <button class="btn-primary px-4 py-2 rounded-lg transition">Sign In</button>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <!-- Breadcrumbs -->
            <div class="text-sm text-gray-600 mb-6 slide-in-left" style="animation-delay: 0.1s;">
                <a href="/" class="hover:text-[#176B98]">Home</a> /
                <a href="/category/{{ $game->games_categorey_id }}" class="hover:text-[#176B98]">Category</a> /
                <span class="text-[#176B98]">{{ $game->title }}</span>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Column - Game Cover -->
                <div class="lg:w-2/3 space-y-8">
                    <div class="game-cover bg-gray-100 rounded-xl overflow-hidden slide-in-left"
                        style="animation-delay: 0.2s;">
                        <img src="{{ $game->cover_image }}" alt="{{ $game->title }} Cover"
                            class="w-full h-auto object-cover">
                    </div>

                    <!-- Trailer -->
                    <div x-data="{ showTrailer: false }" class="slide-in-left" style="animation-delay: 0.3s;">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Game Trailer</h3>
                            <button @click="showTrailer = !showTrailer"
                                class="text-[#176B98] hover:text-[#135a80] flex items-center">
                                <span x-text="showTrailer ? 'Hide Trailer' : 'Show Trailer'"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                    fill="currentColor" x-show="!showTrailer">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                    fill="currentColor" x-show="showTrailer" style="display: none;">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="showTrailer" x-collapse class="bg-gray-100 rounded-xl overflow-hidden">
                            <iframe class="w-full aspect-video" src="{{ $game->trailer_url }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Description -->
                    <div x-data="{ expanded: false }" class="slide-in-left" style="animation-delay: 0.4s;">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Description</h3>
                            <button @click="expanded = !expanded"
                                class="text-[#176B98] hover:text-[#135a80] flex items-center">
                                <span x-text="expanded ? 'Show Less' : 'Read More'"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                    fill="currentColor" x-show="!expanded">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                    fill="currentColor" x-show="expanded" style="display: none;">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="expanded" x-collapse class="bg-gray-100 rounded-xl p-6">
                            <p class="text-gray-700 leading-relaxed">{{ $game->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Purchase Info -->
                <div class="lg:w-1/3 space-y-6">
                    <div class="bg-gray-100 rounded-xl p-6 slide-in-right" style="animation-delay: 0.2s;">
                        <h1 class="text-3xl font-bold mb-2">{{ $game->title }}</h1>

                        <div class="flex items-center space-x-2 mb-4">
                            <span class="bg-[#176B98] text-white text-xs px-2 py-1 rounded">{{ $game->platform }}</span>
                            <span class="text-gray-600 text-sm">Released:
                                {{ date('M d, Y', strtotime($game->release_date)) }}</span>
                        </div>

                        <div class="flex items-center mb-6">
                            @if ($game->discount > 0)
                                <span
                                    class="text-4xl font-bold">${{ number_format($game->price - ($game->price * $game->discount) / 100, 2) }}</span>
                                <span
                                    class="ml-2 text-gray-500 line-through">${{ number_format($game->price, 2) }}</span>
                                <span
                                    class="ml-2 bg-red-600 text-white text-xs px-2 py-1 rounded">-{{ $game->discount }}%</span>
                            @else
                                <span class="text-4xl font-bold">${{ number_format($game->price, 2) }}</span>
                            @endif
                        </div>

                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">Developer:</span>
                                <span class="font-medium">{{ $game->developer_name }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">Release Date:</span>
                                <span>{{ date('M d, Y', strtotime($game->release_date)) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Availability:</span>
                                <span
                                    :class="{ 'text-green-600': {{ $game->stock }} >
                                        0, 'text-red-600': {{ $game->stock }} <= 0 }">
                                    {{ $game->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>
                        </div>

                        <button @click="addToCart()"
                            class="w-full btn-primary py-3 px-6 rounded-lg font-bold transition flex items-center justify-center"
                            :disabled="{{ $game->stock }} <= 0 || !{{ $game->is_active }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="#FEBE35">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            {{ $game->stock > 0 && $game->is_active ? 'Buy Now' : ($game->is_active ? 'Out of Stock' : 'Not Available') }}
                        </button>

                        <div x-show="showAddedToCart" x-transition
                            class="mt-4 bg-green-600 text-white p-3 rounded-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Added to cart!
                        </div>
                    </div>

                    <!-- System Requirements -->
                    <div x-data="{ expanded: false }" class="bg-gray-100 rounded-xl overflow-hidden slide-in-right"
                        style="animation-delay: 0.3s;">
                        <button @click="expanded = !expanded"
                            class="w-full flex justify-between items-center p-6 hover:bg-gray-200 transition">
                            <h3 class="text-xl font-bold">System Requirements</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#176B98]"
                                viewBox="0 0 20 20" fill="currentColor" :class="{ 'transform rotate-180': expanded }">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="expanded" x-collapse class="px-6 pb-6">
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-700">Minimum:</h4>
                                    <p class="text-gray-600">OS: Windows 10 64-bit<br>
                                        Processor: Intel Core i5-2500K or AMD equivalent<br>
                                        Memory: 8 GB RAM<br>
                                        Graphics: NVIDIA GTX 970 or AMD equivalent<br>
                                        Storage: 50 GB available space</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-700">Recommended:</h4>
                                    <p class="text-gray-600">OS: Windows 10 64-bit<br>
                                        Processor: Intel Core i7-4770K or AMD equivalent<br>
                                        Memory: 16 GB RAM<br>
                                        Graphics: NVIDIA GTX 1070 or AMD equivalent<br>
                                        Storage: 50 GB available space (SSD recommended)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Similar Games -->
                    <div class="bg-gray-100 rounded-xl p-6 slide-in-right" style="animation-delay: 0.4s;">
                        <h3 class="text-xl font-bold mb-4">You may also like</h3>
                        <div class="space-y-4">
                            <div
                                class="flex items-center space-x-4 hover:bg-gray-200 p-2 rounded-lg transition cursor-pointer">
                                <img src="https://via.placeholder.com/80" alt="Similar Game"
                                    class="w-16 h-16 object-cover rounded-lg">
                                <div>
                                    <h4 class="font-medium">Cyberpunk 2077</h4>
                                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                                        <span>$59.99</span>
                                        <span class="bg-[#176B98] text-white text-xs px-1 rounded">PC</span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center space-x-4 hover:bg-gray-200 p-2 rounded-lg transition cursor-pointer">
                                <img src="https://via.placeholder.com/80" alt="Similar Game"
                                    class="w-16 h-16 object-cover rounded-lg">
                                <div>
                                    <h4 class="font-medium">The Witcher 3</h4>
                                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                                        <span>$39.99</span>
                                        <span class="bg-[#176B98] text-white text-xs px-1 rounded">PC</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-100 py-8 mt-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-xl font-bold text-[#176B98]">GameHub</h3>
                        <p class="text-gray-600 mt-1">Your ultimate gaming destination</p>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-600 hover:text-[#176B98] transition">Terms</a>
                        <a href="#" class="text-gray-600 hover:text-[#176B98] transition">Privacy</a>
                        <a href="#" class="text-gray-600 hover:text-[#176B98] transition">Support</a>
                        <a href="#" class="text-gray-600 hover:text-[#176B98] transition">About</a>
                    </div>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-300 text-center text-gray-500 text-sm">
                    &copy; 2023 GameHub. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gamePage', () => ({
                showAddedToCart: false,

                addToCart() {
                    if ({{ $game->stock }} <= 0 || !{{ $game->is_active }}) return;

                    // Here you would typically make an API call to add to cart
                    this.showAddedToCart = true;

                    // Hide the notification after 3 seconds
                    setTimeout(() => {
                        this.showAddedToCart = false;
                    }, 3000);
                }
            }));
        });
    </script>
</body>

</html>
