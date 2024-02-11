<!-- details.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">

            <!-- Project Details -->
            <div class="w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">{{ $project->job->title }}</h2>

                <!-- Project Details -->
                <div class="mb-4">
                    <p class="text-gray-600">{{ $project->job->description }}</p>
                    <!-- Add more project details as needed -->
                </div>

                <!-- Project Status -->
                <div class="mb-4">
                    <span class="text-sm font-semibold">Status:</span> {{ $project->status }}
                </div>

                <!-- Timeline and Deadline -->
                <div class="mb-4">
                    <span class="text-sm font-semibold">Timeline:</span> {{ $project->job->duration }} days
                </div>

            </div>

            <!-- Chat Sidebar -->
            <div class="w-1/3 h-full bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-col gap-4 h-full">
                    <!-- Chat Header -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                        <span class="text-lg font-semibold">Chat</span>
                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Chat Messages -->
                    <div class="flex-1 overflow-y-auto">
                        <!-- Sample Chat Messages -->
                        <!-- ... (Add chat messages dynamically here) ... -->
                    </div>

                    <!-- Chat Input -->
                    <div class="flex items-center border-t border-gray-200 pt-2">
                        <input type="text" placeholder="Type your message..." class="flex-1 border-none focus:ring-0">
                        <button class="ml-2 p-2 text-blue-500 hover:underline focus:outline-none">
                            Send
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
