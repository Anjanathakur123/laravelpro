<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $fillable=['name','email'];

    public function address()
    {
        return $this->hasOne(StudentAddress::class, 'stu_id');
    }


    public function subjects()
    {
        return  $this->hasMany(StudentSubject::class,'stu_id');
    }

}
