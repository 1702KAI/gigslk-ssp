<div class="container modal backdrop-blur-md bg-white fixed inset-0 overflow-y-auto rounded-xl" id="createJobModal" tabindex="-1" role="dialog" aria-labelledby="createJobModalLabel" aria-hidden="true">
    <div class="row flex items-center justify-center">
        <div class="px-5 py-1 flex justify-content-center w-full">
            <div class="w-8/12">
                <div class="flex justify-between items-center">
                    <h2 class="py-5">Create New Job</h2>
                    <a href="{{ route('employer.manage-jobs') }}" class="btn btn-primary mb-3 ">Back to Job Listings</a>
                </div>
                <p>
                    Please fill in the form below to create a new job listing.
                </p>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('employer.post-job') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Job Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Job Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skills">Skills Required:</label>
                        <input type="text" class="form-control" id="skills" name="skills" required>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" id="budget" name="budget" required step="0.01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="duration">Project Duration (in days):</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <!-- Add more input fields as needed -->

                    <button type="submit" class="btn btn-success">Create Job</button>
                </form>
            </div>
        </div>
    </div>
</div>
