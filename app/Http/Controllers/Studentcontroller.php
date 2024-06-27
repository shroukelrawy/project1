<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import the Carbon class

class Studentcontroller extends Controller
{ 
    private $columns = [
        'studentname',
        'age'
        
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch all non-deleted students with their related teachers eager loaded
    $students = Student::with('teachers')->whereNull('deleted_at')->get();
    
    // Pass the students data to the view
    return view('students', ['students' => $students]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('studentForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*
        $student= new Student();
        $student->studentname =$request->input('name');
        $student->age = $request->input('age');
        
        $student->save();
        return 'Inserted';*/
        /*
        Student::create($request->only($this->columns));
        return redirect('students');*/
        
         // Validate the request data
       $request->validate([
        'studentname' => 'required|min:3|max:100',
        'age' => 'required|integer|min:1|max:99',
        ]);

    // Insert the validated data into the 'students' table
       DB::table('students')->insert([
        'studentname' => $request->studentname,
        'age' => $request->age,
        'created_at' => now(),
        'updated_at' => now()
       ]);

        return redirect()->route('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Retrieve the student record based on the provided ID
       $student = DB::table('students')->where('id', $id)->first();

    // Check if the student is found
      if ($student) {
        // If the student is found, pass it to the view
        return view('showStudent', ['student' => $student]);
    } else {
        // If the student is not found, return an error message or redirect
        return "Student not found";
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = DB::table('students')->where('id', $id)->first();

    // Check if the student is found
      if ($student) {
        // If the student is found, pass it to the view
        return view('editStudent', ['student' => $student]);
    } else {
        // If the student is not found, return an error message or redirect
        return "Student not found";
    }
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(Request $request, string $id)
    {
        //
        $student = DB::table('students')->where('id', $id)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        } else {
            DB::table('students')
                ->where('id', $id)
                ->update([
                    'studentname' => $request->studentname,
                    'age' => $request->age,
                    'updated_at' => now()
                ]);
        return redirect('students')->with('success', 'Client updated successfully.');
    }
    }*/
    public function update(Request $request, string $id)
{
    // Validate the request data
    $data = $request->validate([
        'studentname' => 'required|min:3|max:100',
        'age' => 'required|integer|min:1|max:99',
    ]);

    // Check if the client exists
    $student = DB::table('students')->where('id', $id)->first();

    if (!$student) {
        // Handle case where client with given ID is not found
        return redirect()->back()->with('error', 'Student not found.');
    }

    // Update the client data
    DB::table('students')->where('id', $id)->update([
        'studentname' => $data['studentname'],
        'age' => $data['age'],
        'updated_at' => now()  // Ensure updated_at is set to current timestamp
    ]);

    // Redirect to clients index page or any other desired destination
    return redirect('students')->with('success', 'Student updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = DB::table('students')->where('id', $id)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        DB::table('students')
            ->where('id', $id)
            ->update(['deleted_at' => Carbon::now()]);


    // Redirect to clients index page with success message
    return redirect('students')->with('success', 'Student deleted successfully.');
    }


    public function trash()
    {
        // Fetch trashed students using query builder
        $trashed = DB::table('students')
            ->whereNotNull('deleted_at')
            ->get();
    
        // Return the view with trashed students
        return view('trashStudent', compact('trashed'));
    }
    public function restore(string $id)
    {
        // Restore the student using query builder
        DB::table('students')
            ->where('id', $id)
            ->update(['deleted_at' => null]);
    
        // Redirect to the students index page with success message
        return redirect('students')->with('success', 'Student restored successfully.');
    }
    public function force(Request $request)
    {
        $id = $request->id;
        DB::table('students')->where('id', $id)->delete();
        return redirect('trashStudent')->with('success', 'Student deleted permanently.');
    }

}
