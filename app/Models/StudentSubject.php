<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'student_subjects';
    protected $fillable=['stu_id','subjectname'];

    public function studentSub()
    {
        return $this->belongsTo(Student::class,'stu_id');
    }

}
