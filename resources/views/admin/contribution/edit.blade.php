@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    
                </li>
            </ol>
        </nav>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        
        <form action="{{ route('contributions.update', [$contribution->id]) }}" method="post" enctype="multipart/form-data">@csrf
            {{ method_field('PATCH') }}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Contribution</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control" name="user_id" required="">

                                    @foreach (App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}"
                                            @if($contribution->user_id == $user->id)selected @endif>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Faculty</label>
                                <select class="form-control" name="faculty_id" required="">

                                    @foreach (App\Models\Faculty::all() as $faculty)
                                        <option value="{{ $faculty->id }}"
                                            @if($contribution->faculty_id == $faculty->id)selected @endif>
                                            {{ $faculty->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$contribution->title}}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{$contribution->description}}">
                            </div>
                            
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control" value="{{$contribution->file}}">
                            </div>

                            <div class="form-group">
                                <label>Event</label>
                                <select class="form-control" name="event_id" required="">

                                    @foreach (App\Models\Event::all() as $event)
                                        <option value="{{ $event->id }}"
                                            @if($contribution->event_id == $event->id)selected @endif>
                                            {{ $event->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary " type="submit">Submit</button>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </form>
    </div>
@endsection
