@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
                <p>
                    @if(auth()->user()->role->name == 'admin')
                        <a href="{{ route('users.list') }}">Click here</a> for user listing.
                    @else
                        <a href="{{ route('test.screen') }}">Click here</a> to start test.
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
