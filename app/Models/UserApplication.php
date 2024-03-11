<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_category_id',
        'years_of_experience',
        'relevant_experience',
        'notice_period',
        'resume',
        'agree'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
