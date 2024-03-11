@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('User Applications') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Test Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $keyU => $valueU)
                        @php
                            $testResult = $valueU->tests->is_attempted == 0 ? 'Pending to attempt' : 'Score: '.$valueU->tests->score;
                        @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $valueU['first_name']. ' ' .$valueU['last_name'] }}</td>
                                <td>{{ $valueU['email'] }}</td>
                                <td>{{ $testResult }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan=3>No users data found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
