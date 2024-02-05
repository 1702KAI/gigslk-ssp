<x-app-layout>
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

    <!-- Display Bids Table -->
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-2 mb-4">Bid Listings</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-hover ">
                    <thead class="text-green-900" >
                        <tr >
                            <th>Job Title</th>
                            <th>Proposal</th>
                            <th>Portfolio</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bids as $bid)
                            <tr class="border-b">
                                <td>{{ $bid->job->title }}</td>
                                <td>{{ $bid->proposal }}</td>
                                <td>{{ $bid->portfolio ?? 'Not provided' }}</td>
                                <td>{{ $bid->status }}</td>
                                <td>
                                    <a href="{{ route('freelancer.show-bid', $bid->id) }}" class="btn btn-info btn-sm">View</a>
                                    <br>
                                    <form action="{{ route('freelancer.delete-bid', $bid->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this bid?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No bids found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
