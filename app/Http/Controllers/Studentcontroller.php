<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;



class Studentcontroller extends Controller
{
    private $columns = ['studentName','age'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::get();
        return view('students',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dataentryform');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // $student = new Student() ;
            // $student->studentName = $request->studentName;
            // $student->age = $request->age;
            // $student->save ();
            // return 'inserted Successfully';
            Student::create($request->only($this->columns));
            return redirect('students');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
