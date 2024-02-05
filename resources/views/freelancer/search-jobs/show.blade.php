<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Job</title>
        <!-- Include Bootstrap CSS or any other CSS framework you prefer -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Job Details</h2>

                        <!-- Display job details here -->
                        <div class="mb-4">
                            <h4>Job Title: {{ $job->title }}</h4>
                            <p>Description: {{ $job->description }}</p>
                            <p><strong>Skills:</strong> {{ $job->skills }}</p>
                            <p><strong>Budget:</strong> ${{ number_format($job->budget, 2) }}</p>
                            <p><strong>Duration:</strong> {{ $job->duration }} days</p>
                            <p><strong>Created At:</strong> {{ $job->created_at }}</p>
                            <p><strong>Updated At:</strong> {{ $job->updated_at }}</p>
                            <label for="can_deliver">Can Deliver in Given Time:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="can_deliver[]" value="I'll try my best" id="inlineCheckboxTryBest">
                                <label class="form-check-label" for="inlineCheckboxTryBest">I'll try my best</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="can_deliver[]" value="Yes" id="inlineCheckboxYes">
                                <label class="form-check-label" for="inlineCheckboxYes">Yes</label>
                            </div>
                            {{-- <p><strong>Employer</strong> {{ $employer->name }}</p> --}}
                            <!-- Add more job details as needed -->
                        </div>
                        <!-- Can Deliver in Given Time -->
    <div class="form-group">
        <label for="can_deliver">Can Deliver in Given Time:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="can_deliver[]" value="I'll try my best" id="inlineCheckboxTryBest">
            <label class="form-check-label" for="inlineCheckboxTryBest">I'll try my best</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="can_deliver[]" value="Yes" id="inlineCheckboxYes">
            <label class="form-check-label" for="inlineCheckboxYes">Yes</label>
        </div>
    </div>

                        <!-- Bid Form -->
                        <h3 class="mb-4">Place Bid</h3>
              
                        <form action="{{ route('freelancer.bid-job', ['job' => $job->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                            <div class="form-group">
                                <label for="proposal">How can you contribute to this project?</label>
                                <textarea name="proposal" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="portfolio">Portfolio or Relevant Experience (optional):</label>
                                <input type="text" name="portfolio" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Place Bid</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS or any other JS framework you prefer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</x-app-layout>
