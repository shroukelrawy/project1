<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'studentname',
        'age',
        'teacher_id',
        
    ];
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'student_teacher');
    }
}
