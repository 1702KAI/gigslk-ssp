<x-app-layout>
    <!-- ... (any existing code) ... -->
    <!-- Include Bootstrap CSS and JS (if not already included) -->
     <!-- ... (any existing code) ... -->
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
                <h2 class="mt-2 mb-4">View Job Details</h2>
                <!-- Display job details here -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ $job->description }}</p>
                        <!-- Add more job details as needed -->
                    </div>
                </div>

                <!-- Display list of freelancers who bid on the job -->
                <h4 class="mb-3">Freelancers' Proposals</h4>

                @forelse ($activeBids as $bid)
                    <div class="list-group">
                        <div class="list-group-item">
                            <h5 class="mb-1">{{ optional($bid->freelancer)->name }}</h5>
                            <p class="mb-1">{{ $bid->proposal }}</p>
                            <p > Previously completed this kind of project? {{$bid->portfolio}}</p>
                            <br>
                            <form method="POST" action="{{ route('employer.accept-bid', ['bid' => $bid->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-3">Accept</button>
                            </form>
                            
                            <form method="POST" action="{{ route('employer.reject-bid', ['bid' => $bid->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-3">Decline</button>
                            </form>     

                        </div>
                    </div>
                @empty
                    <p>No freelancers have bid on this job yet.</p>
                @endforelse

                <!-- Add a button to go back to the bid index page -->
                <a href="{{ route('employer.manage-bids') }}" class="btn btn-primary mt-3">Back to Bids</a>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>
