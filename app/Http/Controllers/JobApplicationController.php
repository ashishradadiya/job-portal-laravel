<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Log;
use App\Http\Requests\PostJobApplicationRequest;
use App\Models\JobCategory;
use App\Services\UserService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\TestService;
use Illuminate\Support\Facades\DB;
use Exception;

class JobApplicationController extends Controller
{
    protected $userService, $testService;

    public function __construct(UserService $userService, TestService $testService)
    {
        $this->userService = $userService;
        $this->testService = $testService;
    }

    public function showForm()
    {
        $jobCategory = JobCategory::where('status', 1)->select('id', 'name')->get()->toArray();
        return view('job.application', compact('jobCategory'));
    }

    public function submitForm(PostJobApplicationRequest $request)
    {
        try {
            // Start the database transaction
            DB::beginTransaction();

            $user = $this->userService->userExists($request->email);
            if(!$user) {
                // Creating a user
                $userData = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'role_id' => 2,
                    'phone' => $request->phone,
                    'status' => 1,
                    'password' => Hash::make($request->password)
                ];
        
                $user = $this->userService->createUser($userData);
                // Move the uploaded file to a storage location
                $file = $request->file('resume');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::random(20) . '.' . $extension; // Generate a random filename
                $file->storeAs('uploads', $fileName); // 'uploads' is the directory within the storage folder
        
                $applicationData = [
                    'user_id' => $user->id,
                    'job_category_id' => $request->job_category,
                    'years_of_experience' => $request->years_experience,
                    'relevant_experience' => $request->years_experience_role,
                    'notice_period' => $request->notice_period,
                    'agree' => $request->agree_terms,
                    'resume' => $fileName
                ];
        
                $userApplication = $this->userService->createUserApplication($applicationData);

                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    
                    // Call the createTestForUser method of the TestService
                    $test = $this->testService->createTestForUser($user->id, $request->job_category, 5);
                            
                    // Commit the database transaction if everything went fine
                    DB::commit();
                    // Authentication passed...
                    return redirect()->route('test.show')->with('success', 'Your job application has been submitted successfully.');
                }
            } else {
                DB::rollback();
                return redirect('/')->with('error', 'User already exists.');
            }
        } catch (Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();
            Log::error($e->getMessage());
            // If failed, redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while saving data: ' . $e->getMessage());
        }
    }
}
