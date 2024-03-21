@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{ route('events.update', [$event->id]) }}" method="post">@csrf
                {{-- @method('PUT') --}}
                {{ method_field('PATCH') }}
                <div class="card">
                    <div class="card-header"> Update Event </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ ('Title') }}</label>
    
                                    <div class="col-md-7.7">
                                        <input placeholder="Title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $event->title }}" required autocomplete="title" autofocus>
                                        {{-- Form validation --}}
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- end Form Validation --}}

                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ ('Description') }}</label>
    
                                    <div class="col-md-7.7">
                                        <textarea placeholder="Description" id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required> {{ $event->description }} </textarea>
                                        {{-- form validation --}}
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- end Form validation --}}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                        required="" id="datepicker" value="{{ $event->start_date }}">
                                    {{-- form validation Start date --}}
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- End Form Validate Start date --}}
                                </div>
                            </div>
    
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>Final Date</label>
                                    <input type="date" name="final_date" class="form-control @error('final_date') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                        required="" id="datepicker" value="{{ $event->final_date }}">
                                    {{-- form validation Start date --}}
                                    @error('final_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- End Form Validate Start date --}}
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary"> Update </button>
                            </div>
                            
                        </div>
                    </div>
            </form>

        </div>
    </div>
</div>
@endsection