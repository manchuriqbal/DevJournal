@extends('layouts.frontend.app')
@section('title', 'About Us')

@section('content')

    <div class="max-w-4xl mx-auto py-16 px-6">
        <h1 class="text-4xl font-bold text-gray-900 mb-6">About Us</h1>
        <p class="text-lg text-gray-700 mb-8">
            Welcome to our blog! We are passionate storytellers, tech enthusiasts, and lifelong learners dedicated to
            sharing knowledge and inspiration with our community.
        </p>
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h2>
                <p class="text-gray-600">
                    To empower readers with insightful articles, practical tutorials, and the latest trends in technology,
                    design, and development. We believe in making learning accessible and enjoyable for everyone.
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Values</h2>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Integrity & Transparency</li>
                    <li>Continuous Learning</li>
                    <li>Community Engagement</li>
                    <li>Innovation & Creativity</li>
                </ul>
            </div>
        </div>
        <div class="flex items-center space-x-6">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member"
                class="w-20 h-20 rounded-full shadow-md">
            <div>
                <h3 class="text-xl font-semibold text-gray-900">John Doe</h3>
                <p class="text-gray-600">Founder & Lead Writer</p>
            </div>
        </div>
    </div>

@endsection