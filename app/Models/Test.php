<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'score',
        'is_attempted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'user_test_questions', 'question_id');
    }
    
    public function userTestQuestions()
    {
        return $this->hasMany(UserTestQuestion::class);
    }
}
