<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\StudentAddress;
use App\Models\StudentSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showForm()
    {
        return view('registeration');
    }

    public function index()
    {
        $students = Student::with('address', 'subjects')->get();
       return view('show', compact('students'));

    }

    public function edit($id)
    {
        $students=Student::findOrFail($id);
        return view('edit',compact('students'));

    }

public function register(StudentRequest $request)
    {
        try {

            DB::beginTransaction();
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email
            ]);
            StudentAddress::create([
                'stu_id' => $student->id,
                'city' => $request->city,
                'state' => $request->state,
            ]);

            if (!empty($request->subjectname) && is_array($request->subjectname)) {
                foreach ($request->subjectname as $subject) {
                    StudentSubject::create([
                        'stu_id' => $student->id,
                        'subjectname' => $subject,
                    ]);
                }
                DB::commit();
                 return redirect('/show')->with('success', 'Registration Successful');
            }
        }
        catch (\exception $ex) {
            DB::rollback();
            dd($ex);
        }
    }
}
