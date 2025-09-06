@extends('layouts.frontend.app')

@section('title', 'Contact Us')
@section('content')


    <main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="auth-container max-w-2xl w-full space-y-6 p-10 bg-white rounded-xl shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Contact Us</h2>
                <p class="mt-2 text-gray-600">Have questions or feedback? Fill out the form below and we'll get back to you
                    soon.</p>
            </div>

            <!-- Signup Form -->
            <form class="mt-6 space-y-5" action="#" method="POST" id="signupForm">
                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"
                            placeholder="you@example.com">
                    </div>
                    <p class="mt-1 text-xs text-gray-500" id="emailHelp">We'll never share your email with anyone else.</p>
                </div>


                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-comment text-gray-400"></i>
                        </div>

                        <textarea name="message"
                            class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"></textarea>
                    </div>
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        </span>
                        Send Message
                    </button>
                </div>
            </form>

        </div>
    </main>

@endsection