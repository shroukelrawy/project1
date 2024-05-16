<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\Student;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $tableName = 'students';
    
    public function index()
    {
        $students = DB::table($this->tableName)->get();
        return view('students', compact('students'));
    }

    public function create()
    {
        return view('dataentryform');
    }

    public function store(Request $request)
    {
        DB::table($this->tableName)->insert([
            'studentName' => $request->studentName,
            'age' => $request->age
        ]);
        return redirect('students');
    }

    public function show($id)
    {
        $student = DB::table($this->tableName)->find($id);
        return view('showstudent', compact('student'));
    }

    public function edit($id)
    {
        $student = DB::table($this->tableName)->find($id);
        return view('editstudent', compact('student'));
    }

    public function update(Request $request, $id)
    {
        DB::table($this->tableName)
            ->where('id', $id)
            ->update([
                'studentName' => $request->studentName,
                'age' => $request->age
            ]);
        return redirect('students');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table($this->tableName)->where('id', $id)->delete();
        return redirect('students');
    }
}


// class Studentcontroller extends Controller
// {
//     private $columns = ['studentName','age'];
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $students=Student::get();
//         return view('students',compact('students'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('dataentryform');

//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         {
//             // $student = new Student() ;
//             // $student->studentName = $request->studentName;
//             // $student->age = $request->age;
//             // $student->save ();
//             // return 'inserted Successfully';
//             Student::create($request->only($this->columns));
//             return redirect('students');
//         }
//     }
//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         $student = Student::findOrFail($id);
//         return view('showstudent',compact('student'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         $student = Student::findOrFail($id);
//         return view('editstudent',compact('student'));
//     }
    

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         Student::where('id', $id)->update($request->only($this->columns));
//         return redirect('students');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Request $request)
//     {
//         $id=$request->id;
//         Student::where('id', $id)->delete();
//         return redirect('students');
//     }
// }

