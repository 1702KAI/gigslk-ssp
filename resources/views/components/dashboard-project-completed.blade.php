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
            <!-- Sample data for illustration purposes -->
            <tr class="bg-white border-b">
                <td class="px-16 py-2 flex flex-row items-center">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="https://randomuser.me/api/portraits/men/30.jpg" alt="">
                </td>
                <td>
                    <span class="text-center ml-2 font-semibold">Dean Lynch</span>
                </td>
                <td class="px-16 py-2">
                    <button class="bg-green-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black">
                        View project
                    </button>
                </td>
                <td class="px-16 py-2">
                    <span>05/06/2020</span>
                </td>
                <td class="px-16 py-2">
                    <span>10:00</span>
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
            <tr class="bg-white border-b">
                <td class="px-16 py-2 flex flex-row items-center">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="https://randomuser.me/api/portraits/men/76.jpg" alt="">
                </td>
                <td>
                    <span class="text-center ml-2 font-semibold">Ralph Barnes</span>
                </td>
                <td class="px-16 py-2">
                    <button class="bg-green-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black">
                        View project
                    </button>
                </td>
                <td class="px-16 py-2">
                    <span>05/06/2020</span>
                </td>
                <td class="px-16 py-2">
                    <span>12:15</span>
                </td>
                <td class="px-16 py-2">
                    <span class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="9" />
                            <polyline points="12 7 12 12 15 15" />
                        </svg>
                    </span>
                </td>
            </tr>
            <tr class="bg-white border-b">
                <td class="px-16 py-2 flex flex-row items-center">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="https://randomuser.me/api/portraits/men/38.jpg" alt="">
                </td>
                <td>
                    <span class="text-center ml-2 font-semibold">Brett Castillo</span>
                </td>
                <td class="px-16 py-2">
                    <button class="bg-green-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black">
                        View project
                    </button>
                </td>
                <td class="px-16 py-2">
                    <span>05/06/2020</span>
                </td>
                <td class="px-16 py-2">
                    <span>08:35</span>
                </td>
                <td class="px-16 py-2">
                    <span class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
