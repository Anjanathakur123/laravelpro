<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'students_address';
    protected $fillable = ['stu_id', 'city', 'state'];

    // public function student()
    // {
    //     return $this->belongsTo(Student::class,'stu_id');
    // }
}
