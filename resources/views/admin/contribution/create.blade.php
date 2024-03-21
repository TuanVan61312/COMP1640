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

            <form action="{{ route('contributions.store') }}" method="post">@csrf
                <div class="card">
                    <div class="card-header">{{ __('Create New Contributions') }}</div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Title Contribution</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        {{-- <div class="mt-4">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div> --}}

                        <div class="mt-4">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control" placeholder="" id="">
                                {{-- form validation Start date --}}
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- End Form Validate Start date --}}
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="form-group">
                                <label>Faculty</label>
                                <select class="form-control" name="faculty_id" required="">

                                    @foreach (App\Models\Faculty::all() as $faculty)
                                        <option value="{{ $faculty->id }}">
                                            {{ $faculty->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        {{-- <div class="mt-4">
                            <div class="form-group">
                                <label>Coordinator</label>
                                <select class="form-control" name="user_id" required="">
                                        @foreach (App\Models\User::all() as $user)
                                            @if ($user->role->name === 'Marketing Coordinator')
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div> --}}

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
