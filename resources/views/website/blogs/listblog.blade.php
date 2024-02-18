@extends('website.layout.main')

@section('contant')
<div class="table-list-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title d-flex justify-content-between">
                    <div class="title">
                        <h3>Table List</h3>
                        <p>Add Table / Table List</p>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="btn">
                        <a href="{{ route('blog.create') }}" class="create-button">Create</a>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Update / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($blog->image)
                                        <img src="{{ $blog->image }}" alt="blog image" style="width: 50px; height: auto;"/>
                                        @endif
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td class="action-buttons">
                                        <form action="{{ route('blog.edit', $blog->id) }}" method="GET">
                                                <button type="submit" class="update-button">update</button>
                                            </form>
                                        <form action="{{ route('blog.delete', $blog->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div>
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
