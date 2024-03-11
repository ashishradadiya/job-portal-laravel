@extends('layouts.app')

@section('content')

@php
    $selectedImmediate = (old('notice_period') == 'Immediately') ? 'selected' : '';
    $selectedOne = (old('notice_period') == '1 Month') ? 'selected' : '';
    $selectedTwo = (old('notice_period') == '2 Months') ? 'selected' : '';
    $selectedThree = (old('notice_period') == '3 Months') ? 'selected' : '';

    $selectedJobCategory = (old('job_category')) ? old('job_category') : '';
@endphp
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Job Application') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="{{ route('application.submit-form') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="job_category" class="form-label">Job Category</label>
                            <select class="form-select" id="job_category" name="job_category" value="{{ old('job_category') }}">
                                <option value="">Select Job Category</option>
                                @foreach ($jobCategory as $keyJC => $valueJC)
                                    @php $selected = $selectedJobCategory == $valueJC['id'] ? 'selected' : ''; @endphp
                                    <option value="{{ $valueJC['id'] }}" {{ $selected }}>{{ $valueJC['name'] }}</option>
                                @endforeach
                            </select>
                            @error('job_category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="years_experience" class="form-label">Years of Experience</label>
                            <input type="number" step="0.1" min="0" class="form-control" id="years_experience" name="years_experience" value="{{ old('years_experience') }}">
                            @error('years_experience')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="years_experience_role" class="form-label">Years of Experience for Selected Role</label>
                            <input type="number" step="0.1" min="0" class="form-control" id="years_experience_role" name="years_experience_role" value="{{ old('years_experience_role') }}">
                            @error('years_experience_role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notice_period" class="form-label">Notice Period</label>
                            <select class="form-select" id="notice_period" name="notice_period" value="{{ old('notice_period') }}">
                                <option value="">Select Notice Period</option>
                                <option value="Immediately" {{ $selectedImmediate }}>Can Join Immediately</option>
                                <option value="1 Month" {{ $selectedOne }}>1 Month</option>
                                <option value="2 Months" {{ $selectedTwo }}>2 Months</option>
                                <option value="3 Months" {{ $selectedThree }}>3 Months</option>
                            </select>
                            @error('notice_period')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Resume</label>
                            <input type="file" class="form-control" id="resume" name="resume" value="{{ old('resume') }}">
                            @error('resume')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            @php
                            $checked = (old('agree_terms')) ? 'checked' : '';
                            @endphp
                            <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms" value="1" {{ $checked }}>
                            <label class="form-check-label" for="agree_terms">Agree to Terms and Conditions</label>
                            @error('agree_terms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
