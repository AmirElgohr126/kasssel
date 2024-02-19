@extends('website.layout.main')

@section('contant')
    <div class="table-list-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title d-flex justify-content-between">
                        <div class="title">
                            <h3>Table List</h3>
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
                                        <th>first_name</th>
                                        <th>last_name</th>
                                        <th>email</th>
                                        <th>here_about</th>
                                        <th>message</th>
                                        <th>file_attachment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td title="{{ $employee->first_name }}">
                                                {{ $employee->first_name }}
                                            </td>
                                            <td title="{{ $employee->last_name }}">
                                                {{ $employee->last_name }}
                                            </td>
                                            <td title="{{ $employee->email }}">
                                                {{ $employee->email }}
                                            </td>
                                            <td title="{{ $employee->here_about }}">
                                                {{ $employee->here_about }}
                                            </td>
                                            <td title="{{ $employee->message }}">
                                                {{ $employee->message }}
                                            </td>
                                            <td>
                                                @if ($employee->file)
                                                    <a href="{{ asset('storage/' . $employee->file) }}"
                                                        class="btn btn-primary" download>Download</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $employees->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
