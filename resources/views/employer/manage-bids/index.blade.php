<x-app-layout>
    <!-- ... (previous code) ... -->
    <br>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-2 mb-4">Active Bid Listings</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Job Title</th>
                            <th>Number of Bids</th>
                            <!-- Add more bid details as needed -->
                            <th>Action</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalActiveBidsByJob as $jobId => $totalActiveBids)
                        <tr>
                            <td>{{ $activeBids->where('job_id', $jobId)->first()->job->title }}</td>
                            <td>{{ $totalActiveBids }}</td>
                            <!-- Add more bid details as needed -->
                            <td>
                                <!-- Add action buttons, e.g., view and edit bid --> 
                                <a href="{{ route('employer.show-bid', ['id' => $jobId]) }}" class="btn btn-info btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
