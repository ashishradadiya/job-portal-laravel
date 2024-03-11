<?php
// app/Services/UserService.php

namespace App\Services;

use App\Models\User;
use App\Models\UserApplication;
use Log;

class UserService
{
    public function createUser(array $userData)
    {
        // Logic to create a new user
        return User::create($userData);
    }

    public function userExists(string $email)
    {
        return User::where('email', $email)->where('status', 1)->exists();
    }
    
    public function createUserApplication(array $applicationData)
    {
        // Logic to create a new user
        return UserApplication::create($applicationData);
    }
    
    public function calculateTestScore(object $user)
    {
        $totalScore = 0;

        foreach ($user->tests->userTestQuestions as $userTestQuestion) {
            // Check if the user selected the correct option
            if ($userTestQuestion->selectedOption && $userTestQuestion->selectedOption->is_correct) {
                // Increment the score if the selected option is correct
                $totalScore++;
            }
        }

        return $totalScore;
    }

}
