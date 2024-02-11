<!-- completed-projects-table.blade.php -->
<div class="overflow-x-auto">
    <table class="min-w-full table-auto">
        <thead class="justify-between  text-black border-b">
            <tr>
                <th class="px-16 py-2"></th>
                <th class="px-16 py-2">Name</th>
                <th class="px-16 py-2">View</th>
                <th class="px-16 py-2">Date</th>
                <th class="px-16 py-2">Time</th>
                <th class="px-16 py-2">Status</th>
            </tr>
        </thead>
        <tbody class=" text-green-900">
            @foreach($projects as $project)
                <tr class="bg-white border-b">
                    <td class="px-16 py-2 flex flex-row items-center">
                        <img class="h-8 w-8 rounded-full object-cover"
                            src="{{ $project->freelancer->profile_picture_url }}" alt="">
                    </td>
                    <td>
                        <span class="text-center ml-2 font-semibold">{{ $project->freelancer->name }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <a href="{{ route('project.view-project', ['id' => $project->id]) }}" class="bg-green-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black">
                            View project
                        </a>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $project->created_at->format('m/d/Y') }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span>{{ $project->created_at->format('H:i') }}</span>
                    </td>
                    <td class="px-16 py-2">
                        <span class="text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
