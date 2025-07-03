<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 text-white" style="background-color: #176b98">
        <div class="flex items-center h-16 px-4 border-b border-[#FEBE35]">
            <i class="fas fa-chart-line mr-2" style="color: #FEBE35"></i>
            <a href="#" class="text-xl font-bold hover:opacity-80 transition"
                style="color: #FEBE35; text-decoration: none; display: inline-block; cursor: pointer;">
                Oxford Dashboard
            </a>
        </div>

        <div class="flex-1 overflow-y-auto">
            <nav class="px-4 py-4">
                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-[#FEBE35] mb-2" style="color: #FEBE35">Main</h2>
                    <ul>
                        <li class="mb-1">
                            <a href="{{ route('admin.index') }}"
                                class="flex items-center px-3 py-2 rounded-lg text-white"
                                style="background-color: #F8BF45DE">
                                <i class="fas fa-tachometer-alt mr-3" style="color: #176b98;"></i>
                                <span style="color: #176b98; font-weight: 600;">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-indigo-400 mb-2" style="color: #FEBE35">
                        Applications</h2>
                    <ul>
                        <li class="mb-1
                        group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #FEBE35">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <span> Students</span>
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.users') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-users mr-1"></i>
                                        All Student
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-user-plus mr-1"></i>
                                        Add New Student
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #FEBE35">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-chalkboard-user mr-2"></i>
                                    Teachers
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.teachers') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-users mr-1"></i>
                                        All Teachers
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-user-plus mr-1"></i>
                                        Add New Teachers
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #FEBE35">
                                <div class="flex items-center">
                                    <i class="fas fa-th-list mr-2"></i>
                                    Applies
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.applies') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-regular fa-clock mr-2"></i>
                                        Pending
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.accepts') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-check mr-2"></i>
                                        Accepted
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.rejects') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-xmark mr-2"></i>
                                        Rejected
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #FEBE35">
                                <div class="flex items-center">
                                    <i class="fas fa-book text-xl mr-2"></i>
                                    Courses
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.courses.all') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;"><i
                                            class="fas fa-folder-open mr-2 text-white text-lg"></i>
                                        All Courses
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="mb-1 group">
                            <a href="" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #FEBE35">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-list mr-2"></i>
                                    categories
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.categories') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-list mr-2"></i>
                                        All Categories
                                    </a>
                                </li>

                                <li class="mb-1">
                                    <a href="{{ route('admin.categories.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fa-solid fa-book-medical mr-2"></i>
                                        Create Categorey
                                    </a>
                                </li>

                            </ul>

                        </li>
                        <li class="mb-1 group">
                            <a href="" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #FEBE35">
                                <div class="flex items-center">
                                    <img src="https://openai.com/favicon.ico" class="w-7 mr-2" alt="">
                                    Chatgpt
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.chat') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#FEBE3548]"
                                        style="color: #FEBE35;">
                                        <i class="fas fa-comments mr-2"></i>

                                        Speak with Ai
                                    </a>
                                </li>
                            </ul>

                        </li>


                    </ul>
                </div>
            </nav>
        </div>

        <div class="p-4 border-t border-[#FEBE35]">
            <div class="flex items-center">
                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541' }}"
                    alt="{{ Auth::user()->name ?? 'Guest' }}" class="w-8 h-8 mr-2 rounded-full object-cover">
                <div>
                    <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[#FEBE35]">Admin</p>
                </div>
            </div>
        </div>
    </div>
</div>
