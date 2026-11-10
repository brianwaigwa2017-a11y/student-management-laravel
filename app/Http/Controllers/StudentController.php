<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.hello', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'secondname' => 'required|max:255',
            'email' => 'required|unique:students,email',
            'phonenumber' => 'required|max:255',
            'course' => 'required|max:255'
        ]);

        Student::create($validatedData); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //

        $validatedData = $request->validate([
            'student_number' => 'nullable|string|max:50',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'gender'         => 'nullable|string|in:Male,Female,Other',
            'date_of_birth'  => 'nullable|date',
            'phone'          => 'nullable|string|max:20',
            // Unique check that ignores the current student's ID so they don't trigger a duplicate error on their own email
            'email'          => 'required|email|max:255|unique:students,email,' . $student->id,
            'address'        => 'nullable|string',
            'status'         => 'nullable|string|in:Active,Inactive,Graduated',
        ]);

        // 2. Update the student record with the validated data
        $student->update($validatedData);

        // 3. Redirect back to the index page with a success flash message
        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
