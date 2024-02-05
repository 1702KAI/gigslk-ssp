<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mt-2 mb-4">Job Listings</h2>
                            <div class="mb-3">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createJobModal">
                                    Create New Job
                                </button>
                            </div>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if ($jobs->count() > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Skills</th>
                                            <th>Budget</th>
                                            <th>Status</th>
                                            <th>Duration</th>
                                            <th>Create Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>{{ $job->title }}</td>
                                                <td>{{ $job->description }}</td>
                                                <td>{{ $job->skills }}</td>
                                                <td>${{ number_format($job->budget, 2) }}</td>
                                                <td>{{ $job->status }}</td>
                                                <td>{{ $job->duration }} days</td>
                                                <td>{{ $job->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    <a href="{{ route('employer.show-job', $job->id) }}" method="GET" class="btn btn-info btn-block" data-toggle="modal" data-target="#showJobModal">View</a>
                                                    <br>
                                                    <form action="{{ route('employer.delete-job', $job->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No jobs found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Include Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UoU7fmODPDomLWT+5e7fNQ2lc1RISXx7fFV+4G2GpCGtmhDU6LlYBk1yHwrJfz1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <!-- Include the modal file -->
    @include('employer.manage-jobs.create')
    @include('employer.manage-jobs.show')
</x-app-layout>
