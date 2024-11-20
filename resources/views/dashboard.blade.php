<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <form method="POST" action="{{ route('register') }}">
    @csrf
    <!-- Form fields for name, email, password, etc. -->
    <button type="submit">Register</button>
</form>

    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold">Welcome!</h3>
                    <p class="text-gray-700 mt-2">{{ __("You're logged in! Explore your dashboard to manage your tasks and view your progress.") }}</p>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Profile Management -->
                <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <h4 class="text-lg font-semibold text-gray-800">Profile</h4>
                    <p class="text-gray-600 mt-2">Manage your personal information and account settings.</p>
                    <a href="#" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                        Manage Profile
                    </a>
                </div>

                <!-- Notifications -->
                <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <h4 class="text-lg font-semibold text-gray-800">Notifications</h4>
                    <p class="text-gray-600 mt-2">Stay updated with the latest notifications and alerts.</p>
                    <a href="#" class="mt-4 inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                        View Notifications
                    </a>


                                            <nav>
                            @auth
                                @if(auth()->user()->hasRole('Admin'))
                                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                @elseif(auth()->user()->hasRole('Teacher'))
                                    <a href="{{ route('teacher.dashboard') }}">Teacher Dashboard</a>
                                @elseif(auth()->user()->hasRole('Student'))
                                    <a href="{{ route('student.dashboard') }}">Student Dashboard</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>
                            @endauth
                        </nav>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
