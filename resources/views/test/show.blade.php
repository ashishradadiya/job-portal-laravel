@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ 'Welcome' }} {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <p>
                    <a href="{{ route('test.screen') }}">Click here</a> to start test.
                </p>
            </div>
        </div>
    </div>
@endsection
