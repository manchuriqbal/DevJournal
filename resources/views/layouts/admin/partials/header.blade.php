<header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="flex justify-between items-center px-4 py-4 sm:px-6 lg:px-8">
        <button class="md:hidden text-gray-500 focus:outline-none" id="mobile-menu-button">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <div class="flex-1 max-w-md mx-4">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" placeholder="Search dashboard..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <button class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                <i class="fas fa-bell text-xl"></i>
            </button>
            <button class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                <i class="fas fa-envelope text-xl"></i>
            </button>

            <div class="relative">
                <button id="user-menu-button" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-8 h-8 rounded-full">
                    <span class="hidden md:inline text-gray-700">
                        @auth('admin')
                            {{ Auth::guard('admin')->user()->name }}
                        @endauth

                        @auth('creator')
                            {{ Auth::guard('creator')->user()->name }}

                        @endauth
                    </span>
                    <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
                </button>
                <div id="user-menu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                    @auth('admin')
                        <a href="{{ route('admin.profile.me') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                            Profile</a>
                    @endauth
                    @auth('creator')
                        <a href="{{ route('creator.profile.me') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                            Profile</a>
                    @endauth
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="{{ route('home') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Frontend</a>
                    <div class="border-t border-gray-200"></div>
                    {{-- <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                        out</a> --}}
                    @auth('admin')
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                out</button>
                        </form>
                    @endauth
                    @auth('creator')
                        <form action="{{ route('creator.logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                out</button>
                        </form>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</header>