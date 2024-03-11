<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'job_category_id',
        'question_text',
    ];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }
    
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    
    public function tests()
    {
        return $this->belongsToMany(Test::class, 'user_test_questions')->withPivot('selected_option_id');
    }
}
