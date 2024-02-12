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
            <div class="w-1/3 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
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
            <div  class="w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <!-- Tasks -->
            <x-tasks-component :tasks="$tasks" :project="$project"/>
            </div>


        </div>
    </div>
</x-app-layout>
