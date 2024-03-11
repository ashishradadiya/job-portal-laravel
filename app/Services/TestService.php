<?php
// app/Services/TestService.php

namespace App\Services;

use App\Models\Test;
use App\Models\UserTestQuestion;
use App\Models\Question;

class TestService
{
    public function createTestForUser($userId, $jobCategoryId, $numberOfQuestions) {
        // Retrieve questions based on job category or any other criteria
        $questions = Question::where('job_category_id', $jobCategoryId)->inRandomOrder()->limit($numberOfQuestions)->get();

        // Create a new test record for the user
        $test = new Test();
        $test->user_id = $userId;
        $test->is_attempted = false; // Assuming the test is not attempted yet
        $test->save();

        // Associate questions with the test by creating records in the user_test_questions table
        foreach ($questions as $question) {
            $userTestQuestion = new UserTestQuestion();
            $userTestQuestion->test_id = $test->id;
            $userTestQuestion->question_id = $question->id;
            $userTestQuestion->save();
        }

        return $test;
    }

    // You can define more methods here for updating tests, retrieving test results, etc.
}
