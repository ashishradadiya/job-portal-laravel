<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTestQuestion;
use App\Models\Test;
use Log;
use App\Http\Requests\SubmitTestRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showTest()
    {
        $user = User::find(auth()->user()->id);
        return view('test.show', compact('user'));
    }
    
    public function screenTest()
    {           
        $user = User::find(auth()->user()->id);
        return view('test.screen', compact('user'));
    }
    
    public function submitTest(SubmitTestRequest $request)
    {
        try {
            // Start the database transaction
            DB::beginTransaction();
            // Extract the submitted answers from the associative array
            $answers = $request->input('answers');
            foreach ($answers as $questionId => $selectedOptionId) {
                // Process each submitted answer
                UserTestQuestion::where('test_id',  $request->test_id)->where('question_id',  $questionId)->update(
                    ['selected_option_id' => $selectedOptionId]
                );
            }
            $userDetails = User::find(auth()->user()->id);
            $totalScrore = $this->userService->calculateTestScore($userDetails);
            $test = Test::find($request->test_id);
            $test->update(['score' => $totalScrore, 'is_attempted' => true]);

            DB::commit();
            return view('test.result', compact('userDetails', 'test', 'totalScrore'));
        } catch (Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();
            Log::error($e->getMessage());
            // If failed, redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while saving data: ' . $e->getMessage());
        }
    }
    
}
