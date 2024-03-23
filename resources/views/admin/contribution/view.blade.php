@extends('admin.homepage.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-11 ms-5">
                <div class="col-md-12">
                    <div class="alert alert-secondary">
                        Contribution List
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Faculty</th>
								<th>Title</th>
								<th>Description</th>
								<th>File</th>
								<th>Submitted on</th>
                                <th>Event</th>                               
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </thead>

                        <tbody>
                            @if (count($contributions) > 0)
                                @foreach ($contributions as $key => $con)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> {{ $con->user->name ?? '' }} </td>
                                        <td> {{ $con->faculty->name ?? '' }} </td>
                                        <td> {{ $con->title}} </td>
                                        <td> {{ $con->description }} </td>
										<td> {{ $con->file }} </td>
										<td> {{ $con->submitted_on }} </td>
										<td> {{ $con->event->title ?? '' }} </td>
                                        {{-- Function Delete --}}
                                        <td>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $con->id }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                        </td>
                                        {{-- Delete end --}}

                                        {{-- Model alert --}}
                                        <div class="modal fade" id="exampleModal{{ $con->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('events.destroy', [$con->id]) }}"
                                                    method="post">@csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hey Bro</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Delete</button>
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- fuction update --}}
                                        <td>
                                                <a href="{{ route('events.edit', [$con->id]) }}">
                                                    <i class="fa-sharp fa-light fa-pen-to-square"></i>
                                                </a>
                                        </td>
                                        {{-- Update end --}}
                                    </tr>
                                @endforeach
                            @else
                                <td>No contributions to display</td>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
