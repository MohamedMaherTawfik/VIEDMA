<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>
<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 text-white" style="background-color: #79131d">
        <div class="flex items-center h-16 px-4 border-b border-[#e4ce96]">
            <i class="fas fa-chart-line mr-2" style="color: #e4ce96"></i>
            <a href="{{ route('dashboard') }}" class="text-xl font-bold hover:opacity-80 transition"
                style="color: #e4ce96; text-decoration: none; display: inline-block; cursor: pointer;">
                Oxford Dashboard
            </a>
        </div>

        <div class="flex-1 overflow-y-auto">
            <nav class="px-4 py-4">
                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-[#e4ce96] mb-2" style="color: #e4ce96">Main</h2>
                    <ul>
                        <li class="mb-1">
                            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded-lg text-white"
                                style="background-color: #e4ce96">
                                <i class="fas fa-tachometer-alt mr-3" style="color: #79131d;"></i>
                                <span style="color: #79131d; font-weight: 600;">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-indigo-400 mb-2" style="color: #e4ce96">
                        Applications</h2>
                    <ul>
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3"></i>
                                    Courses
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">

                                <li class="mb-1">
                                    <a href="{{ route('teacher.courses.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Add New Course
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="p-4 border-t border-[#e4ce96]">
            <div class="flex items-center">
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" style="color: #e4ce96"
                    class="w-8 h-8 rounded-full mr-2" alt="Profile">
                <div>
                    <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[#e4ce96]">Admin</p>
                </div>
            </div>
        </div>
    </div>
</div>
