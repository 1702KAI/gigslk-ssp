<div class="container modal backdrop-blur-md bg-white fixed inset-0 overflow-y-auto rounded-xl p-20" id="showJobModal" tabindex="-1" role="dialog" aria-labelledby="showJobModalLabel" aria-hidden="true">
    <div class="row flex items-center justify-center">
        <div class="px-5 py-1 flex justify-content-center w-full">
            <div class="w-8/12">
                <div class="flex justify-between items-center">
                    <h2 class="py-5">Job Details</h2>
                    <a href="{{ route('employer.manage-jobs') }}" class="btn btn-primary mb-3">Back to Job Listings</a>
                </div>
                    <form action="{{ route('employer.update-job', $job->id) }}" method="PUT">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Job Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description">Job Description:</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="4" required>{{ $job->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills Required:</label>
                            <input type="text" class="form-control" id="skills" name="skills"
                                value="{{ $job->skills }}" required>
                        </div>
                        <div class="form-group">
                            <label for="budget">Budget:</label>
                            <input type="number" class="form-control" id="budget" name="budget"
                                value="{{ $job->budget }}" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Project Duration (in days):</label>
                            <input type="number" class="form-control" id="duration" name="duration"
                                value="{{ $job->duration }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $job->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $job->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="in-progress" {{ $job->status === 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $job->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
