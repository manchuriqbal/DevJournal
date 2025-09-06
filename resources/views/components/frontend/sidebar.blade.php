<aside class="lg:w-1/3 space-y-8">
    <!-- About Widget -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 text-gray-800">About The Blog</h3>
        <p class="text-gray-600 mb-4">IBlog brings you the latest news, tutorials, and thought pieces on technology,
            programming, AI, and the digital world.</p>
        <button class="text-blue-600 font-medium hover:text-blue-800 transition">
            Read More <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>

    <!-- Popular Posts -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Posts</h3>
        <div class="space-y-4">
            <!-- Post 1 -->
            @foreach ($popularPosts as $post)

                <div class="flex items-start">
                    @if (Str::startsWith($post->image, 'https://'))
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded-md mr-3">
                    @else
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="w-16 h-16 object-cover rounded-md mr-3">
                    @endif
                    <div>
                        <h4 class="font-medium text-gray-800">{{ $post->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach

            {{-- <!-- Post 2 -->
            <div class="flex items-start">
                <img src="https://placehold.co/920x610/png" alt="Low-Code"
                    class="w-16 h-16 object-cover rounded-md mr-3">
                <div>
                    <h4 class="font-medium text-gray-800">Low-Code Revolution</h4>
                    <p class="text-sm text-gray-500">July 18, 2023</p>
                </div>
            </div>

            <!-- Post 3 -->
            <div class="flex items-start">
                <img src="https://placehold.co/920x610/png" alt="Cloud" class="w-16 h-16 object-cover rounded-md mr-3">
                <div>
                    <h4 class="font-medium text-gray-800">Cloud Best Practices</h4>
                    <p class="text-sm text-gray-500">June 10, 2023</p>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 text-gray-800">Categories</h3>
        <div class="space-y-2">
            @foreach ($categories as $category)

                <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                    <span class="text-gray-700">{{ $category->name }}</span>
                    <span
                        class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">{{$category->posts->count()}}</span>
                </a>
            @endforeach
            {{-- <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                <span class="text-gray-700">Artificial Intelligence</span>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">8</span>
            </a>
            <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                <span class="text-gray-700">Cloud Computing</span>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">5</span>
            </a>
            <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                <span class="text-gray-700">Cybersecurity</span>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">7</span>
            </a> --}}
        </div>
    </div>

    <!-- Newsletter Widget -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 text-gray-800">Newsletter</h3>
        <p class="text-gray-600 mb-4">Subscribe to get the latest posts delivered to your inbox.</p>
        <form class="space-y-4">
            <input type="email" placeholder="Your email address"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Subscribe
            </button>
        </form>
    </div>

    <!-- Tags Widget -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Tags</h3>
        <div class="flex flex-wrap gap-2">
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#javascript</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#react</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#webdev</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#ai</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#cloud</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#security</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#performance</a>
            <a href="#"
                class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#beginners</a>
        </div>
    </div>
</aside>