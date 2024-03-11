<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;
use App\Models\Question;
use App\Models\Option;
use Carbon\Carbon;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedJobCategories();
    }
    
    private function seedJobCategories()
    {
        $jobCategories = [
            [
                'name' => 'Project Assistant',
                'status' => true,
                'questions' => [
                    [
                        'question_text' => 'What is the primary responsibility of a Project Assistant?',
                        'options' => [
                            ['option_text' => 'Managing project budgets', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Conducting market research', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Assisting project managers with administrative tasks', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Leading project teams', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'Which of the following software tools is commonly used for project management?',
                        'options' => [
                            ['option_text' => 'Microsoft Excel', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Adobe Photoshop', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'AutoCAD', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Microsoft Project', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'What does SWOT analysis stand for?',
                        'options' => [
                            ['option_text' => 'Strengths, Weaknesses, Opportunities, Threats', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Strategy, Work, Objective, Tactics', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Sales, Workflow, Operations, Tasks', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Scope, Workflow, Objectives, Timelines', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'Which document outlines the scope, objectives, and deliverables of a project?',
                        'options' => [
                            ['option_text' => 'Project Charter', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Project Plan', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Gantt Chart', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Risk Register', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'What is the purpose of a project status report?',
                        'options' => [
                            ['option_text' => 'To track project expenses', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'To communicate project progress and issues', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'To schedule project meetings', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'To assign tasks to team members', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'Which of the following is NOT a typical task for a Project Assistant?',
                        'options' => [
                            ['option_text' => 'Scheduling meetings and appointments', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Drafting project documentation', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Making strategic decisions for the project', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Coordinating logistics for project events', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'What is the critical path in project management?',
                        'options' => [
                            ['option_text' => 'The shortest path to project completion', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'The sequence of tasks with the least dependencies', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'The sequence of tasks with the longest duration', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => "The sequence of tasks that determine the project's minimum duration", 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'Which of the following is NOT a typical characteristic of a successful project?',
                        'options' => [
                            ['option_text' => 'On-time delivery', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Within budget', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Scope creep', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'High-quality deliverables', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'What does ROI stand for in project management?',
                        'options' => [
                            ['option_text' => 'Return on Investment', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Risk of Inaction', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Role of Influence', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'Rate of Inflation', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    [
                        'question_text' => 'What is a milestone in project management?',
                        'options' => [
                            ['option_text' => 'A significant event or stage in a project', 'is_correct' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'A small task within a project', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'The final deliverable of a project', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                            ['option_text' => 'A project risk', 'is_correct' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                        ]
                    ],
                    // Add more questions if needed
                ]
            ],
            // Add more job categories if needed
        ];

        foreach ($jobCategories as $jobCategoryData) {
            // Check if a category with the same name already exists
            $existingCategory = JobCategory::where('name', $jobCategoryData['name'])->exists();
            if(!$existingCategory) {
                $jobCategory = JobCategory::create([
                    'name' => $jobCategoryData['name'],
                    'status' => $jobCategoryData['status'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
    
                foreach ($jobCategoryData['questions'] as $questionData) {
                    $question = $jobCategory->questions()->create([
                        'question_text' => $questionData['question_text'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
    
                    foreach ($questionData['options'] as $optionData) {
                        $question->options()->create($optionData);
                    }
                }
            } else {
                $this->command->info($jobCategoryData['name'] . " job category already exists, skipping seeding.");
            }
        }
    }
}
