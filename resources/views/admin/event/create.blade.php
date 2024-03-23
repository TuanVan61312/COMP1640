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

            <form action="{{ route('events.store') }}" method="post">@csrf
                <div class="card">
                    <div class="card-header">{{ __('Create New Event') }}</div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="mt-4">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="" id="description" class="form-control" name="description" rows="6" required></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                    required="" id="datepicker">
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
                                    required="" id="datepicker">
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection