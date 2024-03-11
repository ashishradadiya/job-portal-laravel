<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestQuestion extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    
    public function selectedOption()
    {
        return $this->belongsTo(Option::class, 'selected_option_id');
    }
}
