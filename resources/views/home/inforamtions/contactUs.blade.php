<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Oxford Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">

    {{-- navbar --}}
    <x-navbar />

    <!-- Header -->
    <header class="bg-[#79131d] text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-2xl font-bold text-[#e4ce96]">Oxford Platform</a>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="hover:text-[#e4ce96] transition">Home</a>
                    <a href="/courses" class="hover:text-[#e4ce96] transition">Courses</a>
                    <a href="/contact" class="text-[#e4ce96] font-semibold">Contact</a>
                </nav>
                <button class="md:hidden text-2xl">☰</button>
            </div>
        </div>
    </header>

    <!-- Animated Contact Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8" x-data="contactForm()" x-init="initAnimations()">
        <div class="max-w-4xl mx-auto">
            <!-- Section Header (Animated) -->
            <div class="text-center mb-12" x-show="showHeader" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
                <h2 class="text-3xl font-bold text-[#79131d] mb-4">Contact Us</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Have questions? Get in touch with our team—we're here to help!
                </p>
            </div>

            <!-- Contact Card (Animated) -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" x-show="showForm"
                x-transition:enter="transition ease-out duration-700 delay-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Left Side (Contact Info) -->
                    <div class="bg-[#79131d] p-8 text-[#e4ce96]">
                        <h3 class="text-xl font-bold mb-6">Contact Information</h3>

                        <!-- Contact Items -->
                        <div class="space-y-5">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold">Address</h4>
                                    <p class="text-sm opacity-80">123 Education St, Oxford, UK</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold">Phone</h4>
                                    <p class="text-sm opacity-80">+44 20 1234 5678</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold">Email</h4>
                                    <p class="text-sm opacity-80">contact@oxfordplatform.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="mt-8">
                            <h4 class="font-semibold mb-3">Follow Us</h4>
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-[#e4ce96] text-[#79131d] flex items-center justify-center hover:bg-white transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-[#e4ce96] text-[#79131d] flex items-center justify-center hover:bg-white transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-[#e4ce96] text-[#79131d] flex items-center justify-center hover:bg-white transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-[#e4ce96] text-[#79131d] flex items-center justify-center hover:bg-white transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (Form) -->
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Send Us a Message</h3>

                        <form @submit.prevent="submitForm" class="space-y-5">
                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full
                                    Name</label>
                                <input type="text" id="name" x-model="form.name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#79131d] focus:border-transparent"
                                    placeholder="John Doe" required>
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" x-model="form.email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#79131d] focus:border-transparent"
                                    placeholder="john@example.com" required>
                            </div>

                            <!-- Subject Field -->
                            <div>
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                                <input type="text" id="subject" x-model="form.subject"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#79131d] focus:border-transparent"
                                    placeholder="Course Inquiry" required>
                            </div>

                            <!-- Message Field -->
                            <div>
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea id="message" x-model="form.message" rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#79131d] focus:border-transparent"
                                    placeholder="Your message here..." required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-[#79131d] text-[#e4ce96] py-3 rounded-md font-medium hover:bg-[#79131d]/90 transition flex items-center justify-center"
                                :disabled="isSubmitting">
                                <span x-text="isSubmitting ? 'Sending...' : 'Send Message'"></span>
                                <svg x-show="isSubmitting" class="animate-spin -mr-1 ml-3 h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </button>
                        </form>

                        <!-- Success Message (Animated) -->
                        <div x-show="showSuccess" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md animate-fade-in">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span x-text="successMessage"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Alpine.js Contact Form Logic -->
    <script>
        function contactForm() {
            return {
                showHeader: false,
                showForm: false,
                showSuccess: false,
                isSubmitting: false,
                successMessage: '',
                form: {
                    name: '',
                    email: '',
                    subject: '',
                    message: ''
                },

                initAnimations() {
                    setTimeout(() => this.showHeader = true, 100);
                    setTimeout(() => this.showForm = true, 300);
                },

                submitForm() {
                    this.isSubmitting = true;

                    // Simulate API call (replace with actual fetch)
                    setTimeout(() => {
                        this.isSubmitting = false;
                        this.showSuccess = true;
                        this.successMessage = 'Thank you! Your message has been sent. We’ll respond shortly.';

                        // Reset form
                        this.form = {
                            name: '',
                            email: '',
                            subject: '',
                            message: ''
                        };

                        // Hide success message after 5 seconds
                        setTimeout(() => this.showSuccess = false, 5000);
                    }, 1500);
                }
            }
        }
    </script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
