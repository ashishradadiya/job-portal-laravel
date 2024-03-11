@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ 'Welcome' }} {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
            <div class="card-body">
                <p>Your test has been submitted successfully.</p>
                <p>Test score: {{ $totalScrore }}</p>
            </div>
        </div>
    </div>
@endsection
