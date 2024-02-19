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
                                        <th>name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>message</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $contact->name }}
                                            </td>
                                            <td>
                                                {{ $contact->email }}
                                            </td>
                                            <td>
                                                {{ $contact->phone }}
                                            </td>
                                            <td>
                                                {{ $contact->message }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div>
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
