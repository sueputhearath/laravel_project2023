<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students -> count() > 0) {
            return response() -> json([
                "status" => 200,
                "students" => $students
            ], 200);
        } else {
            return response() -> json([
                "status" => 404,
                "message" => "Record not found"
            ], 404);
        }
    }
}