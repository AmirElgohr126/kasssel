@extends('website.layout.main')

@section('contant')
<div class="table-list-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title d-flex justify-content-between">
                    <div class="title">
                        <h3>Job Listings</h3>
                        <p>Add or manage jobs</p>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="btn">
                        <a href="{{ route('job.create') }}" class="create-button">Create Job</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="order-list">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Open Jobs</th>
                                    <th>Location</th>
                                    <th>Experience</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $index => $job)
                                    <tr>
                                        <td>{{ $index + $jobs->firstItem() }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td>{{ $job->open_jobs }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->experience }}</td>
                                        <td class="action-buttons">


                                            <form action="{{ route('job.edit', $job->id) }}" method="GET">
                                                
                                                <button type="submit" class="update-button">update</button>
                                            </form>
                                            <form action="{{ route('job.delete', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                                @csrf
                                                <button type="submit" class="delete-button">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

