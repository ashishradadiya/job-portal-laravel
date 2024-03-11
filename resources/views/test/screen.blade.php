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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($user->tests->is_attempted == 1)
                    Your test score is {{ $user->tests->score }}.
                @endif
                <form action="{{ route('test.submit') }}" method="post">
                    @csrf
                    @php $test = $user->tests; @endphp
                    <hr>

                    <input type='hidden' name='test_id' value='{{ $test->id }}'>
                    <!-- Accessing userTestQuestions relationship will trigger lazy loading -->
                    @foreach ($test->userTestQuestions as $k => $userTestQuestion)
                        <p>Question: {{ $userTestQuestion->question->question_text }}</p>

                        <!-- Accessing options relationship will trigger lazy loading -->
                        @foreach ($userTestQuestion->question->options as $option)
                            ({{ $loop->iteration }}) 
                            @if($user->tests->is_attempted == 0)
                                <input type='radio' name='answers[{{ $userTestQuestion->question->id }}]' value='{{ $option->id }}'>
                            @endif
                            {{ $option->option_text }}<br>
                        @endforeach
                                        
                        <!-- Display the validation error message for this question -->
                        @error("answers.$userTestQuestion->question->id")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Display the selected option if any -->
                        @if ($userTestQuestion->selectedOption)
                            <p>Selected Answer: {{ $userTestQuestion->selectedOption->option_text }}</p>
                        @endif
                    <hr>
                    @endforeach
                    
                    @if($user->tests->is_attempted == 0)
                        <button type="submit" class="btn btn-primary">Submit Test</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

