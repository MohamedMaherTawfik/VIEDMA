<?php
use App\Models\User;
use App\Models\Courses;
use App\Models\applyTeacher;
$totalUsers = User::where('role', 'user')->get();
$totalTeachers = User::where('role', 'teacher')->get();
$users = User::orderBy('created_at', 'desc')->take(5)->get();
$courses = Courses::get();
$pendings = applyTeacher::where('status', 'pending')->get();
?>

<!-- Main Content Area -->
<main class="flex-1 overflow-y-auto p-6 bg-gray-50" style="background-color #e4ce96">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Student</p>
                    <h3 class="text-2xl font-bold" id="">{{ count($totalUsers) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2">
                <i class="fas fa-arrow-up mr-1"></i> 12% from last month
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Courses</p>
                    <h3 class="text-2xl font-bold" id="totalRevenue">{{ count($courses) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fa-solid fa-book"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2">
                <i class="fas fa-arrow-up mr-1"></i> 8% from last month
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Teachers</p>
                    <h3 class="text-2xl font-bold" id="activeProjects">{{ count($totalTeachers) }} </h3>
                </div>
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
            </div>
            <p class="text-sm text-red-500 mt-2">
                <i class="fas fa-arrow-down mr-1"></i> 3% from last month
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Pendings Teacher</p>
                    <h3 class="text-2xl font-bold" id="conversionRate">{{ count($pendings) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2">
                <i class="fas fa-arrow-up mr-1"></i> 2% from last month
            </p>
        </div>
    </div>

    <!-- Charts and Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Line Chart -->
        <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">Sales Overview</h3>
                <select
                    class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option selected>Last 12 Months</option>
                </select>
            </div>
            <div class="h-64" id="lineChart">
                <!-- Chart will be rendered here -->
                <div class="flex items-center justify-center h-full text-gray-400">
                    <i class="fas fa-spinner fa-spin mr-2"></i> Loading chart...
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
            <div class="space-y-4" id="recentActivity">
                <!-- Activities will be loaded here -->
                <div class="flex items-center justify-center h-32 text-gray-400">
                    <i class="fas fa-spinner fa-spin mr-2"></i> Loading activities...
                </div>
            </div>
        </div>
    </div>

    <!-- User Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold">Recent Users</h3>
                <button class="text-sm text-indigo-600 hover:text-indigo-800">View All</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role</th>
                        <th class="px-6 py-3 text-right   text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="">
                    <!-- Users will be loaded here -->
                    <tr>
                        @foreach ($users as $user)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->role }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                            </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Container -->


</main>
</div>
