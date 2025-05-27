<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = \App\Models\Student::all();
        return response()->json([
            'message' => 'All students retrieved successfully',
            'data' => $students
        ], 200);
    }

    public function getByMatric($matric)
    {
        $student = \App\Models\Student::where('matric', $matric)->first();
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'message' => 'Student retrieved successfully',
            'data' => $student
        ], 200);
    }
    public function getByJambNo($jamb_no)
    {
        $student = \App\Models\Student::where('reg_no', $jamb_no)->first();
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'message' => 'Student retrieved successfully',
            'data' => $student
        ], 200);
    }

    public function getByEmail($email)
    {
        $student = \App\Models\Student::where('email', $email)->first();
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'message' => 'Student retrieved successfully',
            'data' => $student
        ], 200);
    }

    public function getByDepartment($department)
    {
        $students = \App\Models\Student::where('department', $department)->get();
        return response()->json([
            'message' => 'Students retrieved successfully',
            'data' => $students
        ], 200);
    }

    public function getByLevel($level)
    {
        $students = \App\Models\Student::where('level', $level)->get();
        return response()->json([
            'message' => 'Students retrieved successfully',
            'data' => $students
        ], 200);
    }

    public function getByYearOfStudy($year_of_study)
    {
        $students = \App\Models\Student::where('year_of_study', $year_of_study)->get();
        return response()->json([
            'message' => 'Students retrieved successfully',
            'data' => $students
        ], 200);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'matric' => 'required|numeric|unique:students,matric',
            'date_of_birth' => 'required|date',
            'department' => 'required|string|max:255',
            'level' => 'required|integer',
            'year_of_study' => 'required|integer',
        ]);
        $student = \App\Models\Student::create($validatedData);
        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }

    public function updateMatricByJambNo(Request $request, $jamb_no)
    {
        $student = \App\Models\Student::where('reg_no', $jamb_no)->first();
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
                'data' => null
            ], 404);
        }
        $validatedData = $request->validate([
            'matric' => 'required|numeric|unique:students,matric,',
        ]);
        $student->update(['matric' => $validatedData['matric']]);
        return response()->json([
            'message' => 'Student matric number updated successfully',
            'data' => $student
        ], 200);
    }
}
