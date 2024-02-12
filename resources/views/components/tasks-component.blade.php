<!-- tasks-component.blade.php -->
<div class="text-slate-700 mx-2">
    <div class="w-full mx-auto my-10 bg-white p-8">
        <div class="flex flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-medium">Tasks list</h1>
            </div>
            <div class="inline-flex space-x-2 items-center">
                <!-- Add New Task Button -->
                <button class="p-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center text-indigo-200 hover:text-white bg-indigo-600 hover:bg-indigo-500" onclick="showNewTaskForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium hidden md:block">Create New Task</span>
                </button>

                <!-- Other Filter Buttons (Urgent, Latest) -->
                <!-- ... (Your existing filter buttons) ... -->
            </div>
        </div>
        <p class="text-slate-500">Hello, here are your latest tasks</p>

        <div id="tasks" class="my-5">
            <!-- Sample Task List Items (Adapt this based on your data) -->
            @foreach ($tasks as $task)
                <div class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4 border-l-transparent">
                    <!-- Display task details here using $task variable -->
                    <div class="inline-flex items-center space-x-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <div class="{{ $task->completed ? 'text-slate-500 line-through' : 'text-slate-500' }}">{{ $task->name }}</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-slate-500 text-center">Last updated 12 minutes ago</p>
    </div>

 <!-- New Task Modal -->
<div id="newTaskModal" class="fixed inset-0 overflow-y-auto hidden bg-gray-900 bg-opacity-50">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-md w-96">
            <!-- Task Form Goes Here -->
            <form action="{{ route('project.store-task', ['id' => $project->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <!-- Task Name -->
                <label for="taskName">Task Name:</label>
                <input type="text" id="taskName" name="name" required class="border rounded-md p-2 mb-2 w-full">

                <!-- Task Description -->
                <label for="taskDescription">Task Description:</label>
                <textarea id="taskDescription" name="description" required class="border rounded-md p-2 mb-2 w-full"></textarea>

                <!-- Assigned To (you may replace this with a dropdown of users) -->
                <label for="assignedTo">Assigned To:</label>
                <input type="text" id="assignedTo" name="assigned_to" class="border rounded-md p-2 mb-2 w-full">

                <!-- Assigned By (you may replace this with a dropdown of users) -->
                <label for="assignedBy">Assigned By:</label>
                <input type="text" id="assignedBy" name="assigned_by" class="border rounded-md p-2 mb-2 w-full">

                <!-- Due Date -->
                <label for="dueDate">Due Date:</label>
                <input type="date" id="dueDate" name="due_date" class="border rounded-md p-2 mb-2 w-full">

                <!-- Task Status (you may replace this with a dropdown) -->
                <label for="taskStatus">Task Status:</label>
                <select id="taskStatus" name="status" class="border rounded-md p-2 mb-2 w-full">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="in_progress">In Progress</option>
                </select>

                <!-- Add more form fields as needed -->

                <button type="submit" class="bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-500">Create Task</button>
            </form>

            <!-- Close Modal Button -->
            <button class="mt-4 p-2 text-gray-600 hover:text-gray-800 hover:underline" onclick="hideNewTaskForm()">Close</button>
        </div>
    </div>
</div>


    <script>
        function showNewTaskForm() {
            document.getElementById('newTaskModal').classList.remove('hidden');
        }

        function hideNewTaskForm() {
            document.getElementById('newTaskModal').classList.add('hidden');
        }
    </script>
</div>
