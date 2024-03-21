@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-11 ms-5">
                <div class="col-md-12">
                    <div class="alert alert-secondary">
                        All Employee
                    </div>

                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Faculty</th>
                                <th>Designation</th>
                                <th>Start Date</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> <img src="{{ asset('profile') }}/{{ $user->image }}" width="60"> </td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> <span class="badge rounded-pill bg-success"> {{ $user->role->name ??'' }} </span> </td>
                                        <td>  {{ $user->faculty->name ??'' }}  </td>
                                        <td> {{ $user->designation }} </td>
                                        <td> {{ $user->start_from }} </td>
                                        <td> {{ $user->address }} </td>
                                        <td> {{ $user->phone_number }} </td>
                                        {{-- Function Delete --}}
                                        <td>
                                            {{-- @if(isset(auth()->user()->role->permission['name']['user']['can-delete'])) --}}
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $user->id }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            {{-- @endif --}}
                                        </td>
                                        {{-- Delete end --}}

                                        {{-- Model alert --}}
                                        <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('users.destroy', [$user->id]) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Hey Bro</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Delete</button>
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- fuction update --}}
                                        <td>
                                            {{-- @if(isset(auth()->user()->role->permission['name']['user']['can-edit'])) --}}
                                                <a href="{{ route('users.edit', [$user->id]) }}">
                                                    <i class="fa-sharp fa-light fa-user-pen"></i>
                                                </a>
                                            {{-- @endif --}}
                                        </td>
                                        {{-- Update end --}}
                                    </tr>
                                @endforeach
                            @else
                                <td>No departments to display</td>
                            @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
