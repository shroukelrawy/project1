<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'no_of_experience',
        'job_title',
        'student_id',
        
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_teacher');
    }
}
